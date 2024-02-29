<?php
session_start();
require "connection.php";

function getAllItems(){
    $con = connection();
    $sql = "SELECT items.id AS id,
                items.name AS `name`
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
                <a href="recipe.php" class="btn btn-primary">
                    Resipe List
                </a>
            </div>
            <div class="col text-end">
                <a href="add-recipe.php" class="btn btn-success">
                    <i class="fa-solid fa-plus-circle"></i>New Resipe?
                </a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col text-center">
                <h1>What will you have today?</h1>
                <br>
   
                <form method="post">
                    <input type="radio" value="Breakfast" name="category">
                    <label for="breakfast">Berakfast</label>
                    <input type="radio" value="Lunch" name="category">
                    <label for="lunch">Lunch</label>
                    <input type="radio" value="Dinner" name="category">
                    <label for="dinner">Dinner</label>
                </br>
            <button type="submit" class="btn btn-primary w-50" name="btn_click">Click</button>
        </div>
            </form>
</div>
</div>
<?php
if (isset($_POST['btn_click'])) {
    $category = $_POST['category'];
    $con = connection();
    $sql = "SELECT * FROM items WHERE category='$category' ORDER BY RAND() LIMIT 1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        ?>
 <table class="table table-hover align-middle border">
        <thead class="small table-success">
            <tr>
                <th>ID</th>
                <th style="width: 250px;">NAME</th>
                <th style="width: 250px;">CATEGORY</th>
                <th style="width:95px;"></th>
            </tr>
        </thead>
        <tbody>
        <tr>

                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['category'] ?></td>
                <td>
                    <a href="edit-item.php?id=<?= $row['id'] ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="delete-item.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-trash"></i>
                </a>
            </td>
            </tr>
            
        </tbody>    
    </table>
    

        <?php
    }


$con->close();
}

?>

   
   
         
</body>
</html>