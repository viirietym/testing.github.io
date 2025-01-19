<?php
header("Content-Type: application/json");

include 'connect.php';

$method = $_SERVER['REQUEST_METHOD'];
$inputs = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handlePost($pdo, $inputs);
        break;
    case 'PUT':
        handlePut($pdo, $inputs);
        break;
    case 'DELETE':
        handleDelete($pdo, $inputs);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

// Function to handle GET requests
function handleGet($pdo)
{
    $sql = "SELECT userID, firstName, lastName, username, email, password, role, userInfoID FROM user WHERE role = 'admin'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

// Function to handle POST requests
function handlePost($pdo, $inputs)
{
    $sql = "INSERT INTO user (userID, firstName, lastName, username, email, password, role, userInfoID) 
            VALUES (:userID, :firstName, :lastName, :username, :email, :password, :role, :userInfoID)";
    $stmt = $pdo->prepare($sql);
    
    foreach ($inputs as $input) {
        $stmt->execute([
            'userID' => $input['userID'],
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $input['password'],
            'role' => 'admin', 
            'userInfoID' => $input['userInfoID']
        ]);
    }

    echo json_encode(['message' => 'User created successfully and assigned as admin']);
}

// Function to handle PUT requests
function handlePut($pdo, $inputs)
{
    $sql = "UPDATE user 
            SET firstName = :firstName, lastName = :lastName, username = :username, email = :email, password = :password, role = :role, userInfoID = :userInfoID 
            WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);
    
    foreach ($inputs as $input) {
        $stmt->execute([
            'userID' => $input['userID'],
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $input['password'],
            'role' => $input['role'],
            'userInfoID' => $input['userInfoID']
        ]);
    }
    
    echo json_encode(['message' => 'User updated successfully']);
}

// Function to handle DELETE requests
function handleDelete($pdo, $inputs)
{
    $sql = "DELETE FROM user WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);

    foreach ($inputs as $userID) {
        $stmt->execute(['userID' => $userID]);
    }

    echo json_encode(['message' => 'Users deleted successfully']);
}
