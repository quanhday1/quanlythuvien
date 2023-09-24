<?php
include('connect.php');

// Kiểm tra xem biến $_POST['id'] có tồn tại không
if (isset($_POST['id'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $publication_year=$_POST['publication_year'];
    $isbn=$_POST['isbn'];
    $quantity=$_POST['quantity'];
    $book_title= $_POST['book_title'];
    $publisher=$_POST['publisher'];
    // Xóa sách từ cơ sở dữ liệu
    $sql = "UPDATE books SET title = '$title', author = '$author', publication_year = '$publication_year', isbn = '$isbn', quantity = '$quantity', book_title = '$book_title', publisher = '$publisher' WHERE id = $id";
    if ($mysqli->query($sql) === TRUE) {
        $message = "Sửa dữ liệu thành công";

    // Tạo mã JavaScript để hiển thị thông báo
    $javascriptCode = "alert('" . addslashes($message) . "');";
    $javascriptCode .= "window.history.back();";
    // In ra mã JavaScript
    echo "<script>{$javascriptCode}</script>";

    sleep(2);
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
} else {
    echo "Lỗi: Không tìm thấy giá trị id trong biến \$_POST";
}

// Đóng kết nối
$mysqli->close();
?>


