<?php
include('connect.php');

$sql = "SELECT * FROM loans";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Truy vấn tên độc giả
        $readerId = $row['reader_id'];
        $readerQuery = "SELECT name FROM readers WHERE id = '$readerId'";
        $readerResult = $mysqli->query($readerQuery);
        $readerName = '';
        if ($readerResult->num_rows > 0) {
            $readerRow = $readerResult->fetch_assoc();
            $readerName = $readerRow['name'];
        }

        // Truy vấn tên sách
        $bookId = $row['book_id'];
        $bookQuery = "SELECT title FROM books WHERE id = '$bookId'";
        $bookResult = $mysqli->query($bookQuery);
        $bookName = '';
        if ($bookResult->num_rows > 0) {
            $bookRow = $bookResult->fetch_assoc();
            $bookName = $bookRow['title'];
        }

        echo '<tr>';
        echo '<td class="bookif">' . $bookName . '</td>';
        echo '<td class="bookif">' . $readerName . '</td>';
        echo '<td class="bookif">' . $row['borrow_date'] . '</td>';
        echo '<td class="bookif">' . $row['due_date'] . '</td>';
        echo '<td class="bookif">' . $row['return_date'] . '</td>';
        
        // Kiểm tra trạng thái mượn/trả của sách
       // Kiểm tra trạng thái mượn/trả của sách
        echo '<td class="bookif">';
        if ($row['return_date'] == null || $row['return_date'] == '0000-00-00') {
            // Chưa trả
            if (strtotime($row['due_date']) < strtotime(date("Y-m-d"))) {
                // Quá hạn
                echo '<span style="color: red;">Quá Hạn</span>';
            } else {
                // Đang mượn
                echo '<span style="color: blue;">Đang mượn</span>';            }
        } else {
            // Đã trả
            echo '<span style="color: green;">Đã trả</span>';
        }
        echo '</td>';
        
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">Không có lịch sử</td></tr>';
}

$mysqli->close();
?>