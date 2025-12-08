<?php
session_start();

$_SESSION['chat_szymelek'] ??= [];

$odpowiedzi = [
    "Witaj przywoływaczu!",
    "System mmr ma własną autonomie.",
    "Niestety nic nie poradzimy na stracone LP ani nie damy tobie kodu na skrzynki.",
	"Czasem to nie wina drużyny że robi 0/20 w 10 minucie a ich sprzęt.",
	"Niedługo dodajemy kolejne skiny zamiast balasnować postacie oraz naprawiać grę."
	""
];

if (isset($_GET['clear'])) {
    $_SESSION['chat_szymelek'] = [];
    header("Location: SzymekAI.php");
    exit;
}

if (!empty($_POST['msg'])) {

    $msg = htmlspecialchars($_POST['msg']);

    $_SESSION['chat_szymelek'][] = ["type" => "user", "text" => $msg];
    $_SESSION['chat_szymelek'][] = ["type" => "bot", "text" => $odpowiedzi[array_rand($odpowiedzi)]];
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SzymelekAI</title>

<style>
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: "Segoe UI", Arial, sans-serif;
}
body{
	background: linear-gradient(135deg, #1f1f1f, #3a3a3a);
	min-height: 100vh;
	display: flex;
	flex-direction: column;
	align-items: center;
	color: white;
}
header{
	height: 10vh;
	width: 100%;
	background: #202020;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 2em;
	font-weight: 600;
	box-shadow: 0 3px 10px rgba(0,0,0,0.4);
}
main{
	width: 600px;
	max-width: 95%;
	margin-top: 30px;
	background: rgba(255,255,255,0.06);
	padding: 25px;
	border-radius: 20px;
	backdrop-filter: blur(12px);
	border: 1px solid rgba(255,255,255,0.1);
	box-shadow: 0 8px 25px rgba(0,0,0,0.4);
	display: flex;
	flex-direction: column;
	gap: 15px;
}
input{
	width: 100%;
	padding: 12px;
	border-radius: 12px;
	border: none;
	margin-top: 10px;
	background: rgba(255,255,255,0.1);
	color: white;
}
button{
	width: 100%;
	padding: 12px;
	border-radius: 12px;
	border: none;
	cursor: pointer;
	background: #007bff;
	color: white;
	margin-top: 12px;
	font-size: 1.1em;
	font-weight: 600;
}
button:hover{
	background: #005ec7;
	transform: scale(1.03);
}
.chat-box{
	display: flex;
	flex-direction: column;
	gap: 10px;
}
.msg{
	padding: 12px;
	border-radius: 12px;
	max-width: 90%;
	white-space: pre-wrap;
	box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}
.user{
	align-self: flex-end;
	background: rgba(0,120,255,0.25);
	border: 1px solid rgba(0,120,255,0.4);
}
.bot{
	align-self: flex-start;
	background: rgba(255,255,255,0.08);
	border: 1px solid rgba(255,255,255,0.15);
}
.clear{
	background: #e74c3c !important;
}
.clear:hover{
	background: #c0392b !important;
}
</style>

</head>
<body>

<header>RiotGames</header>

<main>

<form method="POST">
	<input type="text" name="msg" placeholder="Napisz wiadomość..." required>
	<button type="submit">Wyślij</button>
</form>

<div class="chat-box">
<?php foreach ($_SESSION['chat_szymelek'] as $m): ?>
	<div class="msg <?= $m['type'] ?>"><?= $m['text'] ?></div>
<?php endforeach; ?>
</div>

<a href="SzymekAI.php?clear">
	<button class="clear">Wyczyść czat</button>
</a>

</main>

</body>
</html>
