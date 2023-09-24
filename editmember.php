<?php
include('ui/header.php');
?>
<?php
include('module/connect.php');

// Kiểm tra xem biến $_POST['id'] có tồn tại không
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Truy vấn để lấy thông tin sách từ cơ sở dữ liệu
    $sql = "SELECT * FROM readers WHERE id = $id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id= $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $contact_info = $row['contact_info'];
       
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
                    <h2>Sửa Thành Viên</h2>
                    <form action="./module/editmember.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <label for="title">Name:</label>
                        <input type="text" name="name" value="<?php echo $name; ?>"><br>

                        <label for="author">Địa chỉ:</label>
                        <input type="text" name="address" value="<?php echo $address; ?>"><br>

                        <label for="publication_year">Năm xuất bản:</label>
                        <input type="text" name="contact_info" value="<?php echo $contact_info; ?>"><br>

                        <input type="submit" name="submit" value="Lưu">
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include('ui/footer.php');
?>
