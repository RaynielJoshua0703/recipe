<?php 
    require '../PHP/connection.php';
    require '../PHP/share.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share</title>
    <link rel="stylesheet" href="../CSS/Share.css">
    <link rel="shortcut icon" href="../Images/logo_for_recipe-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* FOR FOOD NAME ERROR */
        <?php 
            if(isset($_POST['submit']) && empty($_POST['food_name'])) {
                echo "
                input[name='food_name'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='food_name']::placeholder {
                    color: white;
                }
                input[name='food_name']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR CUISINE TYPE ERROR */
        <?php 
            if(isset($_POST['submit']) && empty($_POST['cuisine_type'])) {
                echo "
                input[name='cuisine_type'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='cuisine_type']::placeholder {
                    color: white;
                }
                input[name='cuisine_type']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR INGREDIENTS ERROR */
        <?php 
            if(isset($_POST['submit']) && empty($_POST['ingredients'])) {
                echo "
                textarea[name = ingredients] {
                    background-color: rgba(255, 0, 0, .3);
                }
                textarea[name = ingredients]::placeholder {
                    color: white;
                }
                textarea[name = ingredients]:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR INSTRUCTIONS ERROR */
        <?php 
            if(isset($_POST['submit']) && empty($_POST['instructions'])) {
                echo "
                textarea[name = instructions] {
                    background-color: rgba(255, 0, 0, .3);
                }
                textarea[name = instructions]::placeholder {
                    color: white;
                }
                textarea[name = instructions]:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>
    </style>
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
        <section>
            <form action="Share.php" method="POST" enctype="multipart/form-data">
                <div class="image">
                    <?php echo isset($share_errors['image']) ? '<p class="error">'.$share_errors['image'].'</p>' : ''; ?>
                    <img id="chosen_image" alt="Food Image" class="image_preview">
                    <input type="file" name="recipe_image" id="recipe_image" accept="image/*">
                    <label for="recipe_image"><i class="fa-regular fa-image"></i> Upload Image</label>
                </div>
                <div>
                    <h1 class="food_name">Food Name</h1>
                    <input type="text" name="food_name" id="food" placeholder="<?php echo isset($share_errors['food_name']) ? $share_errors['food_name'] : ' '; ?>">
                </div>
                <div>
                    <h1 class="cuisine_type">Cuisine Type</h1>
                    <input type="text" name="cuisine_type" id="cuisine" placeholder="<?php echo isset($share_errors['cuisine_type']) ? $share_errors['cuisine_type'] : ' '; ?>">
                </div>
                <div>
                    <h1 class="ingredients">Ingredients</h1>
                    <textarea name="ingredients" id="ingredients" placeholder="<?php echo isset($share_errors['ingredients']) ? $share_errors['ingredients'] : ' '; ?>"></textarea>
                </div>
                <div>
                    <h1 class="instructions">Instructions</h1>
                    <textarea name="instructions" id="instructions" placeholder="<?php echo isset($share_errors['instructions']) ? $share_errors['instructions'] : ' '; ?>"></textarea>
                </div>
                <input type="submit" value="Submit" name="submit">
            </form>
        </section>
    </main>
    <footer>
        <div>FoodHub.com</div>
    </footer>

    <script src="../JavaScript/share_inputs.js"></script>
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

        document.getElementById('recipe_image').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('chosen_image');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</body>
</html>