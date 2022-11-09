<?
require __DIR__.'/checkAuth.php';
$login = getUserLogin();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome page</title>
</head>
<body>
	<?
	if ($login === null):
	 ?>
	 <a href="login.php">Авторизуйтесь</a>
	<? else: ?>
		Добро пожаловать, <?= $login ?>
		<br>
	<a href="logout.php">Выйти</a>
<br>
<?php if (!empty($error)): ?>
	<?= $error ?>
<?php elseif (!empty($result)): ?>
	<?=$result ?>
<?php endif; ?>
<br/>
<form action="upload.php">
	
</form>
</body>
</html>