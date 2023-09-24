<?php
include('ui/header.php');
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>Đăng kí thành viên</h1>

                    <form action="./module/addmember.php" method="post">
                        <label for="title">Tên:</label>
                        <input type="text" id="title" name="name" required>

                        <label for="author">Địa chỉ:</label>
                        <input type="text" id="author" name="address" required>

                        <label for="publication_year">Thông tin liên hệ</label>
                        <input type="text" id="publication_year" name="contact_info" required>

                        <input type="submit" value="Thêm thành viên">
                    </form>
                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
    <?php
include('ui/footer.php');
?>    