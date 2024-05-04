<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

// Constants
// define("API", "https://coders24x7.com:2083/cpsess3049715600/3rdparty/phpMyAdmin/index.php?route=/database/structure&db=codersxc_t_react");

// Database connection
$conn = new mysqli("localhost", "root", "", "web_ecomm");

// Error handling for database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// API endpoints
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET requests
    if ($_GET['action'] === 'get_users') {
        // Example: Retrieve list of users
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        } else {
            echo json_encode(array());
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST requests
    if ($_POST['action'] === 'create_user') {
        // Example: Create a new user
        $username = $_POST['username'];
        $email = $_POST['email'];
        // Add validation and sanitization as needed
        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array("message" => "User created successfully"));
        } else {
            echo json_encode(array("error" => "Error: " . $conn->error));
        }
    }
}

// Close database connection
$conn->close();
?>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
define("API", "http://localhost/ReactJS/PROJECT/furni/API/");
$conn = new mysqli("localhost", "root", "", "web_ecomm");
//error handling
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
