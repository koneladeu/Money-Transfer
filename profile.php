<?php
session_start();
// Check if user is logged in, redirect to login page if not
if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
    exit();
}

// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'moneytransfer');
if (!$conn) {
    die('Failed to connect to database: ' . mysqli_connect_error());
}

// Retrieve user information from database
$user_id = $_SESSION['id'];
$sql = "SELECT name, phone, email FROM user WHERE uid = '$user_id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Failed to retrieve user information: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update user information in database
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if the phone number or email already exists in the database for another user
    $check_sql = "SELECT uid FROM user WHERE ( name = '$name' OR phone = '$phone' OR email = '$email') AND uid != '$user_id'";
    $check_result = mysqli_query($conn, $check_sql);
    if (!$check_result) {
        die('Failed to check user information: ' . mysqli_error($conn));
    }
    if (mysqli_num_rows($check_result) > 0) {
        // Display error message in header
        $_SESSION['error'] = 'Phone number or email already exists for another user';
        header('Location: profile.php');
        exit();
    }
    
    // Update user information in database
    $sql = "UPDATE user SET name = '$name', phone = '$phone', email = '$email' WHERE uid = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Failed to update user information: ' . mysqli_error($conn));
    }
    // Display success message
    $_SESSION['success'] = 'User information updated successfully';
    // Refresh the page to display updated information and success message
    header('Location: profile.php');
    exit();
}
// Check if there's a success message or error message to display
if (isset($_SESSION['success'])) {
    $success_msg = $_SESSION['success'];
    // Unset the success message after 3 seconds
    echo "<script>setTimeout(function() { document.getElementById('success_msg').style.display='none'; }, 3000);</script>";
    unset($_SESSION['success']); // unset the success message
}
if (isset($_SESSION['error'])) {
    $error_msg = $_SESSION['error'];
    // Unset the error message after 3 seconds
    echo "<script>setTimeout(function() { document.getElementById('error_msg').style.display='none'; }, 3000);</script>";
    unset($_SESSION['error']); // unset the error message
}


// Close database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <script src="https://kit.fontawesome.com/d4f4bc68b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <form method="post">
         <h1>Profile</h1>
         <?php if (isset($error_msg)): ?>
        <div id="error_msg" class="error">
            <?php echo $error_msg; ?>
        </div>
    <?php endif; ?>
        
    <?php if (isset($success_msg)): ?>
    <div id="success_msg" class="success"> <?php echo isset($success_msg) ? $success_msg : ''; ?> </div>
    <script>
        setTimeout(function() {
            document.getElementById('success_msg').style.display='none';
        }, 3000);
    </script>
<?php endif; ?>

    <p>Name: <?php echo $row['name']; ?></p>
    <p>Phone: <?php echo $row['phone']; ?></p>
    <p>Email: <?php echo $row['email']; ?></p>

    <h2>Edit Information</h2>
    <div class="input">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" maxlength="10" value="<?php echo $row['phone']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    </div>
      
      <p class="password">
        Change Your <span>Password</span>? <span><a href="changepassword.php">Do It Now!</a></span>
            
    </p>
    <p class="home">
        Want to delete your <span>account </span>?
        <span><a href="deleteaccount.php">here!</a></span>
    </p>
    <div align="center">
        <button type="submit" value="Save Changes">Save Changes</button><br><br>
        <span><a href="homepage1.php">back</a></span>
    </div>
    
        

        
    </form>
</body>
</html>
