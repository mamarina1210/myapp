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

function deleteItem($id){
    $con = connection();
    $sql = "DELETE FROM items WHERE id = $id";

    if($con->query($sql)){
        header("location: top.php");
        exit;
    }else {
        die("Error in deleteing the item: ".$con->error);
    }
}

if(isset($_POST['btn_delete'])){
    $id = $_GET['id'];
    deleteItem($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
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
                <div class="text-center mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-warning display-4"></i>
                    <h2 class="fw-light mb-3 text-danger">Delete Product</h2>
                    <p class="fw-bold mb-0">Are you sure you want to delete "<?=$item['name']?>"?</p>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="top.php" class="btn btn-secondary w-100">Cancel</a>
                    </div>
                    <div class="col">
                        <form method="post">
                            <button type="submit" class="btn btn-outline-secondary w-100" name="btn_delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>