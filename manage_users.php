<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
		  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #fbc2eb, #a6c1ee);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1s ease-in;
        }

        .card {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.6s ease-out;
        }

        h2 {
            font-size: 24px;
            color: #3f51b5;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            color: #333;
            margin-bottom: 25px;
        }

        a.button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #3f51b5;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s ease;
        }

        a.button:hover {
            background-color: #303f9f;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

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
    <h2>👥 Manage Users</h2>
    <p><strong>Coming soon</strong>: View and Delete registered users from the system.</p>
    <a href="../admin_dashboard.php" class="button">⬅ Back to Dashboard</a>
</div>

</body>
</html>
