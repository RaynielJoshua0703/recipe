<?php 
    require '../PHP/profile.php';
?>

<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
error_reporting(E_ERROR | E_PARSE);

$user_id = $user_profile['user_id'];

if(isset($_POST['submitToFavorites'])){
    $foodid = $_POST['foodid'];

    $query_user = "SELECT * FROM recipe_repository.favorites WHERE iduser = ? AND idrecipe = ?";
    $stmt_user = $connect->prepare($query_user);
    $stmt_user->bind_param('ii', $user_id, $foodid);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows == 0) {
        $query = "INSERT INTO recipe_repository.favorites (idrecipe, iduser) VALUES (?, ?)";
        $stmt = $connect->prepare($query);
        $stmt->bind_param('ii',$foodid,$user_id);
        $stmt->execute();
    }

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../CSS/Profile.css">
    <link rel="shortcut icon" href="../Images/logo_for_recipe-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <img src="../Images/logo_for_recipe-removebg-preview.png" alt="Logo" class="logo">
        <a href="Home.php" class="home">Home</a>
        <a href="Share.php" class="share">Share</a>
        <div>
            <form action="Home.php" method="POST">
                <input type="text" name="search" id="search" placeholder="Search" autocomplete="off" onfocus="showClearIcon()" oninput="showClearIcon()" onblur="hideClearIcon()">
                <i class="fa-solid fa-magnifying-glass" id="fa-magnifying-glass"></i>
                <i class="fa-solid fa-x" onclick="clearSearch()" id="fa_x"></i>
            </form>
        </div>
        <a href="Profile.php" class="fa-solid fa-user"></a>
        <i class="fa-solid fa-caret-down" onclick="dropSignOut()"></i>

        <div class="sign_out">
            <a href="../PHP/sign_out.php" class="signout">Sign Out</a>
        </div>
    </header>
    <main>
        <section class="prof">
            <div class="img">
                <?php if(isset($user_profile['user_image'])){?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($user_profile['user_image']); ?>" class="post-image">
                <?php }?>
            </div>
            <a href="../PHP/profileimage.php?user_id=<?php echo $user_profile['user_id']; ?>">EDIT PROFILE</a>

            <h1 class="user_name"><?php echo $user_profile['user_fname'];?> <?php echo $user_profile['user_lname'];?></h1>
             
        </section>
        <section class="favorites">
            <h1 class="fav_title">Favorites</h1>
            <div class="favorite">

                <?php $sql = "SELECT * FROM recipe_repository.favorites WHERE iduser = $user_id" ;
                    $result = mysqli_query($connect, $sql);
                    $foods = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    mysqli_free_result($result);

                    foreach($foods as $food){
                      $foodid = $food['idrecipe'];

                      $sql = "SELECT * FROM recipe_repository.recipes WHERE food_id = $foodid ;";
                      $result = mysqli_query($connect, $sql);
                      $foodDetail = mysqli_fetch_assoc($result);

                ?>
                <div class="fav">
                    <div class="image">
                    <img src="<?php echo $foodDetail['image_path']; ?>" alt="Food Sample" class="food_img">
                    </div>
                    <div class="food">
                    <a class="food_name" href="showrecipe.php?food=<?php echo $foodDetail['food_id']; ?>"> <h1 class="food_name"><?php echo $foodDetail['food_name'] ?> <?php echo $foodDetail['cuisine_type'] ?></h1></a>
                    <a class="food_name" href="deletefavorite.php?food=<?php echo $foodDetail['food_id']; ?>"> delete </a>
                    </div>
                </div>
                <?php 
                    }
                ?>

            </div>
        </section>
    </main>
    <footer>
        <div>FoodHub.com</div>
    </footer>
    <script>
        function showClearIcon() {
            document.getElementById('fa_x').style.opacity = "1";
            document.getElementById('fa-magnifying-glass').style.color = "black";
        }

        function hideClearIcon() {
            const searchInput = document.getElementById('search');
            if (searchInput.value === "") {
                document.getElementById('fa_x').style.opacity = "0";
                document.getElementById('fa-magnifying-glass').style.color = "gray";
            }
        }

        function clearSearch() {
            const searchInput = document.getElementById('search');
            searchInput.value = "";
            hideClearIcon();
        }

        function dropSignOut() {
            var signOutElement = document.querySelector('.sign_out');
            signOutElement.classList.toggle('visible');
        }
    </script>
</body>
</html>