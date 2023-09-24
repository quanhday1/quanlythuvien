<?php
include('ui/header.php');
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>Quản lý sách</h1>

                    <form action="./module/addbook.php" method="post">
                        <label class="lb_book" for="title">Tiêu đề:</label>
                        <input class="lb_book" type="text" id="title" name="title" required>

                        <label class="lb_book" for="author">Tác giả:</label>
                        <input class="lb_book" type="text" id="author" name="author" required>

                        <label class="lb_book" for="publication_year">Năm xuất bản:</label>
                        <input class="lb_book" type="text" id="publication_year" name="publication_year" required>

                        <label class="lb_book" for="isbn">ISBN:</label>
                        <input class="lb_book" type="text" id="isbn" name="isbn" required>

                        <label class="lb_book" for="quantity">Số lượng:</label>
                        <input class="lb_book" type="number" id="quantity" name="quantity" required>

                        <label class="lb_book" for="book_title">Tiêu đề sách:</label>
                        <input class="lb_book" type="text" id="book_title" name="book_title" required>

                        <label class="lb_book" for="publisher">Nhà xuất bản:</label>
                        <input class="lb_book" type="text" id="publisher" name="publisher" required>

                        <input class="lb_book" type="submit" value="Thêm sách">
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
    <?php
include('ui/footer.php');
?>    