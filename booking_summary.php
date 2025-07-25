<?php
include('../db_config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Summary</title>
		  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-image: url('../images/summary_bg.jpg'); /* Use a flight or summary themed background */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            width: 90%;
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease;
        }

        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0f7fa;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
<div class="container">
<?php
include('../db_config.php');

$result = $conn->query("SELECT * FROM bookings");

echo "<h1>Booking Summary</h1>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Flight ID</th>
    <th>Passenger Name</th>
    <th>Passenger Email</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['BookingID']}</td>
        <td>{$row['FlightID']}</td>
        <td>{$row['PassengerName']}</td>
        <td>{$row['PassengerEmail']}</td>
    </tr>";
}

echo "</table>";
?>

</div>
</body>
</html>
