<?php
// Connection.
require '../PHP/connection.php';

if(isset($_GET['food'])){
    $foodID = mysqli_real_escape_string($connect, $_GET['food']);
    $sql = "SELECT * FROM recipes WHERE food_id = $foodID";
    $result = mysqli_query($connect, $sql);
    $fooddetails = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/ShowRecipe.css">
</head>
<body>
    <section>
        <a href="javascript:history.go(-1);"><i class="fa-solid fa-arrow-left"></i></a>
        <img src="<?php echo $fooddetails['image_path']; ?>" alt="Food Sample" class="food_img">
        <div class="food">
            <div class="about_food">
                <h1 class="title"><?php echo $fooddetails['food_name'] ?> [ <?php echo $fooddetails['cuisine_type'] ?> ]</h1>
                <form action="profile.php" method="POST" class="submitfavorites">
                    <input type="hidden" name="foodid" value="<?php echo $fooddetails['food_id']?>">
                    <button type="submit" name="submitToFavorites" class="like"><i class="fa-solid fa-heart-circle-plus"></i></button>
                </form>
            </div>
            <h1 class="food_detail">Ingredients</h1>
            <p><?php echo $fooddetails['ingredients'] ?></p>
            <h1 class="food_detail">Instructions</h1>
            <p><?php echo $fooddetails['instructions'] ?></p>
        </div>
    </section>
    <footer>
        <div>FoodHub.com</div>
    </footer>
</body>
</html>