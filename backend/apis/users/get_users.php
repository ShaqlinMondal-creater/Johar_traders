<?php
include('../connection/db_connect.php');
header('Content-Type: application/json');

// Auth params
$token = $_GET['token'] ?? '';
$role  = $_GET['role'] ?? '';

// Pagination
$limit  = isset($_GET['limit']) ? max(1, intval($_GET['limit'])) : 10;
$offset = isset($_GET['offset']) ? max(0, intval($_GET['offset'])) : 0;

// Filters
$filter_user_name  = $_GET['user_name'] ?? null;
$filter_email      = $_GET['email'] ?? null;
$filter_role       = $_GET['filter_role'] ?? null;
$filter_loggedin   = $_GET['is_loggedin'] ?? null;

if (empty($token) || $role !== 'admin') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized. Admin token and role required.'
    ]);
    exit;
}

try {
    // Verify token is a logged-in admin
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

    // Build WHERE clause and bind values
    $where = "1";
    $params = [];

    if ($filter_user_name) {
        $where .= " AND user_name LIKE :user_name";
        $params[':user_name'] = "%$filter_user_name%";
    }

    if ($filter_email) {
        $where .= " AND email LIKE :email";
        $params[':email'] = "%$filter_email%";
    }

    if ($filter_role) {
        $where .= " AND role = :filter_role";
        $params[':filter_role'] = $filter_role;
    }

    if ($filter_loggedin !== null) {
        $where .= " AND is_loggedin = :is_loggedin";
        $params[':is_loggedin'] = $filter_loggedin;
    }

    // Main query
    $query = "
        SELECT id, user_name, email, role, is_loggedin, address, mobile, token, created_at
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

    // Format users
    $users = [];
    foreach ($rows as $row) {
        $formatted_date = date("jS F, Y", strtotime($row['created_at']));
        $users[] = [
            'id'          => $row['id'],
            'user_name'   => $row['user_name'],
            'email'       => $row['email'],
            'role'        => $row['role'],
            'is_loggedin' => $row['is_loggedin'],
            'address'     => $row['address'],
            'mobile'      => $row['mobile'],
            'token'       => $row['token'],
            'created_at'  => $formatted_date
        ];
    }

    // Total count
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
