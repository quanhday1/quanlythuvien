<?php
include('ui/header.php');
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>Quản lý sách</h1>

                    <form action="./module/addbook.php" method="post">
                        <label for="title">Tiêu đề:</label>
                        <input type="text" id="title" name="title" required>

                        <label for="author">Tác giả:</label>
                        <input type="text" id="author" name="author" required>

                        <label for="publication_year">Năm xuất bản:</label>
                        <input type="text" id="publication_year" name="publication_year" required>

                        <label for="isbn">ISBN:</label>
                        <input type="text" id="isbn" name="isbn" required>

                        <label for="quantity">Số lượng:</label>
                        <input type="number" id="quantity" name="quantity" required>

                        <label for="book_title">Tiêu đề sách:</label>
                        <input type="text" id="book_title" name="book_title" required>

                        <label for="publisher">Nhà xuất bản:</label>
                        <input type="text" id="publisher" name="publisher" required>

                        <input type="submit" value="Thêm sách">
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
    <?php
include('ui/footer.php');
?>    