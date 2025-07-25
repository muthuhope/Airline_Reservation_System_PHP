<?php
include '../db_config.php';

$cancelMessage = '';
$showForm = true;
$email = '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cancel Booking</title>
		  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../images/flight_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(3px);
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.93);
            padding: 30px;
            margin-top: 50px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        .btn-danger {
            font-size: 14px;
        }
        table {
            background-color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mb-4 text-primary text-center">✈️ Cancel Flight Booking</h2>

    <?php
    // ✅ Cancel logic
    if (isset($_POST['cancel_confirm'], $_POST['booking_id'], $_POST['email'])) {
        $booking_id = $_POST['booking_id'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("DELETE FROM bookings WHERE BookingID = ?");
        $stmt->bind_param("i", $booking_id);
        if ($stmt->execute()) {
            $cancelMessage = "<div class='alert alert-success'>✅ Booking cancelled successfully.</div>";
        } else {
            $cancelMessage = "<div class='alert alert-danger'>❌ Error cancelling booking.</div>";
        }
        $showForm = false;
    }

    // ✅ Search bookings by email
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
        $email = $_POST['email'];
        $showForm = false;

        echo "<h5 class='text-info'>Showing bookings for: <i>$email</i></h5>";

        $stmt = $conn->prepare("
            SELECT b.BookingID, b.PassengerName, f.Airline, f.Origin, f.Destination, f.DepartureTime, f.ArrivalTime
            FROM bookings b
            JOIN flights f ON b.FlightID = f.FlightID
            WHERE b.PassengerEmail = ?
        ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!empty($cancelMessage)) {
            echo $cancelMessage;
        }

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'><table class='table table-bordered table-hover mt-3'>
                    <thead class='table-dark'>
                        <tr>
                            <th>Passenger</th>
                            <th>Airline</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Action</th>
                        </tr>
                    </thead><tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['PassengerName']}</td>
                        <td>{$row['Airline']}</td>
                        <td>{$row['Origin']}</td>
                        <td>{$row['Destination']}</td>
                        <td>{$row['DepartureTime']}</td>
                        <td>{$row['ArrivalTime']}</td>
                        <td>
                            <form method='POST' action='cancel_booking.php' onsubmit=\"return confirm('Are you sure you want to cancel this booking?');\">
                                <input type='hidden' name='booking_id' value='{$row['BookingID']}'>
                                <input type='hidden' name='email' value='{$email}'>
                                <input type='submit' name='cancel_confirm' value='Cancel Booking' class='btn btn-danger btn-sm'>
                            </form>
                        </td>
                    </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<div class='alert alert-warning mt-4'>❌ No active bookings found for <b>$email</b>.</div>";
        }
    }
    ?>

    <?php if ($showForm): ?>
        <form method="POST" action="cancel_booking.php" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Enter Your Email:</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="example@email.com">
            </div>
            <button type="submit" class="btn btn-primary">🔍 Search Booking</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
