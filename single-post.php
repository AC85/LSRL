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

<?php include('header.php'); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="detail active content">
            <div class="section group">
                <div class="col u-3-5">
                    <?php foreach ($titlePictures as $image): ?>
                        <img src="<?php echo $image['url']; ?>"
                             alt="<?php echo $image['alt']; ?>"
                             width="<?php echo $image['width'] ?>"
                             height="<?php echo $image['height'] ?>"/>
                        <span class="caption">
                   <?php echo $image['description']; ?>
                </span>
                    <?php endforeach; ?>
                </div>
                <div class="col u-2-5">
                    <div class="detail-content">

                        <?php echo the_content(); ?>

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

        <?php include('footer.php'); ?>

    <?php endwhile; ?>
<?php endif; ?>
    </body>
</html>
