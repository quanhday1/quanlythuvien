<?php
include('ui/header.php');
?>

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>Quản lý sách</h1>
                    
                    <table>
                        <tr>
                            <th class="bookif">ID</th>
                            <th class="bookif">Title</th>
                            <th class="bookif">Publication Year</th>
                            <th class="bookif">ISBN</th>
                            <th class="bookif">Quantity</th>
                            <th class="bookif">Book Title</th>
                            <th class="bookif">Author</th>
                            <th class="bookif">Publisher</th>
                            <th class="bookif" style="padding-right: 30px;">Chức năng</th>
                        </tr>
                    <?php
                    include('/xampp/htdocs/quanlythuvien/module/getbook.php');
                    ?>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include('ui/footer.php');
?>

