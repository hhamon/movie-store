<?php use_helper('Number', 'Movie', 'Text') ?>
<?php slot('title', 'Movies list') ?>

<?php foreach ($movies as $movie) : ?>

    <div class="leftbox">
        <h3>
            <?php echo $movie->getShotYear() ?> -
            <?php echo $movie->getTitle() ?>
        </h3>

    <?php if ($movie->getImage()) : ?>
        <img class="left" 
            alt="<?php echo $movie->getTitle() ?>"
            src="<?php echo image_path($movie->getImagePath()) ?>"
        />
    <?php endif ?>

        <p>
            <strong>Price:</strong>
            <strong>
                <?php echo format_currency($movie->getPrice(), 'EUR') ?>
            </strong>
            <br/>
            <strong>Director:</strong>
            <strong><?php echo $movie->getDirector() ?></strong>
            <br/>
            <strong>Category:</strong>
            <strong><?php echo movie_category($movie->getType()) ?></strong>
            <br/>
            <strong>Duration:</strong>
            <strong><?php echo $movie->getDuration() ?> min.</strong>
            <br/>
            <strong>Support:</strong>
            <strong><?php echo movie_support($movie->getSupport()) ?></strong>
        </p>

        <?php echo simple_format_text($movie->getSynopsis()) ?>

        <p class="readmore">
            <a href="<?php echo url_for('buy_movie', array('slug' => $movie->getSlug())) ?>">
                <img alt="" src="/images/buy.gif"/>
            </a>
        </p>
        <div class="clear"></div>
    </div>
    <div class="clear br"></div>

<?php endforeach ?>