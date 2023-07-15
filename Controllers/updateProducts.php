<?php
session_start();
include('../Config/connectDB.php');

if (isset($_POST['update_book_btn'])) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];
    $book_desc = $_POST['book_desc'];

    try {

        $query = "UPDATE book SET book_name=:book_name,category_id=:category_id, book_desc=:book_desc WHERE book_id=:book_id";
        $statement = $conn->prepare($query);

        $data = [
            ':book_name' => $book_name,
            ':category_id' => $category_id,
            ':book_desc' => $book_desc,
            ':book_id' => $book_id,
        ];
        $query_execute = $statement->execute($data);
        //
        header('Location: ../index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
