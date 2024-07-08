<?php
    session_start();
    $signin_errors = array();
    
    if(isset($_POST['signin'])) {
        $si_email = htmlspecialchars($_POST['si_email']);
        $si_password = htmlspecialchars($_POST['si_password']);

        //VALIDATION.
        if (empty($si_email)) {
            $signin_errors['si_email'] = "Empty Email or Mobile number";
        }
        if (empty($si_password)) {
            $signin_errors['si_password'] = "Empty Password";
        }

        //COUNTING ERRORS
        if(count($signin_errors) == 0) {

            //SELECT FROM USER ACCOUNTS.
            $query_user = "SELECT * FROM user_accounts WHERE user_email=?";
            $stmt_user = $connect->prepare($query_user);
            $stmt_user->bind_param('s', $si_email);
            $stmt_user->execute();
            $result_user = $stmt_user->get_result();

            if ($result_user->num_rows == 1) {
                $user_data = $result_user->fetch_assoc();
                if (password_verify($si_password, $user_data['user_pass'])) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header('location: Pages/Home.php');
                    exit();
                }
            }

            $signin_errors['si_email'] = "Invalid Email";
            $signin_errors['si_password'] = "Invalid Password";
        }
    }