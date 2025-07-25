<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['PassengerName']) && isset($_POST['PassengerEmail'])) {
        $name = htmlspecialchars($_POST['PassengerName']);
        $email = htmlspecialchars($_POST['PassengerEmail']);
        header("Location: index.php?msg=" . urlencode("Booking confirmed for $name"));
        exit();
    }
}

$result = $conn->query("SELECT * FROM flights");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Airline Reservation</title>
		  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/buying.jpg'); /* Make sure this image exists */
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.3);
            min-height: 100vh;
            padding: 40px;
        }

        h1, h2 {
            text-align: center;
            color: NavajoWhite;
        }
table {
    width: 60%;
    margin: 30px auto;
    border-collapse: collapse;
    background: #ffffff;
    color: #333;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

th {
    background: #005b96;
    color: #fff;
    padding: 14px;
    font-size: 16px;
}

td {
    padding: 12px;
    text-align: center;
    font-size: 15px;
}

tr:nth-child(even) {
    background-color: #f2f9ff;
}

tr:nth-child(odd) {
    background-color: #e0f0ff;
}

tr:hover {
    background-color: #cce7ff;
    transition: 0.3s;
}


        .admin-login {
            text-align: right;
        }

        .admin-login button {
            background: #007BFF;
            color: white;
            padding: 10px 18px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .admin-login button:hover {
            background: #0056b3;
        }

        input[type="submit"] {
            background: #28a745;
            color: white;
            padding: 7px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #218838;
        }

        .muthu {
            text-align: center;
            margin-top: 25px;
        }

        .muthu a {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .muthu a:hover {
            background: #c82333;
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }

            .admin-login {
                text-align: center;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
<div class="overlay">
    <div class="admin-login">
        <a href="admin_login.php"><button>🔒 Admin Login</button></a>
    </div>

    <h1>Welcome to the Airline Reservation System</h1>

    <?php
    if (isset($_GET['msg'])) {
        echo "<script>alert('" . htmlspecialchars($_GET['msg']) . "');</script>";
    }
    ?>

    <h2>Available Flights</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Airline</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Departure</th>
            <th>Arrival</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['FlightID']}</td>
                <td>{$row['Airline']}</td>
                <td>{$row['Origin']}</td>
                <td>{$row['Destination']}</td>
                <td>{$row['DepartureTime']}</td>
                <td>{$row['ArrivalTime']}</td>
                <td>
                    <form method='POST' action='bookings/book_flight.php'>
                        <input type='hidden' name='flight_id' value='{$row['FlightID']}'>
                        <input type='submit' value='Book Now'>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>

    <div class="muthu">
        <h3><a href="bookings/cancel_booking.php">❌ Cancel a Booking</a></h3>
    </div>
</div>
</body>
</html>
