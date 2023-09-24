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
                    <h2>Đăng kí mượn sách</h2>
                    <form action="./module/editbook.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <label for="title">Tiêu đề:</label>
                        <input type="text" name="title" value="<?php echo $title; ?>"><br>

                        <label for="author">Tác giả:</label>
                        <input type="text" name="author" value="<?php echo $author; ?>"><br>

                        <label for="publisher">Người mượn:</label>
                        <input type="text" name="publisher"><br>

                        <label for="publisher">Ngày mượn:</label>
                        <input type="text" name="publisher"><br>

                        <label for="publisher">Hạn trả:</label>
                        <input type="text" name="publisher"><br>

                        <label for="publisher">Ngày trả:</label>
                        <input type="text" name="publisher"><br>


                        <input type="submit" name="submit" value="Lưu">
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include('ui/footer.php');
?>
