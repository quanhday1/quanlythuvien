<?php
include('ui/header.php');
include('module/connect.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1>Tìm kiếm</h1>
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
    // Kiểm tra xem có dữ liệu từ khóa tìm kiếm được gửi lên hay không
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];

        // Thực hiện truy vấn để tìm kiếm trong cơ sở dữ liệu
        $sql = "SELECT * FROM books WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Kết quả tìm kiếm:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td class="bookif">' . $row['id'] . '</td>';
                echo '<td class="bookif">' . $row['title'] . '</td>';
                echo '<td class="bookif">' . $row['publication_year'] . '</td>';
                echo '<td class="bookif">' . $row['isbn'] . '</td>';
                echo '<td class="bookif">' . $row['quantity'] . '</td>';
                echo '<td class="bookif">' . $row['book_title'] . '</td>';
                echo '<td class="bookif">' . $row['author'] . '</td>';
                echo '<td class="bookif">' . $row['publisher'] . '</td>';
                
                echo '<td>';
                echo '<div class="button-group">';
        
                echo '<form style="display: inline-block;" method="post" action="./borrowbook.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<button class="buttonclick" type="submit" name="action">Borrow</button>';
                echo '</form>';
        
                echo '<form style="display: inline-block;" method="post" action="./editbook.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<button class="buttonclick" type="submit" name="action">Edit</button>';
                echo '</form>';
        
                echo '<form style="display: inline-block;" method="post" action="./module/delebook.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<button class="buttonclick" type="submit" name="action">Delete</button>';
                echo '</form>';
            }
            echo "</ul>";
        } else {
            echo "Không tìm thấy kết quả phù hợp.";
        }
    }
    ?>
    </table>
    
</div>
<!-- /.container-fluid -->

<?php
include('ui/footer.php');
?>