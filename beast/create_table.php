<?php require ($_SERVER["DOCUMENT_ROOT"]."/vcore/core.php");?>
<?php CLoader::loadJS("jQuery.js");?>

<link rel="stylesheet" href="/vcore/styles/style.css">
<div class="system-title">Настройка базы данных</div>
<div class="system-container">
	<form action="" method="post">
		<input class="system-input" type="text" placeholder="Host" name="host"><br>
		<input class="system-input" type="text" placeholder="User" name="user"><br>
		<input class="system-input" type="password" placeholder="Password" name="password"><br>
		<input class="system-input" type="text" placeholder="Databse" name="database"><br>

		<input class="system-button" type="button" value="Выпускай Кракена!" id="submit-btn">
	</form>
</div>

<div class="system-progress-container">
	<div class="progress-value" id="val"></div>
	<div class="system-progress" id="progress-bar">

	</div>
</div>

<table class="file-list" id="list-files">

</table>

	<script>
	</script>

<?php
CLoader::loadExternalJS("/vcore/beast/js/dbAjax.js");?>