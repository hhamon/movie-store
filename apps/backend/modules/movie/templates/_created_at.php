<div class="sf_admin_form_row sf_admin_text">
  <div>
    <label>Created at</label>
    <div class="content">
    <?php echo $form
        ->getObject()
        ->getDateTimeObject('created_at')
        ->format('d/m/Y H:i')
    ?>
    <input type="hidden" value="<?php echo $form->getObject()->getCreatedAt() ?>" name="movie[created_at]"/>
    </div>
  </div>
</div>