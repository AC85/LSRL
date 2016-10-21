<?php include('header.php'); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) :
        the_post(); ?>

        <section class="detail active content">
            <div class="section group">

                <div class="col u-5-5">

                    <p>
                        <?php echo the_content(); ?>
                    </p>
                </div>
            </div>

        </section>

        <?php include('footer.php'); ?>

    <?php endwhile; ?>
<?php endif; ?>
</body>
</html>
