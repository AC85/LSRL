<?php $overwrite_title = "Suche nach - " . get_query_var('s'); ?>
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

                <div class="col u-5-5">
                    <?php
                    if ( $the_query->have_posts() ): ?>
                        <h2 style='font-weight:bold;color:#000'>Ergebnisse:</h2>

                    <?php
                    while ( $the_query->have_posts() ):
                    $the_query->the_post();
                    ?>
                    <article>
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
                        ?>
                        <h2 style='font-weight:bold;color:#000'>Keine Ergebnisse :(</h2>
                        <div class="alert alert-info">
                            <p>Leider wurden zu der Suche keine Ergebnisse gefunden.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </section>

        <?php include('footer.php'); ?>

</body>
</html>
