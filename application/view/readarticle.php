<div class="container">
	<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == 'loginforblog') {
				?>
                <div class="alert alert-danger" role="alert">
                    Please login see the blog
                </div>
				<?php
			}
		}
		if (isset($_GET['success'])) {
			if ($_GET['success'] == 'commentaire') {
				?>
                <div class="alert alert-success" role="alert">
                    Your profile has been created
                </div>
				<?php
			}
		}
	?>
    <h1><?= $data[0]["titre"] ?></h1>

    <p>author:<?= $data[0]["uidUser"] ?> </p>
    <p><img src="./application/public/img/uploadimg/<?= $data[0]["img"] ?>"></p>
    <p>
		<?= $data[0]["content"] ?>
    </p>
    <form method="post" action="">
            <button type="button" class="btn btn-success" style="float:right;margin-right:20px" value="delate"
                    name="delate">Delate
            </button>
            <button type="button" class="btn btn-success" style="float:right;margin-right:20px" value="edite"
                    name="edite">edite
            </button>
    </form>

    <h2>Commentaire</h2>
    <form method="post" action="">
        <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
        <input type="submit" value="Poster mon commentaire" name="submiCom">
    </form>
	<?php
		if ($comm){
	?>
    <div class="row"></div>
    <h3>Comment</h3>
	<?php
		while ($data = $comm->fetch()) {
	?>
    <div class="col-9" style="border-bottom-style: solid;"><?= $data['uidUser'] ?></div>
    <div class="col-4"><br><?= $data['content'] ?></div>
    <br>
    <br>
    <br>
		<?php
			}
			}
		?>
    </br>
</div>

