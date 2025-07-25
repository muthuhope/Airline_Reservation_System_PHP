<?php
session_start();
include 'db_config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admins WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows > 0) {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $message = "❌ Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
	  <link rel="icon" type="image/png" href="images/planepng.webp"> <!-- path based on location -->

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-image: url('images/flight_login_bg.jpg'); /* Make sure this image exists */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 350px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            animation: fadeIn 1.2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
			padding-right:1px;
        }
        input[type="submit"] {
            width: 50%;
            padding: 12px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
			margin-top:12px;
			margin-left:25%;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>✈️ Admin Login</h2>
        <?php if ($message): ?>
            <p class="error"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
