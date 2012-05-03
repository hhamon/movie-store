<div class="sf_admin_form_row sf_admin_text">
  <div>
    <label>Updated at</label>
    <div class="content">
    <?php echo $form
        ->getObject()
        ->getDateTimeObject('updated_at')
        ->format('d/m/Y H:i')
    ?>
    <input type="hidden" value="<?php echo date('Y-m-d H:i:s') ?>" name="movie[updated_at]"/>
    </div>
  </div>
</div>