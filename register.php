<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Register Form</title>
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
        #buttons {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 10%;
            margin-bottom: 10%;
            width: 70%;
        }
        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: white;
        }
        #registerform {
            width: 80%;
        }
        #register {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-bottom: 5%;
        }
        #login {
            font-size: 10px;
            text-decoration: none;
            color: red;
        }
    </style>
</head>
<body style="background-image: url('background.png'); background-size: cover; background-position: center;">
    <div id="container">
        <h2>Register Form</h2>
        <form id="registerform" method="POST">
            <label for="idno">IDNO: </label>
            <input type="text" id="idno" name="idno">
            <label for="lastname">LASTNAME: </label>
            <input type="text" id="lastname" name="lastname">
            <label for="firstname">FIRSTNAME: </label>
            <input type="text" id="firstname" name="firstname">
            <label for="middlename">MIDDLENAME: </label>
            <input type="text" id="middlename" name="middlename">
            <label for="course">COURSE: </label>
            <input type="text" id="course" name="course">
            <label for="yearlevel">YEAR LEVEL: </label>
            <input type="number" id="yearlevel" name="yearlevel">
            <label for="email">EMAIL ADDRESS: </label>
            <input type="email" id="email" name="email">
            <label for="username">USERNAME: </label>
            <input type="text" id="username" name="username">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password">
        </form>
        <div id="buttons">
            <button id="register">Register</button>
            <a href="login.php" id="login">Back to Login</a>
        </div>
    </div>

    <script>
        document.getElementById('register').addEventListener('click', function(event) {
            event.preventDefault();
            
            let inputs = document.querySelectorAll('input');
            let missingInputs = false;
            
            inputs.forEach(function(input) {
                if (input.value.trim() === '') {
                    missingInputs = true;
                } else {
                    input.style.borderColor = '';
                }
            });
            
            if (missingInputs) {
                alert('Please fill in all fields');
            } else {
                document.querySelector('form').submit();
            }
        });
    </script>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "activities";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        $conn->select_db($dbname);
    } else {
        die("Error creating database: " . $conn->error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        idno VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        firstname VARCHAR(30) NOT NULL,
        middlename VARCHAR(30) NOT NULL,
        course VARCHAR(30) NOT NULL,
        yearlevel INT(2) NOT NULL,
        email VARCHAR(50) NOT NULL,
        username VARCHAR(30) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }

    $stmt = $conn->prepare("INSERT INTO users (idno, lastname, firstname, middlename, course, yearlevel, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("sssssiiss", $idno, $lastname, $firstname, $middlename, $course, $yearlevel, $email, $username, $password);

    $idno = $_POST['idno'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $course = $_POST['course'];
    $yearlevel = $_POST['yearlevel'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Redirecting to login page...'); window.location.href = 'login.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

