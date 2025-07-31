<?php
include('../../../connection/db_connect.php');
header('Content-Type: application/json');

// 1. Get token and role from query string
$token = $_GET['token'] ?? '';
$role  = $_GET['role'] ?? '';

// 2. Parse POST body JSON
$input = json_decode(file_get_contents("php://input"), true);

// Extract filters and pagination from body
$filter_user_name  = $input['user_name'] ?? null;
$filter_name      = $input['name'] ?? null;
$filter_role       = $input['filter_role'] ?? null;
$filter_loggedin   = $input['is_loggedin'] ?? null;
$limit             = isset($input['limit']) ? max(1, intval($input['limit'])) : 10;
$offset            = isset($input['offset']) ? max(0, intval($input['offset'])) : 0;

// 3. Validate admin access
if (empty($token) || $role !== 'admin') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized. Admin token and role required.'
    ]);
    exit;
}

try {
    // Check if token is valid and belongs to logged-in admin
    $auth = $pdo->prepare("SELECT * FROM users WHERE token = :token AND role = 'admin' AND is_loggedin = '1'");
    $auth->execute([':token' => $token]);
    $admin = $auth->fetch(PDO::FETCH_ASSOC);

    if (!$admin) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid token or not logged in as admin.'
        ]);
        exit;
    }

    // 4. Build filtered query
    $where = "1";
    $params = [];

    if ($filter_user_name) {
        $where .= " AND user_name LIKE :user_name";
        $params[':user_name'] = "%$filter_user_name%";
    }

    if ($filter_name) {
        $where .= " AND name LIKE :name";
        $params[':name'] = "%$filter_name%";
    }

    if ($filter_role) {
        $where .= " AND role = :filter_role";
        $params[':filter_role'] = $filter_role;
    }

    if ($filter_loggedin !== null) {
        $where .= " AND is_loggedin = :is_loggedin";
        $params[':is_loggedin'] = $filter_loggedin;
    }

    // 5. Main SELECT query
    $query = "
        SELECT id, name, user_name, role, is_loggedin, address, mobile, token, created_at
        FROM users
        WHERE $where
        LIMIT :limit OFFSET :offset
    ";

    $stmt = $pdo->prepare($query);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format date
    $users = [];
    foreach ($rows as $row) {
        $users[] = [
            'id'          => $row['id'],
            'name'        => $row['name'],
            'user_name'   => $row['user_name'],
            'role'        => $row['role'],
            'is_loggedin' => $row['is_loggedin'],
            'address'     => $row['address'],
            'mobile'      => $row['mobile'],
            'token'       => $row['token'],
            'created_at'  => date("jS F, Y", strtotime($row['created_at']))
        ];
    }

    // 6. Total count
    $count_query = "SELECT COUNT(*) as total FROM users WHERE $where";
    $count_stmt = $pdo->prepare($count_query);
    foreach ($params as $key => $val) {
        $count_stmt->bindValue($key, $val);
    }
    $count_stmt->execute();
    $total = $count_stmt->fetch(PDO::FETCH_ASSOC)['total'];

    echo json_encode([
        'status' => 'success',
        'data' => $users,
        'pagination' => [
            'total' => (int)$total,
            'limit' => $limit,
            'offset' => $offset,
            'total_pages' => ceil($total / $limit)
        ]
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Query failed: ' . $e->getMessage()
    ]);
}
