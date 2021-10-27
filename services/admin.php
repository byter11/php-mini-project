<?php

function getAll() {
	include './modules/database.php';
	
	$sql = "SELECT ticket_ID, ticket_number, accom_time, ticket_type, prize, seat_number, cust_ID
			FROM TICKET";

	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		extract($row);
		echo "<tr><th scope='row'>$ticket_ID</th>
			  <td>$ticket_number</td>
			  <td>$accom_time</td>
			  <td>$ticket_type</td>
			  <td>$prize</td>
			  <td>$seat_number</td>
			  <td>$cust_ID</td>
			  <td class='d-flex gap-1'>
			  <button
			  		onclick=initUpdateModal($ticket_ID) 
			  		class='btn btn-outline-primary btn-sm'
			  		data-bs-toggle='modal' data-bs-target='#addTicketModal'>
			  	Update
			  </button>
			  <form action='./modules/delete.php' method='post'>
			  	<input name='ticket_ID' type='hidden' value='$ticket_ID'>
				<input class='btn btn-outline-danger btn-sm' type='submit' value=' Delete '>
			  </form></td>
			  </tr>";
	}
	$conn->close();
}
?>