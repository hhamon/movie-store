<?php use_helper('Number', 'Movie', 'Text') ?>
<?php slot('title', __('Movies list')) ?>
<?php $keyword = isset($keyword) ? $keyword : '' ?>

<?php foreach ($movies as $movie) : ?>

    <div class="leftbox">
        <h3>
            <?php echo $movie->getShotYear() ?> -
            <?php echo highlight_text($movie->getTitle(), $keyword) ?>
        </h3>

    <?php if ($movie->getImage()) : ?>
        <img class="left" 
            alt="<?php echo $movie->getTitle() ?>"
            src="<?php echo image_path($movie->getImagePath()) ?>"
        />
    <?php endif ?>

        <p>
            <strong><?php echo __('Price') ?></strong>
            <strong>
                <?php echo format_currency($movie->getPrice(), 'EUR') ?>
            </strong>
            <br/>
            <strong><?php echo __('Director') ?></strong>
            <strong><?php echo $movie->getDirector() ?></strong>
            <br/>
            <strong><?php echo __('Category') ?></strong>
            <strong><?php echo movie_category($movie->getType()) ?></strong>
            <br/>
            <strong><?php echo __('Duration') ?></strong>
            <strong>
                <?php echo format_number_choice(
                    '[1]1 minute|(1,+Inf]%duration% minutes',
                    array('%duration%' => $movie->getDuration()),
                    $movie->getDuration()
                ) ?>
            </strong>
            <br/>
            <strong><?php echo __('Support') ?></strong>
            <strong><?php echo movie_support($movie->getSupport()) ?></strong>
        </p>

        <?php echo simple_format_text(highlight_text(
            $movie->getSynopsis(),
            $keyword
        )) ?>

        <p class="readmore">
            <a href="<?php echo url_for('cart_add', array('slug' => $movie->getSlug())) ?>">
                <img alt="" src="/images/buy.gif"/>
            </a>
        </p>
        <div class="clear"></div>
    </div>
    <div class="clear br"></div>

<?php endforeach ?>