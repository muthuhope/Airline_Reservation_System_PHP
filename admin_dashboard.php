<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
		  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; margin:0; }
        .navbar { background:#007BFF; color:#fff; padding:15px; text-align:center; }
        .container { width:80%; margin:40px auto; background:#fff; padding:25px; border-radius:8px; box-shadow:0 0 10px #ccc; }
        .actions a { display:inline-block; margin:8px 10px 0 0; padding:10px 18px; background:#28a745; color:#fff; text-decoration:none; border-radius:5px; }
        .actions a.logout { background:#dc3545; }
    </style>
</head>
<body>
<div class="navbar">
    <h2>Airline Reservation System - Admin Dashboard</h2>
</div>

<div class="container">
    <h1>Welcome, <?= htmlspecialchars($_SESSION['admin']) ?> 👋</h1>
    <p>You have successfully logged in as an admin.</p>

   <div class="actions">
    <a href="bookings/view_all_bookings.php">📋 View All Bookings</a>
    <a href="bookings/booking_summary.php">📑 Booking Summary</a>
    <a href="flights/manage_flights.php">✈️ Manage Flights</a>
    <a href="users/manage_users.php">👤 Manage Users</a>
    <a href="logout.php" class="logout">🚪 Logout</a>
</div>

</div>
</body>
</html>
