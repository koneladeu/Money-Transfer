<?php
session_start();
$transactions = []; 
if(isset($_SESSION['id']) && isset($_SESSION['phone'])){

require_once"connect_db.php";

$id = ($_SESSION['id']);
//$transaction = ($_SESSION['trans_id']);

$sql = "SELECT balance FROM user WHERE uid = $id";
$result = mysqli_query($conn, $sql);
$balance = mysqli_fetch_assoc($result)['balance'];

$sql = "SELECT 
    c.trans_date, 
    CONCAT(u1.name, '<br> ', u1.phone) AS sender, 
    CONCAT(u2.name, '<br> ', u2.phone) AS receiver, 
    c.amount,
    c.trans_number
FROM 
    transaction c 
    JOIN user u1 ON c.sender = u1.uid 
    JOIN user u2 ON c.receiver = u2.uid
WHERE 
    c.sender = $id OR c.receiver = $id 
ORDER BY 
    trans_date DESC";
$result = mysqli_query($conn, $sql);
$transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
// If the query returned a result, assign the balance to the $balance variable
/*if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $balance = $row['balance'];
  }*/

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Transactions</title>
	<script src="https://kit.fontawesome.com/9d20b8d774.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
</head>
<body>
	<header>
		<h1>View Transactions</h1>
		<nav>
		<ul>
  			<li><a href="homepage1.php" style="display: flex; flex-direction: column; align-items: center;"><i class="fa-solid fa-arrow-rotate-left fa-2xl"></i><br>back</br></a></li>
  			<li><a href="logout.php" style="display: flex; flex-direction: column; align-items: center;"><i class="fa-solid fa-person-running fa-2xl"></i><br>Logout</br> </a></li>
		</ul>

		</nav>
	</header>
	<main>
	<section class="transactions">
			<h3>All Transaction</h3>

			
				<table>
					<tr>
						<th>Date</th>
						<th>sender</th>
                        <th>receiver</th>
						<th>Amount</th>
						<th>Transaction ID</th>
					</tr>
                    <?php if ($transactions) { ?>
					<?php foreach ($transactions as $trans) { ?>
	                    <tr>
                    		<td><?php echo $trans['trans_date']; ?></td>
                    		<td><?php echo $trans['sender']; ?></td>
                    		<td><?php echo $trans['receiver']; ?></td>
                    		<td><?php echo $trans['amount']; ?> XOF</td>
                    		<td><?php echo $trans['trans_number']; ?></td>
                    	</tr>
						<?php } ?>
						<?php } ?>
				</table>
		</section>
	</main>
</body>
</html>
