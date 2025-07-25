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
    <title>Manage Flights</title>
		  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Background */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #b3e5fc, #e1bee7);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 1s ease-in;
        }

        /* Card Box */
        .card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 90%;
            width: 400px;
            animation: slideUp 0.7s ease-in-out;
        }

        h2 {
            color: #673ab7;
            font-size: 24px;
            margin-bottom: 15px;
        }

        p {
            color: #444;
            font-size: 16px;
        }

        a.button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #673ab7;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        a.button:hover {
            background-color: #5e35b1;
            transform: scale(1.05);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Mobile responsiveness */
        @media (max-width: 480px) {
            .card {
                padding: 30px 20px;
            }

            h2 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h2>✈️ Flight Management</h2>
    <p><strong>Coming soon</strong>: Add, Edit, and Delete Flights!</p>
    <a href="../admin_dashboard.php" class="button">⬅ Back to Dashboard</a>
</div>

</body>
</html>
