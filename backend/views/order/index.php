<?php Use \yii\helpers\Html; ?>
<h2>Заказы</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Название препарата </th> 
		<th>Имя </th> 
		<th>Фамилия </th>
		<th>Отчество </th>
		<th>Количество </th>
		<th>Цена </th>
		<th>Статус </th>
		<th>Действия </th>
	</tr>

	<?php foreach($orders as $order){ ?>
	<tr>
		<td> <?= $order->ID_order ?> </td>
		<td> <?= htmlspecialchars($order->getIDGoods()->one()->name_goods) ?> </td>
		<td> <?php echo htmlspecialchars($order->getIDClient()->one()->first_name_client) ?> </td>
		<td> <?php echo htmlspecialchars($order->getIDClient()->one()->last_name_client) ?> </td>
		<td> <?php echo htmlspecialchars($order->getIDClient()->one()->patronimic_name_client) ?> </td>
		<td> <?= htmlspecialchars($order->quantity_goods); echo " шт."  ?> </td>
		<td> <?= htmlspecialchars($order->getIDGoods()->one()->price_goods * $order->quantity_goods) ?> </td>
		<td> <?= htmlspecialchars($order->status_order)?> </td>
		
		<td> 
			 <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['order/edit', 'ID_order' => $order ->ID_order],['class'=>'btn btn-primary']) ?>
			 <?= Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['order/delete', 'ID_order' => $order ->ID_order],['class'=>'btn btn-small btn-danger'],['type'=>'button'])?>
		</td>
	</tr>
	 <?php } ?>
	
</table>

