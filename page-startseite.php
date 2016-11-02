<!DOCTYPE html>
<?php include('header.php'); ?>

<section class="introduction" data-menu-item="start">
    <div class="section group">
        <div class="col u-5-5">
            <h2>
                <?php echo get_field("uberschrift"); ?>
            </h2>
        </div>
    </div>
    <div class="section group">
        <div class="col u-3-5">

            <div class="left-introduction">
                <?php echo get_field("linke_spalte"); ?>
            </div>
        </div>
        <div class="col u-2-5">
            <div class="right-introduction">
                <?php echo get_field("rechte_spalte"); ?>
            </div>
        </div>
    </div>
</section>
<div class="section group content">
    <section class="col u-1-5" data-menu-item="kontakt">
        <div class="image-crop"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kontakt.jpg"></div>
        <div>
            <div class="inner">
                <?php $my_query = new WP_Query('page_id=16'); ?>

                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <!-- Do special_cat stuff... -->

                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- Kontakteseite Ende -->
    </section>
    <section class="col u-1-5" data-menu-item="lehrveranstaltungen">
        <div class="image-crop bottom"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/lv.jpg""></div>
        <div class="inner">
            <h3>Lehrveranstaltungen</h3>
            <?php $project_posts = new WP_Query(array('category_name' => 'lehrveranstaltungen')); ?>
            <?php while ($project_posts->have_posts()) : $project_posts->the_post(); ?>
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
            <?php endwhile; ?>
        </div>
    </section>
    <section class="col u-1-5 active" data-menu-item="projekte">
        <div class="image-crop bottom"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/projekte.jpg""></div>
        <div class="inner">
            <h3>Projekte</h3>
            <?php $project_posts = new WP_Query(array('category_name' => 'projekte', 'posts_per_page' => 5)); ?>
            <?php while ($project_posts->have_posts()) : $project_posts->the_post(); ?>
                <article project-id="<?php the_ID(); ?>">
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
            <?php endwhile; ?>
        </div>
    </section>
    <section class="col u-1-5" data-menu-item="arbeitsfeld">
        <div class="image-crop bottom"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arbeitsfeld.jpg""></div>
        <div class="inner">
            <?php $my_query = new WP_Query('page_id=20'); ?>

            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <!-- Do special_cat stuff... -->

                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="col u-1-5" data-menu-item="personen">
        <div class="image-crop"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/personen.jpg""></div>
        <div class="inner">
            <?php $my_query = new WP_Query('page_id=18'); ?>

            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <!-- Do special_cat stuff... -->
                <?php $content = apply_filters('the_content', get_the_content()); ?>

                <h3><?php the_title(); ?></h3>
                <?php echo $content; ?>
            <?php endwhile; ?>
        </div>
    </section>

</div>


<?php include('footer.php'); ?>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/startpage.js"></script>
</body>
</html>
