<?php
$postPictures = Array();
$titlePictures = Array();
// check if the repeater field has rows of data
if (have_rows('beitragsbilder')) {
    // loop through the rows of data
    while (have_rows('beitragsbilder')) {
        the_row();
        if (get_sub_field('titelbild')) {
            array_push($titlePictures, get_sub_field('bild'));
        } else {
            array_push($postPictures, get_sub_field('bild'));
        }

    }
}
?>
<!DOCTYPE html>
<?php include('header.php');?>
<body>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<header class="section group">
    <h1 class="col u-4-5">
        <?php the_title();?>
    </h1>
    <div class="col u-1-5 logo">
        <img src="http://lorempixel.com/80/50/">
    </div>
    <div class="mobile-menu">
        <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px" viewBox="40.346 32.073 119.308 55.999"
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
            <?php foreach ($titlePictures as $image): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                <span class="caption">
                   <?php echo $image['description']; ?>
                </span>
            <?php endforeach; ?>
        </div>
                <div class="col u-2-5">
                    <div class="detail-content">
                        <p>
                            <?php echo the_content(); ?>
                        </p>
                    </div>
                </div>
    </div>
    <div class="section group">
        <div class="col u-5-5">
            <?php foreach ($postPictures as $image): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                <span class="caption">
                   <?php echo $image['description']; ?>
                </span>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</body>
<?php endwhile; ?>
<?php endif; ?>
</html>
