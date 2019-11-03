<main>
    <div class="wrapper-main">
        <section class="section-default">
			<?php
				if (isset($_GET['login'])) {
					if ($_GET['login'] == 'success') {
						?>
                        <div class="alert alert-success" role="alert">
							<?php print("Hii," . $_SESSION['username'] . "you are logged ") ?>
                        </div>
						<?php
					}
				} ?>
        </section>
    </div>
</main>
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Hello on my Blog</h1>
            </div>
        </div>
    </div>
</header>

<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
        </div>
</section>
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img"
                 style="background-image: url('../../public/img/CoffeHome.jpg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Fully Responsive Design</h2>
                <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look
                    great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
            </div>
        </div>
</section>
