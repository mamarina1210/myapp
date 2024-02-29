<?php
require "connection.php";

function addUser($user, $pass){
    $con = connection();

    
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$user','$pass')";
    
    if($con->query($sql)){
        header("location: sign-in.php");
        exit;
    }else{
        die("Error in signing up: ".$con->error);
    }
    }

    if(isset($_POST['btn_sign_up'])){
        $user =$_POST['username'];
        $pass =$_POST['password'];
        $conf_pass =$_POST['conf_pass'];

        // check if the password and confirm password are the same
        if($pass == $conf_pass){
            // call the function that will insert data into the database
            addUser($user, $pass);

        }else{
            echo '<p class="alert alert-danger">Password and Confirm Password do not match.</p>';

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!--Local / Offline Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--CDN / Online Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--CDN for Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div style="height: 100vh;">
    <div class="row h-100 m-0">
        <div class="card w-25 mx-auto my-auto p-0">
            <div class="card-header text-success">
                <h1 class="card-title h3 mb-0">
                    Create Your Account
                </h1>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label small fw-bold">Username</label>
                        <input type="text" name="username" id="username" class="form-control" maxlength="15" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label small fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control mb-2" required>
                    </div>
                    <div class="mb-5">
                        <label for="conf-pass" class="form-label small fw-bold">Password Confirm</label>
                        <input type="password" name="conf_pass" id="conf-pass" class="form-control mb-2">
                    </div>

                    <button type="submit" class="btn btn-success w-100" name="btn.sign_up">
                    Sign Up
                </button>
                </form>
                <div class="text-center mt-3">
                    <p class="small">Already have an account? <a href="sign-in.php">Login</a></p>
                </div>

            </div>
        </div>
    </div>
    </div>
    
</body>
</html>