<?php
    $i = 1;
    $max = count($categories);
    $classes = array($i => 'first', $max => 'last');
?>
<?php foreach ($categories as $slug => $name) : ?>

    <dd class="<?php echo isset($classes[$i]) ? $classes[$i] : 'item' ?>">
        <?php echo link_to($name, 'category', array('category' => $slug)) ?>
    </dd>

    <?php $i++ ?>
<?php endforeach ?>
