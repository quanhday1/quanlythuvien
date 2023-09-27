<?php
  include('connect.php');
  

  $sql = "SELECT * FROM readers";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="bookif">' . $row['id'] . '</td>';
        echo '<td class="bookif">' . $row['name'] . '</td>';
        echo '<td class="bookif">' . $row['address'] . '</td>';
        echo '<td class="bookif">' . $row['contact_info'] . '</td>';

        
        echo '<td>';

        echo '<div class="button-group">';

        echo '<form style="display: inline-block;" method="post" action="./historyreader.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<button class="buttonclick" type="submit" name="action">Lịch sử</button>';
        echo '</form>';

        echo '<form style="display: inline-block;" method="post" action="./editmember.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<button class="buttonclick" type="submit" name="action">Sửa</button>';
        echo '</form>';

        echo '<form style="display: inline-block;" method="post" action="./module/delemember.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<button class="buttonclick" type="submit" name="action">Xóa</button>';
        echo '</form>';
        
        echo '</div>';
        echo '</td>';
  
        echo '</tr>';
    }
  } else {
      echo '<tr><td colspan="5">Không có người đọc</td></tr>';
  }
  $mysqli->close();
  ?>

