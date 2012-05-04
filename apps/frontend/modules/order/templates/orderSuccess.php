<?php use_helper('Number') ?>
<?php slot('title', 'Your new order') ?>

<h2><?php echo __('Your order') ?></h2>

<form action="<?php echo url_for('order_edit') ?>" method="post">

    <table>

        <thead>

            <tr>
                <th>
                    <?php echo $form['address']->renderLabel() ?>
                </th>
                <th>
                    <?php echo $form['address']->renderError() ?>
                    <?php echo $form['address']->render(array(
                        'cols' => 40,
                        'rows' => 7,
                    )) ?>
                </th>
            <tr>

            <tr>
                <th>
                    <?php echo $form['zip_code']->renderLabel() ?>
                </th>
                <th>
                    <?php echo $form['zip_code']->renderError() ?>
                    <?php echo $form['zip_code']->render(array('size' => 10)) ?>
                </th>
            <tr>

            <tr>
                <th>
                    <?php echo $form['country']->renderLabel() ?>
                </th>
                <th>
                    <?php echo $form['country']->renderError() ?>
                    <?php echo $form['country']->render() ?>
                </th>
            <tr>

            <tr>
                <th><?php echo __('Movie title') ?></th>
                <th><?php echo __('Unit price') ?></th>
                <th><?php echo __('Quantity') ?></th>
            <tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="2"><?php echo __('Amount') ?></th>
                <th><?php echo format_currency($order->getAmount(), 'EUR') ?></th>
            <tr>
            <tr>
                <th colspan="2"><?php echo __('Vat') ?></th>
                <th><?php echo format_currency($order->getVat(), 'EUR') ?></th>
            <tr>
            <tr>
                <th colspan="2"><?php echo __('Total') ?></th>
                <th><?php echo format_currency($order->getTotal(), 'EUR') ?></th>
            <tr>
            <tr>
                <th colspan="3">
                    <?php echo $form->renderHiddenFields() ?>
                    <button type="submit"><?php echo __('Update') ?></button>
                    <button type="submit" name="confirm_order">
                        <?php echo __('Confirm') ?>
                    </button>
                </th>
            <tr>
        </tfoot>
        <tbody>
        <?php foreach ($order->getItems() as $i => $item) : ?>
            <tr>
                <td>
                    <?php echo $item->getMovie() ?>
                </td>
                <td>
                    <?php echo format_currency($item->getUnitPrice(), 'EUR') ?>
                </td>
                <td>
                    <?php echo $form['Items'][$i]['quantity']->renderError() ?>
                    <?php echo $form['Items'][$i]['quantity']->render(array(
                        'size' => 4,
                    )) ?>
                </td>
            <tr>
        <?php endforeach ?>
        </tbody>
    </table>
</form>