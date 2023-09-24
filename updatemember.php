<?php
include('ui/header.php');
?>

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>Quản lý sách</h1>
                    
                    <table>
                        <tr>
                            <th class="usersif">ID</th>
                            <th class="usersif">Tên</th>
                            <th class="usersif">Địa chỉ</th>
                            <th class="usersif">Thông tin liên hệ</th>
                            <th class="usersif" style="padding-right: 30px;">Chức năng</th>
                        </tr>
                    <?php
                    include('/xampp/htdocs/quanlythuvien/module/getmember.php');
                    ?>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include('ui/footer.php');
?>

