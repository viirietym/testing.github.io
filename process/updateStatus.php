<?php
include("../connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = intval($_POST['userID']);
    $isAccepted = intval($_POST['isAccepted']);

    // Insert the status and set isClick to 1 (button clicked)
    $query = "INSERT INTO letter (userID, isAccepted, isClick) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userID, $isAccepted);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
}
?>
