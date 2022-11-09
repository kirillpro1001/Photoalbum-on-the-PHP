<?php
require __DIR__ . '/checkAuth.php';
$login = getUserLogin();
if ($login !== null && !empty($_FILES['attachment']))
if (!empty($_FILES['attachment'])) {
	$file = $_FILES['attachment'];
	$fileName = $file['name'];
	$newFilePath = __DIR__. '/uploads/'.$fileName;
	$allowedExtensions = ['jpg', 'png', 'gif'];
	$extension = pathinfo ($fileName,PATHINFO_EXTENSION);
	if ($file['error'] !== UPLOAD_ERR_OK) {
		$error = 'Ошибка при загрузке файла.';
	}
	elseif (file_exists($newFilePath)) {
		$error = "Ошибка! Файл с таким именем уже существует";
	}
	elseif (!move_uploaded_file($file['tmp_name'],$newFilePath)) {
		$error = "Ошибка при загрузке файла";
	}

	elseif (!in_array($extension,$allowedExtensions)) {
		$error = "Загрузка файлов с таким разрешением запрещена";
	} 


	else {
		$result = __DIR__ . '/uploads/'.$fileName;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Download file to server</title>
</head>
<body>
	<?php
	if (!empty($error)):
	?>
	<?=$error ?>
<?php elseif (!empty($result)): ?>
	<?=$result?>
	<br>
	<a href="index.php">Вернуться на главную страницу</a>
<?php endif; ?>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="attachment">
		<input type="submit">
	</form>
</body>
</html>