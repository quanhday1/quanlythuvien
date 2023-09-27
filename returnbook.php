<?php
include('ui/header.php');
include('module/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $loanId = $_POST['loan_id'];

    // Kiểm tra trạng thái trả sách
    $sql = "SELECT return_date FROM loans WHERE id='$loanId'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $returnDate = $row['return_date'];

        if ($returnDate !== '0000-00-00' ) {
            echo '<script>alert("Sách đã được trả!");</script>';
        } else {
            // Cập nhật ngày trả sách
            $returnDate = date("Y-m-d");
            $sql = "UPDATE loans SET return_date='$returnDate' WHERE id='$loanId'";

            if ($mysqli->query($sql) === TRUE) {
                echo '<script>alert("Trả sách thành công!");</script>';
            } else {
                echo '<script>alert("Lỗi: ' . $mysqli->error . '");</script>';
            }
        }
    } else {
        echo '<script>alert("Không tìm thấy thông tin mượn sách!");</script>';
    }

    $result->free_result();
}

$mysqli->close();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2>Trả Sách</h2>
    <form action="returnbook.php" method="POST">
        <label for="loan_id">Mã mượn sách:</label>
        <input type="text" id="loan_id" name="loan_id" required><br><br>
        
        <input type="submit" value="Trả sách">
    </form>

</div>
<!-- /.container-fluid -->

<?php
include('ui/footer.php');
?>