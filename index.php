<?php
include './Config/connectDB.php';
$query = "SELECT book_id, book_name, category_name, book_desc FROM book, category where book.category_id = category.category_id order by book_id desc";
$statement = $conn->prepare($query);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$books = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <h1>Danh sách mặt hàng đang có </h1>
    <a href="./View/form-add-product.php" class="btn btn-primary">Thêm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tên sách</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Thông tin</th>
                <td scope>Xóa</td>
                <td scope>Sửa</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($books as $book) {
            ?>
                <tr>
                    <td><?php echo $book->book_name ?></td>
                    <td><?php echo $book->category_name ?></td>
                    <td><?php echo $book->book_desc ?></td>
                    <td>
                        <form action="./Controllers/deleteProducts.php" method="POST">
                            <button onclick="return Del()" type="submit" name="delete_book" value="<?php echo $book->book_id; ?>" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                    <td>
                        <a href="./View/form-update-product.php?id=<?php echo $book->book_id ?>" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
    //them bien vao ()
    function Del() {
        return confirm("Bạn chắc chắn muốn xóa không?");
    }
</script>

</html>