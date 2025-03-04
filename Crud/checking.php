<?php
session_start();
?>
<?php
// Set timeout duration (10 seconds)
$timeout = 10;

// Check if 'activity' session variable is set
if (isset($_SESSION['activity'])) {
    $elapsed_time = time() - $_SESSION['activity'];

    echo "Elapsed Time: " . $elapsed_time . " seconds<br>";

    if ($elapsed_time > $timeout) {
        session_unset(); // Clear session variables
        session_destroy(); // Destroy session
        echo "Session Expired! Redirecting...";
        header("Refresh: 10; URL=login.php"); // Redirect after 2 seconds
        exit();
    }
}

// Update last activity timestamp
$_SESSION['activity'] = time();

echo "Session Updated at: " . date("H:i:s", $_SESSION['activity']) . "<br>";

// Check if user is logged in and role is admin
if (!isset($_SESSION["userid"]) || $_SESSION["role"] != "2") {
    header("Location: login.php");
    exit();
} 

// If user is authenticated, show welcome message
echo "Welcome: " . $_SESSION['name'];
echo "<br><br><br>";
echo "Your Role Is Admin";
?>

<!-- 
<br>
<br>
<a href="logout.php">LogOut</a> -->
