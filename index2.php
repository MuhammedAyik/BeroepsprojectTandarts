<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $phone = $_POST['phone'];
        $role = 'employee'; // Rol instellen op 'employee'

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $password, $phone, $role])) {
            echo "Account aangemaakt!";
        } else {
            echo "Er is een fout opgetreden.";
        }
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ? AND role = 'employee'");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                header("Location: dashboard2.php"); // Redirect naar dashboard voor medewerkers
                exit;
            } else {
                echo "Ongeldig wachtwoord.";
            }
        } else {
            echo "Geen account gevonden met dat e-mailadres.";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Webleb - Medewerker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Medewerker Log In</h4>
                                            <form method="POST" action="">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Email" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Password" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" name="login" class="btn mt-4">Login</button>
                                            </form>
                                            <p class="mb-0 mt-4 text-center"><a href="#" class="link">Forgot your password?</a></p>
                                            <button onclick="location.href='index2.php'" class="btn mt-4">Ik ben een medewerker</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-3 pb-3">Sign Up</h4>
                                            <form method="POST" action="">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-style" placeholder="Full Name" required>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="tel" name="phone" class="form-style" placeholder="Phone Number" required>
                                                    <i class="input-icon uil uil-phone"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Email" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Password" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" name="register" class="btn mt-4">Register</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
