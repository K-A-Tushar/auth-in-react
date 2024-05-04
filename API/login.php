<?php
require "database.php";

// Get the request data
$requestData = json_decode(file_get_contents('php://input'), true);

if ($requestData !== null && isset($requestData['email'], $requestData['password'])) {
    $email = $requestData['email'];
    $password = $requestData['password'];

    // Perform your login logic here
    // e.g., query the database, authenticate the user, etc.
    $q = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($q);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Return a JSON response
            $response = [
                'status' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'email' => $row['email'],
                    'role' => $row['role'],
                    // Include any other user data you want to return
                ],
            ];

            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = [
                'status' => false,
                'message' => 'Login failed',
                'user' => null,
            ];

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        $response = [
            'status' => false,
            'message' => 'Login failed',
            'user' => null,
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    $response = [
        'status' => false,
        'message' => 'Invalid request data',
        'user' => null,
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}

