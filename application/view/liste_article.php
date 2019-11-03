<div class="container">
	<?php
		if (isset($_GET['success'])) {
			if ($_GET['success'] == 'delate') {
				?>
                <div class="alert alert-danger" role="alert">
                    cleaning erros
                </div>
				<?php
			}
		} ?>
    <br>
    <a href="/addarticle">
        <button type="button" class="btn btn-primary">add an article</button>
    </a>
    <div class="row">
        <?php
        while($data = $TotalRes->fetch()) {
        ?>
            <div class="col-md-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h2><?= $data['titre'] ?></h2>
                                <div class="wrapper">
                     git flow release publish               <div class="box"><img style="float:left;margin-right:10px"
                                                          src="../public/<?= $data['img'] ?>">
                                    </div>
                                    <p style="margin:5px"><?= $data['content'] ?></p>
                                    <p>author <?= $data['uidUser'] ?></p>
                                    <a href="/readarticle?id=<?= $data['id'] ?>">
                                        <button type="button" class="btn btn-success"
                                                style="float:right;margin-right:20px">Read more
                                        </button>
                                    </a>
                                </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        <?php
      }
      ?>
                <?php
                    echo "Page:";
                for($i=1;$i<=$pageTotal;$i++) {
                         echo ' <a href="/blog?page='.$i.'">'.$i.'</a> -- ';
                }
                ?>
         </div>
    </div>
</div>
