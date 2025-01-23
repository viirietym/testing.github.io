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
    if (!is_array($inputs)) {
        echo json_encode(['error' => 'Invalid input format']);
        return;
    }

    $checkSql = "SELECT COUNT(*) FROM user WHERE email = :email OR username = :username";
    $checkStmt = $pdo->prepare($checkSql);

    $insertSql = "INSERT INTO user (userID, firstName, lastName, username, email, password, role, userInfoID) 
                  VALUES (:userID, :firstName, :lastName, :username, :email, :password, :role, :userInfoID)";
    $insertStmt = $pdo->prepare($insertSql);

    $results = ['success' => [], 'errors' => []]; 

    foreach ($inputs as $input) {
        if (!validateInput($input)) {
            $results['errors'][] = [
                'message' => 'Invalid data provided',
                'input' => $input
            ];
            continue;
        }

        $checkStmt->execute([
            'email' => $input['email'],
            'username' => $input['username']
        ]);
        $exists = $checkStmt->fetchColumn();

        if ($exists > 0) {
            $results['errors'][] = [
                'message' => 'User already exists with the given email or username',
                'email' => $input['email'],
                'username' => $input['username']
            ];
            continue;
        }

        try {
            $insertStmt->execute([
                'userID' => 0, 
                'firstName' => $input['firstName'],
                'lastName' => $input['lastName'],
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => $input['password'],
                'role' => 'admin', 
                'userInfoID' => 0 
            ]);
            $results['success'][] = [
                'message' => 'User created successfully',
                'input' => $input
            ];
        } catch (Exception $e) {
            $results['errors'][] = [
                'message' => 'Error creating user: ' . $e->getMessage(),
                'input' => $input
            ];
        }
    }

    echo json_encode($results);
}



// Function to handle PUT requests
function handlePut($pdo, $inputs)
{
    if (!is_array($inputs)) {
        echo json_encode(['error' => 'Invalid input format']);
        return;
    }

    $sql = "UPDATE user 
            SET firstName = :firstName, lastName = :lastName, username = :username, email = :email, password = :password, role = :role, userInfoID = :userInfoID 
            WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);

    foreach ($inputs as $input) {
        if (!validateInput($input, true)) {
            echo json_encode(['error' => 'Invalid data provided for update']);
            return;
        }

        try {
            $stmt->execute([
                'userID' => $input['userID'],
                'firstName' => $input['firstName'],
                'lastName' => $input['lastName'],
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => $input['password'],
                'role' => 'admin', 
                'userInfoID' => 0 
            ]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Error updating user: ' . $e->getMessage()]);
            return;
        }
    }

    echo json_encode(['message' => 'User(s) updated successfully']);
}



// Function to handle DELETE requests
function handleDelete($pdo, $inputs)
{
    if (!is_array($inputs)) {
        echo json_encode(['error' => 'Invalid input format']);
        return;
    }

    $sql = "DELETE FROM user WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);

    foreach ($inputs as $userID) {
        if (!is_numeric($userID)) {
            echo json_encode(['error' => 'Invalid user ID']);
            return;
        }

        try {
            $stmt->execute(['userID' => $userID]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Error deleting user: ' . $e->getMessage()]);
            return;
        }
    }

    echo json_encode(['message' => 'User(s) deleted successfully']);
}



// Helper function for input validation
function validateInput($input, $isUpdate = false)
{
    if ($isUpdate && empty($input['userID'])) {
        return false;
    }

    return !empty($input['firstName']) &&
        !empty($input['lastName']) &&
        !empty($input['username']) &&
        filter_var($input['email'], FILTER_VALIDATE_EMAIL) &&
        !empty($input['password']);
}
