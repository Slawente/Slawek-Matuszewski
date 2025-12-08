<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "nygus");
$msg = "";

if (isset($_POST['signbtn'])) {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);

    if ($login === "" || $pass === "") {
        $msg = "Wpisz login i hasło!";
    } else {
        $check = "SELECT * FROM users WHERE login = '$login'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $msg = "Taki login już istnieje. Wybierz inny.";
        } else {
            $q2 = "INSERT INTO users (login, pass) VALUES ('$login', '$pass')";
            if (mysqli_query($conn, $q2)) {
                $_SESSION['login'] = $login;
                header("Location: Główna.php");
                exit;
            } 
        }
    }
}

if (isset($_POST['logbtn'])) {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);

    if ($login === "" || $pass === "") {
        $msg = "Wpisz login i hasło!";
    } else {
        $q1 = "SELECT * FROM users WHERE login ='$login' AND pass='$pass'";
        $result = mysqli_query($conn, $q1);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['login'] = $login;
            header("Location: Główna.php");
            exit;
        } else {
            $msg = "Nieprawidłowy login lub hasło";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logowanie / Rejestracja</title>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}
body{
    background: linear-gradient(135deg, #1f1f1f, #3a3a3a);
    height: 100vh;
    display: flex;
    flex-direction: column;
}
header{
    height: 10vh;
    width: 100%;
    background: #202020;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2em;
    color: #fff;
    font-weight: 600;
    letter-spacing: 1px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.4);
}
main{
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
}
.msg-box{
    width: 330px;
    background: rgba(255, 0, 0, 0.2);
    padding: 20px;
    border-radius: 20px;
    text-align: center;
    color: white;
    margin-bottom: 20px;
    border: 1px solid rgba(255,0,0,0.5);
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    font-size: 1.1em;
}
form{
    background: rgba(255, 255, 255, 0.06);
    padding: 30px;
    width: 330px;
    border-radius: 20px;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 8px 25px rgba(0,0,0,0.4);
    color: white;
    text-align: center;
}
form label{
    font-size: 1.1em;
    margin-bottom: 5px;
    display: block;
}
form input{
    width: 85%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 10px;
    border: none;
    outline: none;
    background: rgba(255,255,255,0.1);
    color: white;
    font-size: 1em;
    transition: 0.2s;
}
form input:focus{
    background: rgba(255,255,255,0.2);
    box-shadow: 0 0 8px rgba(255,255,255,0.4);
}
form button{
    margin-top: 15px;
    width: 90%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    background: #007bff;
    color: white;
    font-size: 1.1em;
    font-weight: 600;
    transition: 0.2s;
}
form button:hover{
    background: #005ec7;
    transform: scale(1.04);
}
form button:nth-of-type(2){
    background: #28a745;
}
form button:nth-of-type(2):hover{
    background: #1f7d34;
}
</style>
</head>
<body>
<header>Campagnola duża salama cebula 38,80zł.com</header>
<main>
<?php if(!empty($msg)) echo "<div class='msg-box'>$msg</div>"; ?>
<form method="POST">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" placeholder="Login..."><br><br>
    <label for="pass">Hasło:</label>
    <input type="password" id="pass" name="pass" placeholder="Hasło..."><br><br>
    <button name="logbtn">Zaloguj się</button><br><br>
    <button name="signbtn">Zarejestruj się</button>
</form>
</main>
<?php mysqli_close($conn); ?>
</body>
</html>
