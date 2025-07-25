<?php
include '../db_config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Flight</title>
		  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-image: url('../images/book_flight_bg.jpg'); /* Add a flight-themed image */
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: rgba(255,255,255,0.95);
            padding: 30px;
            margin: 60px auto;
            width: 60%;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.3);
            animation: fadeIn 1s ease;
        }
        h2, h3 {
            color: #007BFF;
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type='text'], input[type='email'] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type='submit'] {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type='submit']:hover {
            background-color: #218838;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
            text-align: center;
        }
        a:hover {
            text-decoration: underline;
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['flight_id']) && !isset($_POST['confirm_booking'])) {
    $flight_id = $_POST['flight_id'];

    $flight_stmt = $conn->prepare("SELECT * FROM flights WHERE FlightID = ?");
    $flight_stmt->bind_param("i", $flight_id);
    $flight_stmt->execute();
    $flight = $flight_stmt->get_result()->fetch_assoc();

    echo "
    <h2>Flight Booking Form</h2>
    <form method='POST' action='book_flight.php'>
        <input type='hidden' name='flight_id' value='$flight_id'>
        
        <p><strong>Selected Flight:</strong> {$flight['Airline']} ({$flight['Origin']} ➜ {$flight['Destination']})</p>

        <label>Passenger Name:</label><br>
        <input type='text' name='passenger_name' required><br>

        <label>Passenger Email:</label><br>
        <input type='email' name='passenger_email' required><br>

        <input type='submit' name='confirm_booking' value='Confirm Booking'>
    </form>
    ";

} elseif (isset($_POST['confirm_booking'])) {
    $flight_id = $_POST['flight_id'];
    $name = $_POST['passenger_name'];
    $email = $_POST['passenger_email'];

    $stmt = $conn->prepare("INSERT INTO bookings (FlightID, PassengerName, PassengerEmail) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $flight_id, $name, $email);

    if ($stmt->execute()) {
        echo "<h3>✅ Booking successful!</h3>";
        echo "<div style='text-align:center;'><a href='../index.php'>🏠 Back to Home</a></div>";
    } else {
        echo "<h3>❌ Booking failed: " . $stmt->error . "</h3>";
    }
} else {
    echo "<h3>⚠️ Invalid access to booking page.</h3>";
    echo "<div style='text-align:center;'><a href='../index.php'>🏠 Go to Homepage</a></div>";
}
?>
</div>
</body>
</html>
