<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "nygus");

if (!($_SESSION['login'] ?? null)) {
	header("Location: logowanie.php");
	exit;
}

$current_user_login = $_SESSION['login'];

if (isset($_GET['logout'])) {
	session_destroy();
	header("Location: logowanie.php");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$title = trim($_POST['title']);
	$text  = trim($_POST['text']);

	if ($title && $text) {
		mysqli_query($conn,
			"INSERT INTO posts (login, title, text, created_at)
			 VALUES ('$current_user_login', '$title', '$text', NOW())"
		);
	}
}

$posts = mysqli_query($conn, "SELECT login, title, text, created_at FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Strona główna</title>

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
	color: #fff;
}
header{
	height: 10vh;
	width: 100%;
	background: #202020;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 0 20px;
	font-size: 1.5em;
	box-shadow: 0 3px 10px rgba(0,0,0,0.4);
}
header a{
	color: #fff;
	text-decoration: none;
	background: #e74c3c;
	padding: 5px 10px;
	border-radius: 5px;
	transition: 0.2s;
}
header a:hover{ background:#c0392b; }

.container{
	width: 100%;
	display: flex;
	justify-content: center;
	gap: 20px;
	padding: 20px;
}

main, nav, form, .post{
	background: rgba(255,255,255,0.06);
	backdrop-filter: blur(12px);
	border: 1px solid rgba(255,255,255,0.1);
	box-shadow: 0 8px 25px rgba(0,0,0,0.4);
	border-radius: 20px;
}

main{
	width: 70%;
	max-width: 800px;
	display: flex;
	flex-direction: column;
	gap: 20px;
	padding: 20px;
}

nav{
	width: 250px;
	padding: 20px;
	display: flex;
	flex-direction: column;
	gap: 15px;
	height: fit-content;
}

nav a{
	text-decoration: none;
	background: #007bff;
	color: white;
	padding: 12px;
	border-radius: 12px;
	text-align: center;
	font-weight: 600;
	transition: 0.2s;
}
nav a:hover{
	background: #005ec7;
	transform: scale(1.03);
}

form{
	padding: 20px;
	display: flex;
	flex-direction: column;
	gap: 15px;
}
textarea{
	width: 100%;
	padding: 12px;
	border-radius: 12px;
	border: none;
	background: rgba(255,255,255,0.1);
	color: #fff;
	resize: vertical;
	font-size: 1em;
}
button{
	padding: 12px;
	border: none;
	border-radius: 12px;
	cursor: pointer;
	background: #007bff;
	color: white;
	font-size: 1.1em;
	font-weight: 600;
	transition: 0.2s;
}
button:hover{ background:#005ec7; transform:scale(1.03); }

.post{
	padding: 20px;
	word-wrap: break-word;
}
.post h3, .post p{ white-space: pre-wrap; }
.post small{ color: #ccc; }
</style>
</head>

<body>

<header>
	<div>Notatki</div>
	<div>Zalogowany: <?= htmlspecialchars($current_user_login) ?> |
		<a href="?logout=1">Wyloguj</a>
	</div>
</header>

<div class="container">

	<main>

		<form method="POST">
			<textarea name="title" placeholder="Tytuł..." required></textarea>
			<textarea name="text" placeholder="Treść..." rows="4" required></textarea>
			<button>Dodaj post</button>
		</form>

		<?php while ($p = mysqli_fetch_assoc($posts)): ?>
			<div class="post">
				<h3><?= htmlspecialchars($p['title']) ?></h3>
				<p><?= htmlspecialchars($p['text']) ?></p>
				<small>Autor: <?= htmlspecialchars($p['login']) ?> | <?= $p['created_at'] ?></small>
			</div>
		<?php endwhile; mysqli_close($conn); ?>

	</main>

	<nav>
		<a href="SzymekAI.php">SzymelekAI</a>
		<a href="AndrzejAI.php">AndrzejAI</a>
		<a href="RiotGames.php">RiotGames</a>
	</nav>

</div>

</body>
</html>
