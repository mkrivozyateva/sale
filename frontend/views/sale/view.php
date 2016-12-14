<?php Use \yii\helpers\Html; ?>
<div class="jumbotron">
  <h1><?= htmlspecialchars($goods->name_goods); ?></h1>
  <ul>
  <?php foreach($goods->getIssuings() ->all() 
  as $order) { ?>
  <ul class="list-group"> 
  <li class="list-group-item">
  Выдана: <?php  echo $order->issue_date;
	?> 
	<br>
	Дата возврата:
	<?php
	echo $issuing->expiration_date;
	?>
	<br>
	</li></ul>
  <?php } ?>
  </ul>
</div>