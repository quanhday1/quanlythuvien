<?php
include('ui/header.php');

// Kết nối đến cơ sở dữ liệu
include('module/connect.php');

// Xử lý khi người dùng xóa ebook
if (isset($_GET['delete'])) {
    $ebookId = $_GET['delete'];

    // Xóa ebook khỏi cơ sở dữ liệu
    $sqlDelete = "DELETE FROM electronic_documents WHERE id = '$ebookId'";
    if ($mysqli->query($sqlDelete) === TRUE) {
        echo "Xóa ebook thành công.";
    } else {
        echo "Lỗi khi xóa ebook: " . $mysqli->error;
    }
}

// Xử lý khi người dùng submit form tìm kiếm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $fileType = $_POST['fileType'];

    // Truy vấn cơ sở dữ liệu để tìm kiếm ebook theo tên hoặc loại tệp
    $sqlSearch = "SELECT * FROM electronic_documents WHERE title LIKE '%$searchTerm%'";

    // Nếu có loại tệp được chọn, thêm điều kiện lọc theo loại tệp
    if (!empty($fileType)) {
        $sqlSearch .= " AND format = '$fileType'";
    }

    $result = $mysqli->query($sqlSearch);
} else {
    // Truy vấn cơ sở dữ liệu để lấy danh sách ebook
    $sqlSelect = "SELECT * FROM electronic_documents";
    $result = $mysqli->query($sqlSelect);
}
?>

<form method="post" action="">
    <input type="text" name="search" placeholder="Tìm kiếm theo tên hoặc loại tệp">
    <select name="fileType">
        <option value="">Tất cả</option>
        <?php
        // Truy vấn cơ sở dữ liệu để lấy danh sách các loại file duy nhất từ cột "format"
        $sqlFileType = "SELECT DISTINCT format FROM electronic_documents";
        $resultFileType = $mysqli->query($sqlFileType);

        // Hiển thị các option cho combobox
        while ($rowFileType = $resultFileType->fetch_assoc()) {
            $fileType = $rowFileType['format'];
            $selectedFileType = ($fileType == $selectedFileType) ? 'selected' : '';
            echo "<option value='$fileType' $selectedFileType>$fileType</option>";
        }
        ?>
    </select>
    <input type="submit" value="Tìm kiếm">
</form>

<table>
    <tr>
        <th>Hình ảnh</th>
        <th>Tiêu đề sách</th>
        <th>Thao tác</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        // Hiển thị danh sách ebook hoặc kết quả tìm kiếm
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='" . $row["img_url"] . "' width='100px' heigh='100px'></td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td><a href='edit_ebook.php?id=" . $row["id"] . "'>Sửa</a> ";
            echo "<a href='?delete=" . $row["id"] . "'>Xóa</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Không có ebook nào.</td></tr>";
    }
    ?>
</table>

<?php
// Hiển thị thông báo khi không có kết quả tìm kiếm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && $result->num_rows === 0) {
    echo "<div class='message'>Không tìm thấy kết quả.</div>";
}

// Đóng kết nối cơ sở dữ liệu
$mysqli->close();

include('ui/footer.php');
?>