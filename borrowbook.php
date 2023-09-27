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
        $id = $row['id'];
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

// Kiểm tra xem người dùng đã nhấn nút "Lưu" hay chưa
if (isset($_POST['submit'])) {
    $book_id = $id;
    $reader_name = $_POST['reader'];
    $borrow_date = $_POST['borrow_date'];
    $due_date = $_POST['due_date'];
    // $return_date = $_POST['return_date'];

    // Truy vấn để lấy ID của người mượn từ cơ sở dữ liệu dựa trên tên người mượn
    $sql1 = "SELECT id FROM readers WHERE name = '$reader_name'";
    $result1 = $mysqli->query($sql1);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $reader_id = $row1['id'];

        // Thực hiện truy vấn để lưu thông tin mượn sách vào bảng loans của cơ sở dữ liệu
        $sql2 = "INSERT INTO loans (book_id, reader_id, borrow_date, due_date, return_date)
                VALUES ('$book_id', '$reader_id', '$borrow_date', '$due_date', '0000-00-00')";

        // Kiểm tra kết quả thành công hoặc thất bại
        if ($mysqli->query($sql2) === TRUE) {
            $loan_id = $mysqli->insert_id; // Lấy mã mượn sách tự tăng
            echo "Lưu thông tin mượn sách thành công.";
            echo '<script>alert("Mã mượn sách: ' . $loan_id . '");</script>';  // Hiển thị mã mượn sách trong thông báo  //đưa ra mã mượn sách chính là id của loans
        } else {
            echo "Lưu thông tin mượn sách thất bại.";
        }
    } else {
        echo "Không tìm thấy người mượn có tên: $reader_name";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2>Đăng kí mượn sách</h2>
    <form class="editbook" action="borrowbook.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" value="<?php echo $title; ?>"><br>

        <label for="author">Tác giả:</label>
        <input type="text" name="author" value="<?php echo $author; ?>"><br>

        <label for="reader">Người mượn:</label>
        <input type="text" name="reader"><br>

        <div class="containerdate">
            <div>
                <label for="borrow_date">Ngày mượn:</label>
                <input type="date" name="borrow_date"><br>
            </div>
            <div>
                <label for="due_date">Hạn trả:</label>
                <input type="date" name="due_date"><br>
            </div>
            <!-- <div>
                <label for="return_date">Ngày trả:</label>
                <input type="date" name="return_date"><br>
            </div> -->
        </div>

        <input type="hidden" name="id" value="<?php echo $id ?>"><br>

        <input type="submit" name="submit" value="Lưu">
    </form>

</div>
<!-- /.container-fluid -->

<?php
include('ui/footer.php');
?>