<?php
	function getAvailable(){
		include './modules/database.php';
	
		$sql = "SELECT ticket_ID, ticket_number, accom_time, ticket_type, prize, seat_number
				FROM TICKET
				WHERE cust_ID IS NULL";
				
		$result = $conn->query($sql);
		
		while($row = $result->fetch_assoc()) {
			extract($row);
			echo "<tr><th scope='row'>$ticket_ID</th>
				<td>$ticket_number</td>
				<td>$accom_time</td>
				<td>$ticket_type</td>
				<td>$prize</td>
				<td>$seat_number</td>
				<td class='d-flex gap-1'>

				<form action='./modules/book.php' method='post'>
					<input name='ticket_ID' type='hidden' value='$ticket_ID'>
					<input class='btn btn-outline-primary btn-sm' type='submit' value='Book'>
				</form></td>
				</tr>";
		}
		$conn->close();
	}

	function getOwned(){
		include './modules/database.php';
		$id = $_SESSION["USER_ID"];
		$sql = "SELECT ticket_ID, ticket_number, accom_time, ticket_type, prize, seat_number
			FROM TICKET
			WHERE cust_ID = $id";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			extract($row);
			echo "<tr><th scope='row'>$ticket_ID</th>
				<td>$ticket_number</td>
				<td>$accom_time</td>
				<td>$ticket_type</td>
				<td>$prize</td>
				<td>$seat_number</td>
				<td class='d-flex gap-1'>
				<form action='./modules/cancel.php' method='post'>
					<input name='ticket_ID' type='hidden' value='$ticket_ID'>
					<input class='btn btn-outline-danger btn-sm' type='submit' value='Cancel'>
				</form></td>
				</tr>";
		}
	}
?>