<?php
Use \yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2 align = center>Заказ</h2>
<table align = center>
	<tr>
	<td>
<div>
<?php
	$clientArray = array();
	foreach ($clients as $cl) {
		$clientArray[$cl->ID_client] = $cl->last_name_client.' '.$cl->first_name_client.' '.$cl->patronimic_name_client.', '.$cl->date_birth.', '.$cl->address;
	}
	$form = ActiveForm::begin();
	echo $form->field($order, 'ID_client')->dropDownList($clientArray)->label('Клиент');
	echo $form->field($order, 'ID_goods')->dropDownList(ArrayHelper::map($goods, 'ID_goods', 'name_goods'))->label('Препарат');
	echo $form->field($order, 'quantity_goods')->label('Количество');
	echo $form->field($order, 'status_order')->checkbox()->label('Статус');
?>
<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
</div>
<?php
	ActiveForm::end();
?>
</div>
</td></tr>
	
</table>