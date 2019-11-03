<div class="container">
	<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == 'formempty') {
				?>
                <div class="alert alert-danger" role="alert">
                    Please insert all information
                </div>
				<?php
			}
			if ($_GET['error'] == 'success') {
				?>
                <div class="alert alert-success" role="alert">
                    article online
                </div>
				<?php
			}
			if ($_GET['error'] == 'insertfalse') {
				?>
                <div class="alert alert-danger" role="alert">
                    erreur insert
                </div>
				<?php
			}
		}

	?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="ex$affectedLinesampleFormControlInput1">Titre Article</label>
            <input type="title" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name='category'>
				<?php
					while ($data = $post->fetch()) {
						$value = $data["category_name"];
						$id = $data["id_cat"];
						?>
                        <option value="<?= $id ?>"><?= $value ?></option>
						<?php
					}
					$post->closeCursor();
				?>
            </select>
        </div>
        <div class="form-group">
            <div class="btn btn-primary btn-sm ">
                <span>Choose file</span>
                <input type="file" name="file">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Article</label>
            <textarea class="form-control" name="article" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submitform">Send
            </button>
        </div>
    </form>
</div>
