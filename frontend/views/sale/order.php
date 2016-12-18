<?php
Use \yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2 align = center>Заказ</h2>
<h3 align = center><?= $product->name_goods ?></h3>
<table align = center>
	<tr>
	<td>
<div>
<?php
	$clientArray = array();
	$form = ActiveForm::begin();
	echo $form->field($client, 'last_name_client')->label('Фамилия');
	echo $form->field($client, 'first_name_client')->label('Имя');
	echo $form->field($client, 'patronimic_name_client')->label('Отчество');
	echo $form->field($client, 'date_birth')->label('Дата Рождения(ГГГГ-ММ-ДД)');
	echo $form->field($client, 'address')->label('Адрес');
	echo $form->field($order, 'quantity_goods')->label('Количество');
?>
<div class="form-group">
    <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
</div>
<?php
	ActiveForm::end();
?>
</div>
</td></tr>
	
</table>
