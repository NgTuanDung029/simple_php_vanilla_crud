<?php
session_start();
include('../Config/connectDB.php');

if (isset($_POST['save_book_btn'])) {
    $book_name = $_POST['book_name'];
    $book_desc = $_POST['book_desc'];
    $category_id = $_POST['category_id'];

    $query = "INSERT INTO book (book_name, category_id, book_desc) VALUES (:book_name, :category_id, :book_desc)";
    $query_run = $conn->prepare($query);

    $data = [
        ':book_name' => $book_name,
        ':book_desc' => $book_desc,
        ':category_id' => $category_id,

    ];
    $query_execute = $query_run->execute($data);
    //
    header('Location: ../index.php');
}
