<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>LSRL - Start</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/normalize/normalize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/main.css">

    <script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery-3.1.0.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/main.js"></script>
</head>
<body>
<header class="section group">
    <h1 class="col u-4-5">Das Echo des Lichts 2015</h1>
    <div class="col u-1-5 logo">
        <img src="http://lorempixel.com/80/50/">
    </div>
    <div class="mobile-menu">
        <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="40.346 32.073 119.308 55.999"
	    enable-background="new 40.346 32.073 119.308 55.999" xml:space="preserve">
            <path fill="#747474" d="M155.654,40.073H44.346c-2.209,0-4-1.791-4-4s1.791-4,4-4h111.308c2.209,0,4,1.791,4,4
                S157.863,40.073,155.654,40.073z"/>
            <path fill="#747474" d="M155.654,64.072H44.346c-2.209,0-4-1.79-4-4c0-2.209,1.791-4,4-4h111.308c2.209,0,4,1.791,4,4
                C159.654,62.282,157.863,64.072,155.654,64.072z"/>
            <path fill="#747474" d="M155.654,88.072H44.346c-2.209,0-4-1.791-4-4s1.791-4,4-4h111.308c2.209,0,4,1.791,4,4
	            S157.863,88.072,155.654,88.072z"/>
        </svg>
    </div>
</header>
<section class="detail active content">
    <div class="section group">
        <div class="col u-3-5">
            <img src="http://lorempixel.com/800/400/">
            <span class="caption">
                Das gilt insbesondere für den Umgang mit virtuellen Lichtquellen von 3D-Programmen.
            </span>
        </div>
        <div class="col u-2-5">
            <div class="detail-content">
                <h3>Headline</h3>
                <p>
                    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php echo the_content(); ?>
    <?php endwhile; ?>
<?php endif; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="section group">
        <div class="col u-5-5">
            <img src="http://lorempixel.com/200/80/">
            <span class="caption">
                Das gilt insbesondere für den Umgang mit virtuellen Lichtquellen von 3D-Programmen.
            </span>
        </div>
    </div>
</section>
</body>
</html>
