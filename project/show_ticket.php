<?php
    include('connection.php');
	
	session_start();
	$name = $_SESSION['res'];
	
	$select = mysqli_query($conn, "SELECT * FROM ticket WHERE name = '$name'");
	$num_row = mysqli_num_rows($select);
	
	
    if( $num_row ) {
?>
	<table>
		<tr>
			<th>Name</th>
			<th>Station</th>
			<th>Sit Type</th>
			<th>Journey Date</th>
			<th>Journey Time</th>
			<th>Quantity</th>
			<th>Amount</th>
		</tr>
	<?php while($userrow = mysqli_fetch_array($select)){
		?>
		<tr>
			<td> <?php echo $userrow['name']; ?></td>
			<td> <?php echo $userrow['destination']; ?></td>
			<td> <?php echo $userrow['typ']; ?></td>
			<td>  <?php echo $userrow['dt']; ?></td>
			<td>  <?php echo $userrow['td']; ?></td>
			<td>  <?php echo $userrow['quantity']; ?></td>
			<td>  <?php echo $userrow['amount']; ?></td>
		</tr>
		<?php } ?>
        </table>
		
		<a href="main.php">Home</a>
		
<?php } ?>
