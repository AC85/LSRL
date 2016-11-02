<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php
        $wp_title = strlen($overwrite_title) > 0 ? $overwrite_title : get_the_title();
        $title = 'LSRL - ' . $wp_title;
        $isThisTheStartpage = mb_ereg_match("Startseite", $wp_title);
        $headline = $isThisTheStartpage ? "lighting strategies research lab" : $wp_title;
        ?>

    <?php endwhile; ?>
<?php else: ?>
    <?php
    $wp_title = strlen($overwrite_title) > 0 ? $overwrite_title : "404 - Seite nicht gefunden";
    $title = 'LSRL - ' . $wp_title;

    $headline = $wp_title;
    ?>
<?php endif; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?php wp_meta(); ?>
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/normalize/normalize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/main.css">

    <?php wp_head(); ?>
</head>
<body>
<header class="section group">
    <div class="back-button">
        <?php if(!$isThisTheStartpage): ?>
        <a href="/">
            <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/pfeil.svg">
        </a>
        <?php endif; ?>
    </div>
    <div class="search">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
            <path fill="#747474" d="M184.454,171.251l-49.073-49.073c8.533-11.368,13.596-25.484,13.596-40.76
                c0-37.514-30.52-68.033-68.033-68.033S12.91,43.904,12.91,81.417c0,37.514,30.52,68.034,68.033,68.034
                c15.761,0,30.275-5.402,41.822-14.432l48.96,48.96c1.758,1.757,4.061,2.636,6.364,2.636s4.606-0.879,6.364-2.636
                C187.969,180.465,187.969,174.766,184.454,171.251z M30.91,81.417c0-27.588,22.445-50.033,50.033-50.033
                c27.589,0,50.033,22.445,50.033,50.033s-22.444,50.034-50.033,50.034C53.355,131.451,30.91,109.006,30.91,81.417z"/>
        </svg>
        <form action="<?php echo home_url(); ?>" id="search-form" method="get">
            <input type="text" name="s" id="s" value="<?php echo $_GET['s']; ?>">
        </form>
    </div>
    <div class="additional-links">
        <a href="/impressum">impressum</a>
    </div>
    <h1 class="col u-4-5"><?php echo $headline; ?></h1>
    <div class="col u-1-5 logo">
        <?php if (!$isThisTheStartpage): ?>
            <a href="/">
        <?php endif; ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lslr_logo.svg">
        <?php if (!$isThisTheStartpage): ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="mobile-menu">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="40.346 32.073 119.308 55.999"
             enable-background="new 40.346 32.073 119.308 55.999" xml:space="preserve">
            <path fill="#747474" d="M155.654,40.073H44.346c-2.209,0-4-1.791-4-4s1.791-4,4-4h111.308c2.209,0,4,1.791,4,4
                S157.863,40.073,155.654,40.073z"/>
            <path fill="#747474" d="M155.654,64.072H44.346c-2.209,0-4-1.79-4-4c0-2.209,1.791-4,4-4h111.308c2.209,0,4,1.791,4,4
                C159.654,62.282,157.863,64.072,155.654,64.072z"/>
            <path fill="#747474" d="M155.654,88.072H44.346c-2.209,0-4-1.791-4-4s1.791-4,4-4h111.308c2.209,0,4,1.791,4,4
	            S157.863,88.072,155.654,88.072z"/>
        </svg>
        <nav>
            <ul>
                <?php if ($isThisTheStartpage): ?>
                    <li>Kontakt</li>
                    <li>Lehrveranstaltungen</li>
                    <li>Projekte</li>
                    <li>Arbeitsfeld</li>
                    <li>Personen</li>
                    <li>Impressum / Datenschutz</li>
                <?php else: ?>
                    <li>Start</li>
                <?php endif; ?>
                    <li>Suche</li>
            </ul>
        </nav>
    </div>
</header>
