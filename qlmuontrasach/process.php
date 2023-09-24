<?php
include('connect.php');
// Lấy dữ liệu từ form
$reader_id = $_POST['reader_id'];
$book_id = $_POST['book_id'];
$borrow_date = $_POST['borrow_date'];
$return_date = $_POST['return_date'];

// Thêm thông tin mượn/trả sách vào cơ sở dữ liệu
$sql = "INSERT INTO borrowings (reader_id, book_id, borrow_date, return_date)
        VALUES ('$reader_id', '$book_id', '$borrow_date', '$return_date')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm thông tin mượn/trả sách thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>