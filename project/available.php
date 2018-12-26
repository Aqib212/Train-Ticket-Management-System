<?php
    include('connection.php');
	
	    $select = mysqli_query($conn, "SELECT * FROM train_info order by name");
	    $num_row = mysqli_num_rows($select);
	
    if( $num_row ) {
?>
      <table>
          <tr>
              <th>Train Name</th>
              <th>Normal</th>
              <th>Cabin</th>
              <th>Suit</th>
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select)  ) { ?>
          <tr>
              <td><?php echo $userrow['name']; ?></td>
              <td><?php echo $userrow['normal']; ?></td>
              <td><?php echo $userrow['cabin']; ?></td>
              <td><?php echo $userrow['suit']; ?></td>
              
          </tr>
          <?php } ?>
      </table>
<?php } ?>
