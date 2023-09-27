<?php
include('ui/header.php');
?>

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>Lịch sử</h1>
                    
                    <table>
                        <tr>
                            <th class="bookif">Sách Mượn</th>
                            <th class="bookif">Người Mượn</th>
                            <th class="bookif">Ngày Mượn</th>
                            <th class="bookif">Hạn Trả</th>
                            <th class="bookif">Ngày Trả</th>
                            <th class="bookif">Tình Trạng </th>
                        </tr>
                    <?php
                    include('/xampp/htdocs/quanlythuvien/module/historyreader.php');
                    ?>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include('ui/footer.php');
?>
