<?php slot('title', 'Hello '.$name) ?>
<?php use_stylesheet('/css/hello.css') ?>

<p>
    Hello <?php echo $name ?> (<?php echo $sf_request->getRemoteAddress() ?>)!
</p>

<?php if ('jean' !== $name) : ?>
<p>
    Say hello to
    <?php echo link_to('Jean', 'hello', array('name' => 'jean'), array(
        'class' => 'standard-link',
        'id' => 'hello'
    )) ?>.
</p>
<?php endif ?>