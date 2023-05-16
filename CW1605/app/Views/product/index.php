<?= $this->extend('layouts/_layout')?>
<?= $this->section('layoutBody')?>
<table class="table table-dark col-6">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Amount</th>
        </tr>
    </thead>
    <?php foreach ($data as $product):?>
        <tbody>
            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['title']?></td>
                <td><?=$product['price']?></td>
                <td><?=$product['amount']?></td>
            </tr>
        </tbody>
    <?php endforeach;?>
</table>
<?= $this->endSection('layoutBody')?>