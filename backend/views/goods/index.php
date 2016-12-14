<?php Use \yii\helpers\Html; ?>
<h2>Препараты</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Название </th> 
		<th>Вес(гр.) </th> 
		<th>Стоимость за 1 ед. </th>
		<th>Действия </th> 
	</tr>
	<?php foreach($goods as $product){ ?>
	<tr>
		<td> <?= $product->ID_goods ?> </td>
		<td> <?= htmlspecialchars($product->name_goods) ?> </td>
		<td> <?= htmlspecialchars($product->weight_goods) ?> </td>
		<td> <?= htmlspecialchars($product->price_goods) ?> </td>
		
		<td> <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['goods/edit', 'ID_goods' => $product ->ID_goods],['class'=>'btn btn-primary']) ?> 

			<?php
			if ($product->getOrders()->count()==0) {
			 echo Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['goods/delete', 'ID_goods' => $product ->ID_goods],['class'=>'btn btn-danger']);
			 }?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan="5" ></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>Добавить', ['goods/add']) ?>
	 </tr>
</table>