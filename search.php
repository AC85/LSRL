<?php
    if(empty($_GET['s'])) {
        $overwrite_title = "Suche";
    } else {
        $overwrite_title = "Suche nach - " . get_query_var('s');
    }
?>
<?php include('header.php'); ?>

<?php
$s=get_search_query();
$args = array(
    's' =>$s
);
// The Query
$the_query = new WP_Query( $args ); ?>


<section class="detail active content">
            <div class="section group">

                <div class="col u-3-5">
                    <div class="mobile-search">
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
                    <?php
                    if ( $the_query->have_posts() && !empty($_GET['s'])): ?>
                        <h2 style='font-weight:bold;color:#000'>Ergebnisse:</h2>

                    <?php
                    while ( $the_query->have_posts() ):
                    $the_query->the_post();
                    ?>
                    <article class="search-result">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (have_rows('beitragsbilder')): while (have_rows('beitragsbilder')): the_row(); ?>
                                <?php if (get_sub_field('titelbild')) : ?>
                                    <?php $image = get_sub_field('bild'); ?>
                                    <div class="image-crop"><img src="<?php echo $image['url']; ?>"
                                                                 alt="<?php echo $image['alt']; ?>"/></div>
                                <?php endif; ?>
                            <?php endwhile; endif; ?>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_excerpt(); ?></p>
                        </a>
                        </article>
                    <?php
                    endwhile;
                    else:
                        if(!empty($_GET['s'])):
                        ?>
                        <h2 style='font-weight:bold;color:#000'>Keine Ergebnisse :(</h2>
                        <div class="alert alert-info">
                            <p>Leider wurden zu der Suche keine Ergebnisse gefunden.</p>
                        </div>
                    <?php endif; endif; ?>
                </div>
            </div>

        </section>

        <?php include('footer.php'); ?>

</body>
</html>
