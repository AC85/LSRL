<!DOCTYPE html>
<?php include('header.php'); ?>
<body>
<header class="section group">
    <div class="search">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
            <path fill="#747474" d="M184.454,171.251l-49.073-49.073c8.533-11.368,13.596-25.484,13.596-40.76
                c0-37.514-30.52-68.033-68.033-68.033S12.91,43.904,12.91,81.417c0,37.514,30.52,68.034,68.033,68.034
                c15.761,0,30.275-5.402,41.822-14.432l48.96,48.96c1.758,1.757,4.061,2.636,6.364,2.636s4.606-0.879,6.364-2.636
                C187.969,180.465,187.969,174.766,184.454,171.251z M30.91,81.417c0-27.588,22.445-50.033,50.033-50.033
                c27.589,0,50.033,22.445,50.033,50.033s-22.444,50.034-50.033,50.034C53.355,131.451,30.91,109.006,30.91,81.417z"/>
        </svg>
        <input type="text">
    </div>
    <h1 class="col u-4-5">lighting strategies research lab</h1>
    <div class="col u-1-5 logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lslr_logo.svg">
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
                <li>Start</li>
                <li>Kontakt</li>
                <li>Lehrveranstaltungen</li>
                <li>Projkete</li>
                <li>Arbeitsfeld</li>
                <li>Personen</li>
                <li>Impressum / Datenschutz</li>
            </ul>
        </nav>
    </div>
</header>
<section class="introduction">
    <div class="section group">
        <div class="col u-5-5">
            <h2>
                <?php echo get_field("uberschrift"); ?>
            </h2>
        </div>
    </div>
    <div class="section group">
        <div class="col u-3-5">

            <p class="left-introduction">
                <?php echo get_field("linke_spalte"); ?>
            </p>
        </div>
        <div class="col u-2-5">
            <p class="right-introduction">
                <?php echo get_field("rechte_spalte"); ?>
            </p>
        </div>
    </div>
</section>
<div class="section group content">
    <section class="col u-1-5">
        <div class="image-crop"><img src="http://lorempixel.com/400/200/"></div>
        <div>
            <div class="inner">
                <?php $my_query = new WP_Query('page_id=16'); ?>

                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <!-- Do special_cat stuff... -->

                    <h3><?php the_title(); ?></h3>
                    <p><?php the_content(); ?></p>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- Kontakteseite Ende -->
    </section>
    <section class="col u-1-5">
        <div class="image-crop"><img src="http://placehold.it/350x150"></div>
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
    <section class="col u-1-5 active">
        <div class="image-crop"><img src="http://placehold.it/350x150"></div>
        <div class="inner">
            <h3>Projekte</h3>
            <?php $project_posts = new WP_Query(array('category_name' => 'projekte')); ?>
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
    <section class="col u-1-5">
        <div class="image-crop"><img src="http://placehold.it/350x150"></div>
        <div class="inner">
            <?php $my_query = new WP_Query('page_id=20'); ?>

            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <!-- Do special_cat stuff... -->

                <h3><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="col u-1-5">
        <div class="image-crop"><img src="http://placehold.it/350x150"></div>
        <div class="inner">
            <?php $my_query = new WP_Query('page_id=18'); ?>

            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <!-- Do special_cat stuff... -->
                <?php $content = apply_filters('the_content', get_the_content()); ?>

                <h3><?php the_title(); ?></h3>
                <p><?php echo $content; ?></p>
            <?php endwhile; ?>
        </div>
    </section>

</div>



<?php include('footer.php'); ?>
</body>
</html>
