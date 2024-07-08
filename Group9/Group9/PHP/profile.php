<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../home.php');
        exit();
    }

    // Connection.
    require '../PHP/connection.php';

    // Fetch user profile details.
    $user_id = $_SESSION['user_id'];
    $query = "SELECT user_fname, user_lname, user_id, user_image FROM user_accounts WHERE user_id = ?";
    $stmt = $connect->prepare($query);
    

    if (!$stmt) {
        die('Prepare failed: ' . htmlspecialchars($connect->error));
    }

    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_profile = $result->fetch_assoc();
    } else {
        // Handle user not found error.
        echo "User not found.";
        exit();
    }