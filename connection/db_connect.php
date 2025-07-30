<?php
    // // Database configuration
    $host = 'localhost'; // Database host (usually 'localhost')
    $dbname = 'jt_laravel'; // Your database name
    $username = 'jt_laravel'; // Your database username
    $password = 'T4336%iuu'; // Your database password

    // DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    try {
        // Create a new PDO instance
        $pdo = new PDO($dsn, $username, $password);

        // Set the PDO error mode to exception for better error handling
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // If the connection is successful, output this message
        echo "Connected successfully to the database.";

    } catch (PDOException $e) {
        // Catch and display any connection errors
        die("Connection failed: " . $e->getMessage());
    }



    // Database configuration
    // $host = 'localhost'; // Database host (usually 'localhost')
    // $dbname = 'jt_local'; // Your database name
    // $username = 'root'; // Your database username
    // $password = ''; // Your database password

    // // DSN (Data Source Name)
    // $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    // try {
    //     // Create a new PDO instance
    //     $pdo = new PDO($dsn, $username, $password);

    //     // Set the PDO error mode to exception for better error handling
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     // If the connection is successful, output this message
    //     // echo "Connected Okay. \n";

    // } catch (PDOException $e) {
    //     // Catch and display any connection errors
    //     die("Connection failed: " . $e->getMessage());
    // }

?>
