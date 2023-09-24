<?php
include('connect.php');

// Lấy dữ liệu từ form
$title = $_POST['title'];
$author = $_POST['author'];
$publication_year = $_POST['publication_year'];
$isbn = $_POST['isbn'];
$quantity = $_POST['quantity'];
$book_title = $_POST['book_title'];
$publisher = $_POST['publisher'];
// Thêm sách vào cơ sở dữ liệu
$sql = "INSERT INTO books (title, author, publication_year, isbn, quantity, book_title, publisher)
        VALUES ('$title', '$author', '$publication_year', '$isbn', '$quantity', '$book_title', '$publisher')"; 
if ($mysqli->query($sql) === TRUE) {
    $message = "Thêm sách thành công";

    // Tạo mã JavaScript để hiển thị thông báo
    $javascriptCode = "alert('" . addslashes($message) . "');";
    $javascriptCode .= "window.history.back();";
    // In ra mã JavaScript
    echo "<script>{$javascriptCode}</script>";

    sleep(2);
} else {
    echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
}

// Đóng kết nối
$mysqli->close();
?>