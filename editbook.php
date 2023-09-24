<?php
include('ui/header.php');
?>
<?php
include('module/connect.php');

// Kiểm tra xem biến $_POST['id'] có tồn tại không
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Truy vấn để lấy thông tin sách từ cơ sở dữ liệu
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id= $row['id'];
        $title = $row['title'];
        $author = $row['author'];
        $publication_year = $row['publication_year'];
        $isbn = $row['isbn'];
        $quantity = $row['quantity'];
        $book_title = $row['book_title'];
        $publisher = $row['publisher'];
    } else {
        echo "Không tìm thấy sách với ID: $id";
        exit;
    }
} else {
    echo "Lỗi: Không tìm thấy giá trị ID trong biến \$_GET";
    exit;
}
?>

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h2>Form Sửa Sách</h2>
                    <form action="./module/editbook.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <label for="title">Tiêu đề:</label>
                        <input type="text" name="title" value="<?php echo $title; ?>"><br>

                        <label for="author">Tác giả:</label>
                        <input type="text" name="author" value="<?php echo $author; ?>"><br>

                        <label for="publication_year">Năm xuất bản:</label>
                        <input type="text" name="publication_year" value="<?php echo $publication_year; ?>"><br>

                        <label for="isbn">ISBN:</label>
                        <input type="text" name="isbn" value="<?php echo $isbn; ?>"><br>

                        <label for="quantity">Số lượng:</label>
                        <input type="text" name="quantity" value="<?php echo $quantity; ?>"><br>

                        <label for="book_title">Tiêu đề sách:</label>
                        <input type="text" name="book_title" value="<?php echo $book_title; ?>"><br>

                        <label for="publisher">Nhà xuất bản:</label>
                        <input type="text" name="publisher" value="<?php echo $publisher; ?>"><br>

                        <input type="submit" name="submit" value="Lưu">
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include('ui/footer.php');
?>
