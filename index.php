<?php include('ui/header.php'); ?>

<!-- Begin Page Content -->
<h1 class="h3 mb-4 text-gray-800">Trang chủ</h1>
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- <a href="./borrowbook.php" class="square-button borrow-book">
        Đăng kí mượn sách
    </a> -->

    <a href="./returnbook.php" class="square-button return-book">
        Trả sách
    </a>

    <a href="./regismember.php" class="square-button regis-menber">
        Đăng kí thành viên
    </a>

    <a href="./updatemember.php" class="square-button manager-member">
        Quản lý thành viên
    </a>

    <a href="./analist.php" class="square-button analist">
        Thống kê dữ liệu
    </a>
    <a href="./add_ebook.php" class="square-button return-book">
        Thêm sách điện tử
    </a>
    <a href="./viewebook.php" class="square-button return-book">
        Quản lý sách điện tử
    </a>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include('ui/footer.php'); ?>

<style>
    .container-fluid{
        display: flex;
        justify-content: space-around;
    }

    .square-button {
        display: inline-block;
        width: 150px;
        height: 150px;
        border: 1px solid #ccc;
        text-align: center;
        text-decoration: none;
        color: #fff; /* Màu chữ */
        background-color: #007bff; /* Màu nền */
        font-size: 16px;
        font-weight: bold;
        padding-top: 55px;
        border-radius: 10px; /* Viền bo góc */
        transition: background-color 0.3s; /* Hiệu ứng hover */
        margin: 10px;
    }

    .square-button:hover {
        background-color: #0056b3; /* Màu nền khi hover */
        color: #fff; /* Màu chữ */
        text-decoration: none;
    }

    .square-button i {
        margin-bottom: 10px;
        font-size: 28px;
    }
</style>