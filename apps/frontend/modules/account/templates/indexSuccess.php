<?php use_helper('Number') ?>

<h2>
    <?php echo __('Your orders history') ?>
</h2>

<table>
    <thead>
        <tr>
            <th><?php echo __('Reference') ?></th>
            <th><?php echo __('Amount') ?></th>
            <th><?php echo __('VAT') ?></th>
            <th><?php echo __('Total') ?></th>
            <th><?php echo __('Status') ?></th>
        <tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order) : ?>
        <tr>
            <td><?php echo $order->getReference() ?></td>
            <td>
                <?php echo format_currency($order->getAmount(), 'EUR') ?>
            </td>
            <td>
                <?php echo format_currency($order->getVat(), 'EUR') ?>
            </td>
            <td>
                <?php echo format_currency($order->getTotal(), 'EUR') ?>
            </td>
            <td><?php echo $order->getStatus() ?></td>
        <tr>
    <?php endforeach ?>
    </tbody>
</table>