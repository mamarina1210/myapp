<?php
session_start();
require "connection.php";

function getAllItems(){
    $con = connection();
    $sql = "SELECT items.id AS id,
                items.name AS `name`,
                items.category AS `category`
            FROM items
            ORDER BY items.id";

if($result = $con->query($sql)){
    return $result;
}else{
    die('Error in retrieving all products: '.$con->error);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
     <!--Local / Offline Bootstrap-->
     <link rel="stylesheet" href="css/bootstrap.css">
    <!--CDN / Online Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--CDN for Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<main class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="fw-light">Recipes</h2>
            </div>

            <div class="col text-end">
                <a href="add-recipe.php" class="btn btn-success">
                    <i class="fa-solid fa-plus-circle"></i>New Resipe?
                </a>
            </div>
        </div>

 <table class="table table-hover align-middle border">
        <thead class="small table-success">
            <tr>
                <th>ID</th>
                <th>CATEGORY</th>
                <th style="width: 250px;">NAME</th>
                <th style="width:95px;"></th>
            </tr>
        </thead>
        <tbody>
            
        <?php
            $itemsResult = getAllItems();
            if ($itemsResult->num_rows > 0) {
                while ($row = $itemsResult->fetch_assoc()) {
                    ?>
                <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $row['name'] ?></td>
                <td>
                    <a href="edit-item.php?id=<?= $row['id'] ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="delete-item.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-trash"></i>
                </a>
            </td>
            </tr>
            <?php
                }
                
            }
            ?>

        </tbody>    
    </table>
    
<a href="top.php">Back</a>
         
</body>
</html>