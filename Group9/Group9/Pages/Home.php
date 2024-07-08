<?php
    require '../PHP/connection.php';
    $display = "SELECT * FROM recipes";
    $query = mysqli_query($connect, $display);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="shortcut icon" href="../Images/logo_for_recipe-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <img src="../Images/logo_for_recipe-removebg-preview.png" alt="Logo" class="logo">
        <a href="Home.php" class="home">Home</a>
        <a href="Share.php" class="share">Share</a>
        <form action="Home.php" method="POST">
            <input type="text" name="search" id="search" placeholder="Search" autocomplete="off" onfocus="showClearIcon()" oninput="showClearIcon()" onblur="hideClearIcon()">
            <button name="search_btn" class="fa-solid fa-magnifying-glass" id="fa-magnifying-glass"></button>
            <i class="fa-solid fa-x" onclick="clearSearch()" id="fa_x"></i>
        </form>
        <a href="Profile.php" class="fa-solid fa-user"></a>
        <i class="fa-solid fa-caret-down" onclick="dropSignOut()"></i>
        <div class="sign_out">
            <a href="../PHP/sign_out.php" class="signout">Sign Out</a>
        </div>
    </header>
    <main>
        <section class="recommendation">
            <div class="recommend_food">
                <?php 
                $sql = "SELECT * FROM recipes ORDER BY food_id DESC LIMIT 1";
                $result = mysqli_query($connect, $sql);
                $fooddetails = mysqli_fetch_assoc($result);

                ?>
                <h1 class="food_title"><?php echo $fooddetails['food_name'] ?><span> [ <?php echo $fooddetails['cuisine_type'] ?> ]</span></h1>
                <p class="food_desc"><?php echo $fooddetails['ingredients'] ?></p>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <img src="<?php echo $fooddetails['image_path'] ?>" alt="Food Image" class="recommend_food_img">
        </section>
        <section class="section_2">
            <h1 class="section_2_food_title">Foods</h1>
        </section>
        <section class="foods">
            <?php
                if (isset($_POST['search_btn'])) {
                    $search = htmlspecialchars($_POST['search']);
                    $result = mysqli_query($connect, "SELECT * FROM recipes WHERE food_name = '$search' or cuisine_type = '$search' or ingredients = '$search' or instructions = '$search'");
                    
                    if (mysqli_num_rows($result) == 0){ 
                            echo "<h1 class = 'failed'>Invalid.</h1>";
                    }
            ?> 
            <?php while($rows = mysqli_fetch_array($result)){ ?>
                <div class="food_dis">
                    <div class="image">
                        <img src="<?php echo $rows['image_path'] ?>" alt="Food Image" class="food_image">
                    </div>
                    <div class="food">
                        <a class="food_name" href="showrecipe.php?food=<?php echo $rows['food_id']; ?>"> <?php echo $rows['food_name']; ?> <span>[ <?php echo $rows['cuisine_type']; ?> ]</span> </a>
                    </div>
                </div>
                <?php } ?>
            <?php } 
            else { ?>
                <?php while($rows = mysqli_fetch_array($query)){ ?>
                    <div class="food_dis">
                        <div class="image">
                            <img src="<?php echo $rows['image_path'] ?>" alt="Food Image" class="food_image">
                        </div>
                        <div class="food">
                            <a class="food_name" href="showrecipe.php?food=<?php echo $rows['food_id']; ?>"> <?php echo $rows['food_name']; ?> <span>[ <?php echo $rows['cuisine_type']; ?> ]</span> </a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </section>
    </main>
    <footer>
        <div>FoodHub.com</div>
    </footer>
    <script src="../JavaScript/home.js"></script>
</body>
</html>