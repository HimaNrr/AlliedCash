<?php get_header(); ?>
<section class="box shadow span12">
    <ul>
        <li id="text-18" class="widget widget_text">
            <h2 class="widgettitle">Beach</h2>
            <div class="textwidget">
                <div id="fc-bucket-spade" class="promo">
                    <div class="text">
                        <a class="imgBtn_ComeIn" href="<?php echo home_url();?>/store-locator/">Come instore!</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</section>
<section class="main">
    <?php $this->render_main_view(); ?>
    <?php getBottomSection(); ?>
</section>

<?php get_footer(); ?>