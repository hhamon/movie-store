<?php use_helper('Number') ?>
<?php slot('title', 'Your new order') ?>

<h2><?php echo __('Your order') ?></h2>

<table>

    <thead>
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
    </tfoot>
    <tbody>
    <?php foreach ($order->getItems() as $item) : ?>
        <tr>
            <td>
                <?php echo $item->getMovie() ?>
            </td>
            <td>
                <?php echo format_currency($item->getUnitPrice(), 'EUR') ?>
            </td>
            <td>
                <?php echo $item->getQuantity() ?>
            </td>
        <tr>
    <?php endforeach ?>
    </tbody>
</table>