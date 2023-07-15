<?php
session_start();
include '../Config/connectDB.php';
$query = "select * from category";
$statement = $conn->prepare($query);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$categories = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thêm</title>
</head>

<body>
    <h1>Thêm sách</h1>
    <form action="../Controllers/addProducts.php" method="POST">
        <div class="mb-2">
            <label>Tên sách</label>
            <input type="text" name="book_name" class="form-control" />
        </div>
        <div class="mb-2">
            <label>Mô tả</label>
            <input type="text" name="book_desc" class="form-control" />
        </div>
        <div class="mb2">
            <select name="category_id" id="lang-select">
                <?php
                foreach ($categories as $category) {
                ?>
                    <option value="<?php echo $category->category_id ?>"><?php echo $category->category_name ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-2">
            <button type="submit" name="save_book_btn" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>