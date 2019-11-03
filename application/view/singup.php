<?php
	if (isset($_GET['error'])) {
		if ($_GET['error'] == "emptyfield") {
			?>
            <div class="alert alert-danger" role="alert">
                fill in all fields
            </div>
			<?php
		}
		if ($_GET['error'] == "invalidemail") {
			?>
            <div class="alert alert-danger" role="alert">
                error email
            </div>
			<?php
		}
		if ($_GET['error'] == "emailexistedeja") {
			?>
            <div class="alert alert-danger" role="alert">
                error email Already used
            </div>
			<?php
		}
		if ($_GET['error'] == "save") {
			?>
            <div class="alert alert-danger" role="alert">
                error save your profil
            </div>
			<?php
		}
	}
?>

<h1>Sing up</h1>
<form action="/singup" method="post">
    <input type="text" placeholder="username" name="uid">
    <input type="text" placeholder="E-mail" name="mail">
    <input type="text" placeholder="Passwword" name="pwd">
    <input type="text" name="pwd-repeat" placeholder="Repeat password">
    <button type="submit" name="singup-submit">Singup</button>
</form>