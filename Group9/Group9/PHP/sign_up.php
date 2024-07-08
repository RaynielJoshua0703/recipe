<?php
    $signup_errors = array();
    if(isset($_POST['signup_btn'])) {
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $mobile_email = htmlspecialchars($_POST['mobile_email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        //VALIDATION.
        if (empty($fname)) {
            $signup_errors['fname'] = "Empty First Name";
        }
        if (empty($lname)) {
            $signup_errors['lname'] = "Empty Last Name";
        }
        if (empty($mobile_email)) {
            $signup_errors['mobile_email'] = "Empty Mobile number or Email.";
        }
        if (empty($password)) {
            $signup_errors['password'] = "Empty Password.";
        }
        if (empty($confirm_password)) {
            $signup_errors['confirm_password'] = "Empty Confirm Password.";
        } 
        elseif ($confirm_password !== $password) {
            $signup_errors['confirm_password'] = "Passwords do not match.";
        }

        // CHECK IF EMAIL IS ALREADY EXIST.
        $query_check_email = "SELECT * FROM user_accounts WHERE user_email=?";
        $stmt_check_email = $connect->prepare($query_check_email);
        $stmt_check_email->bind_param('s', $mobile_email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();
        
        if ($result_check_email->num_rows > 0) {
            $signup_errors['mobile_email'] = "Can't create double email account.";
        }
        
        //COUNTING ERRORS
        if(count($signup_errors) == 0) {
            
            //PASSWORD HASHING.
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //INSERT INTO DATABASE.
            $query = "INSERT INTO user_accounts (user_fname, user_lname, user_email, user_pass, date_created) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";

            $stmt = $connect->prepare($query);
			$stmt->bind_param('ssss',$fname, $lname, $mobile_email, $hashed_password);

            if ($stmt->execute()) {
				header('location: index.php');
			}
			else {
				$signup_errors['db_error'] = "Database error: Failed to Submit";
			}
        }
    }