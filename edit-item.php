<?php
session_start();
require "connection.php";

$id = $_GET['id'];
$item = getItem($id); 

//Get item ID
function getItem($id){
    $con = connection();
    $sql = "SELECT * FROM items WHERE id =$id";

    if($result = $con->query($sql)){
        return $result->fetch_assoc();
        // returns an associative array
        // we are expecting only 1 row of data
    }else{
        die("Error in retrieving all sections: ".$con->error);
    }
}

function updateItem($id, $name, $category){
    $con = connection();
    $sql ="UPDATE `items` SET `name`='$name',`category`='$category' WHERE id = $id";



if($con->query($sql)){
    header("location: top.php");
    exit;
} else{
    die("Error in updating the item: ".$con->error);
}
}
if(isset($_POST['btn_update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    updateItem($id, $name, $category);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2 class="fw-light mb-3">New Item</h2>
        <form action ="" method ="post">
            <div class="mb-3">
                <label for="" class="form-label small fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" max="50" value="<?= $item['name']?>" required autofocus>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label small fw-bold">Category</label>
                <select class="form-select" name="category">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
                
            </select>
            </div>
            <a href="top.php" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-secondary fw-bold" name="btn_update">
                <i class="fa-solid fa-check"></i>Save Changes
            </button>
        </form>
        </div>
        </div>   
    </main> 

</body>
</html>