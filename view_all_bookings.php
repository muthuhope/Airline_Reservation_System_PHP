<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit();
}
include '../db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Bookings</title>
		  <!-- path based on location -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="icon" type="image/png" href="images/planepng.webp">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #c9d6ff, #e2e2e2);
            margin: 0;
            padding: 20px;
            animation: fadeIn 1s ease-in;
        }

        h2 {
            text-align: center;
            color: #3f51b5;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            animation: slideUp 0.8s ease;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        th {
            background-color: #3f51b5;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        a.button {
            display: block;
            width: fit-content;
            margin: 30px auto;
            text-decoration: none;
            background-color: #3f51b5;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        a.button:hover {
            background-color: #303f9f;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes slideUp {
            from {transform: translateY(30px); opacity: 0;}
            to {transform: translateY(0); opacity: 1;}
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }
            th, td {
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 20px;
            }
            a.button {
                padding: 10px 16px;
            }
        }
    </style>
</head>
<body>

<h2>📋 All Flight Bookings</h2>

<table>
    <tr>
        <th>Booking ID</th>
        <th>Passenger</th>
        <th>Email</th>
        <th>Flight ID</th>
        <th>Booked At</th>
    </tr>
    <?php
    $q = $conn->query("SELECT * FROM bookings ORDER BY BookingID DESC");
    while ($r = $q->fetch_assoc()) {
        echo "<tr>
                <td>{$r['BookingID']}</td>
                <td>{$r['PassengerName']}</td>
                <td>{$r['PassengerEmail']}</td>
                <td>{$r['FlightID']}</td>
                <td>{$r['BookingTime']}</td>
              </tr>";
    }
    ?>
</table>

<a href="../admin_dashboard.php" class="button">⬅ Back to Dashboard</a>

</body>
</html>
