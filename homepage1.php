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
    trans_date DESC 
LIMIT 3";


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
	<title>My Home Page</title>
    <script src="https://kit.fontawesome.com/9d20b8d774.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
</head>
<body>
	<header>
		<div class="logo">
		  
		</div>
		<h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
		<nav>
			<ul>
				<li><a href="about.php"><i class="fa-solid fa-circle-exclamation fa-2xl"></i><br>about</br></a></li>
				<li><a href="contact.php"><i class="fa-regular fa-address-book fa-2xl"></i><br> contact us</br></a></li>
				<li><a href="profile.php"><i class="fa-solid fa-user fa-2xl"></i><br>profile</br></a></li>
  				<li><a href="logout.php"><i class="fa-solid fa-person-running fa-2xl" ></i><br>Logout</br> </a></li>
			</ul>
		</nav>
	</header>
	<main>
	<?php
	if (isset($_SESSION['success'])) {
        $error_msg = $_SESSION['success'];
        // Unset the error message after displaying it
        echo "<div class='success'>$error_msg</div>";
        echo "<script>
                setTimeout(function() {
                    var error_msg = document.querySelector('.success');
                    error_msg.style.display = 'none';
                }, 3000);
            </script>";
        unset($_SESSION['success']);
    }
    ?>
		
		<div class="balance-container">
			<h3 class="h3">BALANCE</h3>
				<div class="button-wrapper">
				<section id="balance">

    			<?php 
    if (empty($balance) || $balance == 0) {
        $balance_display = "0 XOF";
    } else {
        $balance_display = number_format($balance, 0, ',', '.') . " XOF";
    }
    echo '<span id="balance-value">' . $balance_display . '</span>';
?>

    			<span id="balance-dot" style="display:none;">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span>
				</section>

					<div>
					<button onclick="toggleBalance()" class="btn2" id="balanceBtn"><i class="fa-solid fa-eye-slash fa-2xl"></i></button>

  				</div>
				</div>
			
  				
  				<div>
    				<a href="sendmoney.php" class="btn"><i class="fa-solid fa-money-bill-transfer fa-shake fa-2xl"></i><br> send money </br></a>
				</div>
				</div>	

			<section class="transactions">
				<h3>Recent Transaction</h3>

			
					<table>
						<tr>
						<th>Date</th>
						<th>sender</th>
                        <th>receiver</th>
						<th>Amount</th>
						<th>transaction ID</th>
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

					</table>
					<a href="history.php" class="btn3">View All Transactions</a>
			        <?php } ?>
			</section>
	</main>
	<script>
  function toggleBalance() {
  var balanceValue = document.getElementById("balance-value");
  var balanceDot = document.getElementById("balance-dot");
  var btn = document.getElementById("balanceBtn");
  var icon = btn.getElementsByTagName("i")[0];
  
  if (balanceValue.style.display === "none") {
    balanceValue.style.display = "inline";
    balanceDot.style.display = "none";
	icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");

  } else {
    balanceValue.style.display = "none";
    balanceDot.style.display = "inline";
	icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}

</script>
</body>
</html>
                