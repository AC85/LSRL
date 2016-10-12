<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
        <?php $title = 'LSRL - ' . get_the_title(); ?>
<?php endwhile; ?>
<?php endif; ?>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/normalize/normalize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/main.css">

    <script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery-3.1.0.min.js"></script>
</head>