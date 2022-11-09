<?
if (!empty($_POST)) {
	require __DIR__.'/checkAuth.php';
	$login = $_POST['login'] ?? '';
	$password = $_POST['password'] ?? '';
	if (checkAuth($login,$password)){
		setcookie('login',$login,0,'/');
		setcookie('password',$password,0,'/');
		header('Location: /index.php');
	} else {
		$error = 'Ошибка авторизации';
	}
}

if (isset($_COOKIE['login'])) {
	header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page authorization</title>
</head>
<body>
	<? if (isset ($error)): ?>
		<span style = 'color: red'> 
			<?= $error?>
		</span>
	<? endif; ?>

	<form action="login.php" method = 'post'>
		<label for="login">Имя пользователя:</label>
		<input type="text" name = 'login'>
		<label for="password">Пароль:</label>
		<input type="text" name = 'password'>
		<input type="submit">
	</form>
</body>
</html>