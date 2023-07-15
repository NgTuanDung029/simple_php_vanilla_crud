<?php
session_start();
include("../Config/connectDB.php");

if (isset($_POST['delete_book'])) {
    $book_id = $_POST['delete_book'];
    try {

        $query = "DELETE FROM book WHERE book_id=:book_id";
        $statement = $conn->prepare($query);
        $data = [
            ':book_id' => $book_id
        ];
        $query_execute = $statement->execute($data);
        //
        header('Location: ../index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
