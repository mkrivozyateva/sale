<?php Use \yii\helpers\Html; ?>
<h2>Препараты</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Наименование </th> 
		<th>Вес(гр.) </th> 
		<th>Стоимость за 1 ед.</th>
		<th></th>
	</tr>
	<?php foreach($goods as $product){ ?>
	<tr>
		<td> <?= $product->ID_goods ?> </td>
		<td> <?= htmlspecialchars($product->name_goods) ?> </td>
		<td> <?= htmlspecialchars($product->weight_goods) ?> </td>
		<td> <?= htmlspecialchars($product->price_goods) ?> </td>
		<td> <a class="btn btn-sm btn-success" href="/?r=sale/order&id=<?= $product->ID_goods ?>">Заказать</a> </td>
	</tr>
	 <?php } ?>
	 <tr>

	 </tr>
</table>