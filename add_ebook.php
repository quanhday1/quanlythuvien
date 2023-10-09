<?php
include('ui/header.php');
include('module/connect.php');
// Xử lý khi người dùng submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $title = $_POST["title"];
    $format = $_POST["format"];
    $url = ""; // Khởi tạo biến $url rỗng

    // Xử lý file upload
    if (isset($_FILES["file"])) {
        $file = $_FILES["file"];
        $file_name = $file["name"];
        $file_tmp = $file["tmp_name"];

        // Đường dẫn thư mục để lưu trữ file
        $upload_dir ="luutru/";

        // Di chuyển file tạm thời vào thư mục lưu trữ
        $destination = $upload_dir . $file_name;
        move_uploaded_file($file_tmp, $destination);

        // Lưu đường dẫn tệp vào biến $url
        $url = $destination;
    }

    // Xử lý file upload hình ảnh giới thiệu
    if (isset($_FILES["img_url"])) {
        $img_file = $_FILES["img_url"];
        $img_file_name = $img_file["name"];
        $img_file_tmp = $img_file["tmp_name"];

        // Đường dẫn thư mục để lưu trữ file hình ảnh giới thiệu
        $img_upload_dir = "luutru/";

        // Di chuyển file tạm thời vào thư mục lưu trữ
        $img_destination = $img_upload_dir . $img_file_name;
        move_uploaded_file($img_file_tmp, $img_destination);

        // Lưu đường dẫn tệp hình ảnh giới thiệu vào biến $imgUrl
        $imgUrl = $img_destination;
    }

    $gioiThieu = $_POST["gioi_thieu"];

    // Kiểm tra xem các trường đã được điền đầy đủ hay chưa
    if (!empty($title) && !empty($format) && !empty($url) && !empty($imgUrl) && !empty($gioiThieu)) {
        // Thực hiện truy vấn để thêm ebook vào bảng electronic_documents
        $sql = "INSERT INTO electronic_documents (title, format, url, img_url, gioi_thieu) 
                VALUES ('$title', '$format', '$url', '$imgUrl', '$gioiThieu')";

        if (mysqli_query($mysqli, $sql)) {
            echo "Thêm ebook thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($mysqli);
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin ebook.";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add ebook</h1>
    <!-- Form để nhập thông tin ebook -->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <!-- Các trường thông tin ebook -->
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" id="title">

        <label for="format">Định dạng:</label>
        <input type="text" name="format" id="format">
        <!-- lưu trữ tệp tin -->
        <label for="file">Tệp:</label>  
        <input type="file" name="file" id="file">
        <!-- lưu trữ hình ảnh giới thiệu tệp -->
        <label for="img_url">Hình ảnh giới thiệu:</label>
        <input type="file" name="img_url" id="img_url">

        <label for="gioi_thieu">Giới thiệu:</label>
        <textarea name="gioi_thieu" id="gioi_thieu"></textarea>

        <!-- Button để submit form -->
        <button class="themebook" type="submit">Thêm ebook</button>
    </form>
</div>
<!-- /.container-fluid -->

<?php
include('ui/footer.php');
?>