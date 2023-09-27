<?php include('ui/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blank Page nè</h1>
    <a href="./returnbook.php" class="square-button">
        <i class="fas fa-book-return"></i>
        Trả sách
    </a>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include('ui/footer.php'); ?>

<style>
    .square-button {
        display: inline-block;
        width: 100px;
        height: 100px;
        border: 1px solid #ccc;
        text-align: center;
        text-decoration: none;
        color: #fff; /* Màu chữ */
        background-color: #007bff; /* Màu nền */
        font-size: 14px;
        font-weight: bold;
        padding-top: 35px;
        border-radius: 10px; /* Viền bo góc */
        transition: background-color 0.3s; /* Hiệu ứng hover */
    }

    .square-button:hover {
        background-color: #0056b3; /* Màu nền khi hover */
        color: #fff; /* Màu chữ */
        text-decoration: none;
    }

    .square-button i {
        margin-bottom: 10px;
        font-size: 24px;
        
    }
</style>
