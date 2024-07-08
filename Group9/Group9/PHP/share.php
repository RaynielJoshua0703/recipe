<?php
session_start();
$share_errors = array();

// Check if form was submitted
if(isset($_POST['submit'])) {
    // Sanitize and validate form inputs
    $food_name = htmlspecialchars($_POST['food_name']);
    $cuisine_type = htmlspecialchars($_POST['cuisine_type']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $instructions = htmlspecialchars($_POST['instructions']);

    // File upload handling
    $uploadDir = "../uploads/"; // Directory where uploaded files will be saved
    $fileName = basename($_FILES["recipe_image"]["name"]); // Original file name
    $targetFilePath = $uploadDir . $fileName; // Target path for file upload
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // File extension

    // VALIDATION.
    if (empty($food_name)) {
        $share_errors['food_name'] = "Food Name Required.";
    }
    if (empty($cuisine_type)) {
        $share_errors['cuisine_type'] = "Cuisine Type Required.";
    }
    if (empty($ingredients)) {
        $share_errors['ingredients'] = "Ingredients Required.";
    }
    if (empty($instructions)) {
        $share_errors['instructions'] = "Instructions Required.";
    }
    if (empty($fileName)) {
        $share_errors['image'] = "Image Required.";
    } else {
        // File upload validation (optional: adjust file type restrictions as needed)
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
            $share_errors['image'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }

    // COUNTING ERRORS
    if(count($share_errors) == 0) {
        // INSERT INTO DATABASE.
        $query = "INSERT INTO recipes (food_name, cuisine_type, ingredients, instructions, image_path) VALUES (?, ?, ?, ?, ?)";

        $stmt = $connect->prepare($query);
        if ($stmt === false) {
            $share_errors['db_error'] = "Database error: Failed to prepare statement";
        } else {
            // Move uploaded file to target directory
            if (move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $targetFilePath)) {
                // Bind parameters
                $stmt->bind_param('sssss', $food_name, $cuisine_type, $ingredients, $instructions, $targetFilePath);

                if ($stmt->execute()) {
                    // Redirect after successful insertion
                    header('Location: Share.php');
                    exit();
                } else {
                    // Handle execute error
                    $share_errors['db_error'] = "Database error: Failed to submit";
                }
            } else {
                // Handle file upload error
                $share_errors['file_error'] = "Error uploading image.";
            }
        }

        $stmt->close(); // Close statement
    }
}
