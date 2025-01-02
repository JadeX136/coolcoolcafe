<!-- <h2>Your Cart</h2>
<a class="btn btn-success" href="<?php echo base_url('/Order/clear_cart');?>">Clear</a>
<div class="table-responsive">
<table class="table">
    <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart_items as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td><?= $item['qty']; ?></td>
                <td><?= $item['price']; ?></td>
                <td><?= $item['subtotal']; ?></td>
                <td>
                    <?php foreach ($item['detail'] as $option_name => $option_value): ?>
                        <p><?= $option_name . ': ' . $option_value; ?></p>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr><td><p>Total: <?= $total; ?></p></td></tr>
    </tbody>
</table>
</div>
 -->
