<?php
  include('connect.php');
  // Xử lý yêu cầu xóa sách
 

  // Xử lý yêu cầu sửa sách
  

  $sql = "SELECT * FROM books";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
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
        echo '<button class="delete-button" type="submit" name="action">Borrow</button>';
        echo '</form>';

        echo '<form style="display: inline-block;" method="post" action="./editbook.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<button class="delete-button" type="submit" name="action">Edit</button>';
        echo '</form>';

        echo '<form style="display: inline-block;" method="post" action="./module/delebook.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<button class="delete-button" type="submit" name="action">Delete</button>';
        echo '</form>';
        
        echo '</div>';
        echo '</td>';
  
        echo '</tr>';
    }
  } else {
      echo '<tr><td colspan="5">Không có sách</td></tr>';
  }
  $mysqli->close();
  ?>



<form style="display: inline-block; margin-right: 10px;" method="post" action="/module/delebook.php">