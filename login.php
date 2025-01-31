<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-size: 15px;
        }
        input {
            width: 95%;
            padding: 5px;
            margin-top: 5px;
            font-size: 15x;
            border-radius: 5px;
            border-width: 1px;
        }
        button {
            width: 50%;
            padding: 5px;
            margin-top: 10px;
            align-self: center;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: white;
        }
        #buttons {
            padding-top: 10%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-bottom: 10%;
        }
        #register {
            font-size: 10px;
            text-decoration: none;
            color: red;
        }
        #title {
            margin-bottom: 10%;
            font-size: 1em;
            width: 90%;
            font-weight: 500;
        }
        #top {
            padding-top: 5%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }
        #loginForm {
            width: 80%;
        }
        #login {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            width: 70%;
        }
    </style>
</head>
<body style="background-image: url('background.png'); background-size: cover; background-position: center;">
    <div id="container">
        <div id="top">
            <img src="CCS_LOGO.png" alt="Logo" width="100px" height="100px">
            <h1 id="title">CSS SitIn Monitoring System</h1>
        </div>
        <form id="loginForm">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <div id="buttons">            
                <button type="submit" id="login">Login</button>
                <a id="register" href="register.php">Register</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var form = document.querySelector('#loginForm');
            var formData = new FormData(form);

            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);  // Handle response (e.g., display success/failure message)
            })
            .catch(error => {
                alert("Error: " + error);
            });
        });
    </script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'activities');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            echo "Success";
        } else {
            echo "Unsuccessful";
        }
    } else {
        echo "Unsuccessful";
    }

    $stmt->close();
    $conn->close();
}
?>

