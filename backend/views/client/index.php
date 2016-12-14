<?php Use \yii\helpers\Html; ?>
<h2>Клиенты</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Фамилия </th> 
		<th>Имя </th> 
		<th>Отчество </th> 
		<th>День рождения(гггг-мм-дд) </th> 
		<th>Адрес </th> 
		<th>Действия </th> 
	</tr>
	<?php foreach($clients as $client){ ?>
	<tr>
		<td> <?= $client->ID_client ?> </td>
		<td> <?= htmlspecialchars($client->last_name_client) ?> </td>
		<td> <?= htmlspecialchars($client->first_name_client) ?> </td>
		<td> <?= htmlspecialchars($client->patronimic_name_client) ?> </td>
		<td> <?= htmlspecialchars($client->date_birth) ?> </td>
		<td> <?= htmlspecialchars($client->address) ?> </td>
		<td> <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['client/edit', 'ID_client' => $client ->ID_client],['class'=>'btn btn-primary']) ?>

			<?php
			if ($client->getOrders()->count()==0) {
			 echo Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['client/delete', 'ID_client' => $client ->ID_client],['class'=>'btn btn-danger']);
			 }?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan="6" ></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>Добавить нового', ['client/add']) ?>
	 </tr>
</table>