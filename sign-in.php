<?php
require "connection.php";
function login($user, $pass){
    $con = connection();
    $sql ="SELECT * FROM users WHERE username ='$user'";

    if($result = $con->query($sql)){
        // check if the username exists
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
            // check if the passowrd is correct
            if(password_verify($pass, $user['password'])){
                // *************SESSION
                session_start();
                $_SESSION['id'] =$user['id'];
                $_SESSION['username'] =$user['username'];
             

                header("location: view-items.php");
                exit;
            }else{
                echo '<p class="alert alert-danger">Incorrect Password.</p>';
            }
        }else{
            echo '<p class="alert alert-danger">Username not found.</p>';

        }
    }else{
        die("Error in retrieving the user: ".$con->error);
    }
}

if(isset($_POST['btn_login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    login($user, $pass);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Local / Offline Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--CDN / Online Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--CDN for Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div style="height: 100vh">
    <div class="row h-100 m-0">
        <div class="card w-25 my-auto mx-auto px-0">
            <div class="card-header text-primary bg-white">
                <h1 class="card-title text-center mb-0">What will you have today?</h1>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                    <label for="username" class="form-label small fw-bold">Username</label>
                    <input type="text" name="username" id="username" class="form-control" autofocus required>
                    </div>

                    <div class="mb-5">
                    <label for="password" class="form-label small fw-bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="btn_login">Login</button>
                </form>

                <div class="text-center mt-3">
                    <a href="sign-up.php" class="small">Create Account</a>
                </div>
            </div>
        </div>
    </div>
     </div>
    
</body>
</html>