<?php
session_start();
require "connection.php";

function addItem($name, $category){
    $con = connection();
    $sql = "INSERT INTO `items`(`name`,`category`) VALUES ('$name','$category')";
if($con->query($sql)){
    header("location: top.php");
    // go to products.php of the query is successful
    exit;
    // same as die()
}else{
    die("Error in adding a new item: ".$con->error);
}
}
if(isset($_POST['btn_add'])){
    $name = $_POST['name']; 
    $category = $_POST['category']; 
    addItem($name, $category);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What will you have today?</title>
     <!--Local / Offline Bootstrap-->
     <link rel="stylesheet" href="css/bootstrap.css">
    <!--CDN / Online Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--CDN for Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


    <main class="container">
    <div class="row justify-content-center">
        <div class="col-3">
        <h2 class="fw-light mb-3">New Recipe</h2>
        <form action ="" method ="post">
            <div class="mb-3">
                <label for="" class="form-label small fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" max="50" required autofocus>
            </div>
            <div class="mb-3">
               <select class="form-select" name="category">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
                
            </select>
            </div>
            <a href="top.php" class="btn btn-outline-success">Cancel</a>
            <button type="submit" class="btn btn-success fw-bold px-5" name="btn_add">
                <i class="fa-solid fa-plus"></i>Add
            </button>
        </form>
        </div>
        </div>   
    </main> 
</body>
</html>