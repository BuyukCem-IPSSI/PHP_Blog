<?php ob_start(); ?>
<!--affiche l'articles -->
<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <!-- Title -->
            <h2 class="mt-4"><?= htmlspecialchars($post['title']) ?></h2>
            <!-- Author -->
            <p class="lead">
                Par
				<?= $post['author'] ?>
            </p>
            <hr>
            <img class="img-fluid rounded" src="<?php echo $post['img'] ?>" alt="illustration article">
            <hr>
            <!-- Post Content -->
            <p class="lead"><?= nl2br($post['content']) ?></p>
            <p>