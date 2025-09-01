<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial;
        }
        .form-container {
            width: 300px;
            margin: 50px auto;
            border: 1px solid #b87474ff;
            padding: 20px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 80px;
        }
        input[type="text"],
        input[type="password"] {
            width: 180px;
            padding: 5px;
        }
        input[type="submit"] {
            margin-left: 85px;
            padding: 6px 12px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Create Account</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <input type="submit" name="register" value="Register">
        </form>

        <?php
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            echo "<p style='color:green; margin-top:10px;'>Account created successfully!</p>";
        }
        ?>
    </div>
</body>
</html>