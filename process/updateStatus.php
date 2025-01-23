<?php
include("../connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = intval($_POST['userID']);
    $isAccepted = intval($_POST['isAccepted']);

    $query = "UPDATE letter SET isAccepted = ? WHERE userID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $isAccepted, $userID);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
}
?>
