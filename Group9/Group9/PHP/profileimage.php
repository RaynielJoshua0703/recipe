<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php'; // Ensure this file correctly connects to the database


// Check connection and throw error if not available
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0; 
// Check if an image file was uploaded
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    // Check if user_id is set and sanitize it

    if (!$user_id) {
        die("Invalid user ID.");
    }

    $image = $_FILES['image']['tmp_name'];
    $imgContent = file_get_contents($image); // Fetch binary data from the uploaded file

    // Prepare statement
    $stmt = $connect->prepare("UPDATE user_accounts SET user_image = ? WHERE user_id = ?");
    
    // Check if prepare() succeeded
    if ($stmt === false) {
        die('MySQL prepare error: ' . $connect->error);
    }
    
    // Bind parameters (blob and integer)
    $stmt->bind_param("si", $imgContent, $user_id); // s - string, i - integer
    
    // Execute statement
    if ($stmt->execute()) {
        echo "Image uploaded successfully.";
        header('Location: ../Pages/Profile.php');
        exit; // Always exit after header redirect
    } else {
        echo "Image upload failed, please try again.";
        echo "Error: " . $stmt->error;
    }
} else {
    echo "<center>" ."Please select an image file to upload.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>


<body>
  <center>
  <div class="phppot-container">
    <h1>Upload image to database:</h1>
    <form action="profileimage.php?user_id=<?php echo urlencode($user_id); ?>" method="post" enctype="multipart/form-data">

      <div class="row">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload">
      </div>
    </form>

    <h2>Uploaded Image (Displayed from the database)</h2>
  </div>
</body>
     

</html>