<?php

    // Connection.
    require 'PHP/connection.php';

    //Sign Up
    require 'PHP/sign_up.php';

    // //Sign In
    require 'PHP/sign_in.php';

    //For Input
    $has_errors = !empty($signup_errors) || !empty($signin_errors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodHub - Sign In</title>
    <link rel="stylesheet" href="CSS/Login.css">
    <link rel="shortcut icon" href="Images/logo_for_recipe-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* FOR USER FIRST NAME SIGN UP ERROR */
        <?php 
            if(isset($_POST['signup_btn']) && empty($_POST['fname'])) {
                echo "
                input[name='fname'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='fname']::placeholder {
                    color: white;
                }
                input[name='fname']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR USER LAST NAME SIGN UP ERROR */
        <?php 
            if(isset($_POST['signup_btn']) && empty($_POST['lname'])) {
                echo "
                input[name='lname'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='lname']::placeholder {
                    color: white;
                }
                input[name='lname']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>
        
        /* FOR USER MOBILE NUMBER OR EMAIL SIGN UP ERROR */
        <?php 
            if(isset($_POST['signup_btn']) && empty($_POST['mobile_email'])) {
                echo "
                input[name='mobile_email'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='mobile_email']::placeholder {
                    color: white;
                }
                input[name='mobile_email']:focus::placeholder {
                    color: red;
                }
                ";
            }
            elseif(isset($_POST['signup_btn']) && $result_check_email->num_rows > 0){
                echo "
                input[name='mobile_email'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='mobile_email']::placeholder {
                    color: white;
                }
                input[name='mobile_email']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR USER PASSWORD SIGN UP ERROR */
        <?php
            if(isset($_POST['signup_btn']) && empty($_POST['password'])) {
                echo "
                input[name='password'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='password']::placeholder {
                    color: white;
                }
                input[name='password']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR USER CONFIRM PASSWORD SIGN UP ERROR */
        <?php
            if(isset($_POST['signup_btn']) && empty($_POST['confirm_password'])) {
                echo "
                input[name='confirm_password'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='confirm_password']::placeholder {
                    color: white;
                }
                input[name='confirm_password']:focus::placeholder {
                    color: red;
                }
                ";
            }
            elseif (isset($_POST['signup_btn']) && $confirm_password !== $password) {
                echo "
                input[name='confirm_password'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='confirm_password']::placeholder {
                    color: white;
                }
                input[name='confirm_password']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR USER EMAIL SIGN IN ERROR */
        <?php
            if(isset($_POST['signin']) && empty($_POST['si_email'])) {
                echo "
                input[name='si_email'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='si_email']::placeholder {
                    color: white;
                }
                input[name='si_email']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR USER PASSWORD SIGN IN ERROR */
        <?php
            if(isset($_POST['signin']) && empty($_POST['si_password'])) {
                echo "
                input[name='si_password'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='si_password']::placeholder {
                    color: white;
                }
                input[name='si_password']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>

        /* FOR INVALID EMAIL AND PASSWORD SIGN IN ERROR */
        <?php
            if (!empty($signin_errors['signin']) || !empty($signin_errors['si_password'])) {
                echo "
                input[name='si_email'], input[name='si_password'] {
                    background-color: rgba(255, 0, 0, .3);
                }
                input[name='si_email']::placeholder, input[name='si_password']::placeholder {
                    color: white;
                }
                input[name='si_email']:focus::placeholder, input[name='si_password']:focus::placeholder {
                    color: red;
                }
                ";
            }
        ?>
    </style>
</head>
<body>
    <header>
        <img src="Images/logo_for_recipe-removebg-preview.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li>
                    <div class="sign_in" onclick="showSignIn()">Sign In</div>
                </li>
                <li>
                    <div>
                        <button class="sign_up" onclick="showSignUp()">Sign Up</button>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <!-- SIGN IN -->
    <div id="signin">
        <div class="signin_modal">
            <div class="for_btn">
                <i class="fa-solid fa-arrow-left" onclick="closeSignIn()"></i>
            </div>
            <h1 class="sign-in-title">Sign In</h1>
            <form action="index.php" class="sign_in_form" method="POST">
                <input type="text" name="si_email" id="si_email" placeholder="<?php echo isset($signin_errors['si_email']) ? $signin_errors['si_email'] : 'Email or Mobile number'; ?>" class="si_email">
                <input type="password" name="si_password" id="si_password" placeholder="<?php echo isset($signin_errors['si_password']) ? $signin_errors['si_password'] : 'Password'; ?>" class="si_password">
                <div class="sign_In_showPassword">
                    <input type="checkbox" id="showPassword" class="show_password" onchange="signInShowPassword()">
                    <label for="showPassword">Show Password</label>
                </div>
                <input type="submit" name="signin" value="Sign In" class="sign_in_btn">
            </form>
        </div>
    </div>

    <!-- SIGN UP -->
    <div id="signup">
        <div class="signup_modal">
            <div class="for_btn">
                <i class="fa-solid fa-arrow-left" onclick="closeSignUp()"></i>
            </div>
            <h1 class="sign-up-title">Sign Up</h1>
            <form action="index.php" class="sign_up_form" method="POST">
                <div class="name">
                    <input type="text" class="fname" id="fname" placeholder="<?php echo isset($signup_errors['fname']) ? $signup_errors['fname'] : 'First Name'; ?>" name="fname" autocomplete="off">
                    <input type="text" class="lname" id="lname" placeholder="<?php echo isset($signup_errors['lname']) ? $signup_errors['lname'] : 'Last Name'; ?>" name="lname" autocomplete="off">
                </div>
                <input type="text" class="phone-email" id="mobile_email" placeholder="<?php echo isset($signup_errors['mobile_email']) ? $signup_errors['mobile_email'] : 'Mobile number or Email'; ?>" name="mobile_email" autocomplete="off">
                <input type="password" class="password" id="password" placeholder="<?php echo isset($signup_errors['password']) ? $signup_errors['password'] : 'Password'; ?>" name="password" autocomplete="off">
                <div class="sign_Up_showPassword">
                    <input type="checkbox" id="sign_up_showPassword" class="show_password" onchange="signUpShowPassword()">
                    <label for="sign_up_showPassword">Show Password</label>
                </div>
                <input type="password" class="password" id="confirm_password" placeholder="<?php echo isset($signup_errors['confirm_password']) ? $signup_errors['confirm_password'] : 'Confirm Password'; ?>" name="confirm_password" autocomplete="off">
                <div class="sign_Up_showConfirmPassword">
                    <input type="checkbox" id="sign_up_showConfirmPassword" class="show_password" onchange="signUpShowConfirmPassword()">
                    <label for="sign_up_showConfirmPassword">Show Confirm Password</label>
                </div>
                <input type="submit" value="Sign Up" class="submit" name="signup_btn">
            </form>
        </div>
    </div>
    <main>
        <section>
            <div class="text">
                <h1 class="title">Learn. Cook. Share. Cooking Made Easy.</h1>
                <p>A platform designed to simplify your culinary journey.</p>
                <button class="view" onclick="showSignIn()">Browse Dish</button>
            </div>
            <img src="Images/food_img.png" alt="Food">
        </section>
    </main>

    <!-- FOR INPUTS -->
    <?php if ($has_errors): ?>
        <!-- Include the inputs.js script only if there are errors -->
        <script src="JavaScript/inputs.JS"></script>
    <?php endif; ?>

    <script src="JavaScript/sign_in.js"></script>
    <script src="JavaScript/sign_up.js"></script>
    <script src="JavaScript/show_password.js"></script>

</body>
</html>