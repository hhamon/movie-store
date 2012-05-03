<?php if ($path = $movie->getImagePath()) : ?>

    <img src="<?php echo image_path($path) ?>" 
        alt="<?php echo $movie->getTitle() ?>" />

<?php endif ?>