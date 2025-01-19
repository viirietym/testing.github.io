<?php
header("Content-Type: application/json");

include 'connect.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handlePost($pdo, $input);
        break;
    case 'PUT':
        handlePut($pdo, $input);
        break;
    case 'DELETE':
        handleDelete($pdo, $input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

// Function to handle GET requests
function handleGet($pdo)
{
    $sql = "SELECT userID, firstName, lastName, username, email, password, role, userInfoID FROM user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

// Function to handle POST requests
function handlePost($pdo, $input)
{
    if (isset($input['userID'], $input['firstName'], $input['lastName'], $input['username'], $input['email'], $input['password'], $input['role'], $input['userInfoID'])) {
        $sql = "INSERT INTO user (userID, firstName, lastName, username, email, password, role, userInfoID) 
                VALUES (:userID, :firstName, :lastName, :username, :email, :password, :role, :userInfoID)";
        $stmt = $pdo->prepare($sql);
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
        echo json_encode(['message' => 'User created successfully']);
    } else {
        echo json_encode(['message' => 'Invalid input', 'input' => $input]);
    }
}

// Function to handle PUT requests
function handlePut($pdo, $input)
{
    if (isset($input['userID'], $input['firstName'], $input['lastName'], $input['username'], $input['email'], $input['password'], $input['role'], $input['userInfoID'])) {
        $sql = "UPDATE user 
                SET firstName = :firstName, lastName = :lastName, username = :username, email = :email, password = :password, role = :role, userInfoID = :userInfoID 
                WHERE userID = :userID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $input['password'],
            'role' => $input['role'],
            'userInfoID' => $input['userInfoID'],
            'userID' => $input['userID']
        ]);
        echo json_encode(['message' => 'User updated successfully']);
    } else {
        echo json_encode(['message' => 'Invalid input', 'input' => $input]);
    }
}

// Function to handle DELETE requests
function handleDelete($pdo, $input)
{
    if (isset($input['userID'])) {
        $sql = "DELETE FROM user WHERE userID = :userID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['userID' => $input['userID']]);
        echo json_encode(['message' => 'User deleted successfully']);
    } else {
        echo json_encode(['message' => 'Invalid input']);
    }
}
?>