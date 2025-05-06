<?php
include "connection.php";

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    if (is_numeric($course_id)) {
        $sql = "DELETE FROM `courses` WHERE course_id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $course_id);

            if ($stmt->execute()) {
                header('Location: /bakekok/index.php');
                exit;
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $conn->error;
        }
    } else {
        echo "Invalid course_id parameter.";
    }
} else {
    echo "course_id not provided.";
}

$conn->close();
?>
