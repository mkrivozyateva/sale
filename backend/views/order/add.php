<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Выдача</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($order, 'ID_client')->listBox(ArrayHelper::map($clients,'ID_client','first_name_client', 'last_name_client', 'patronimic_name_client'))?>
<?=$form->field($order, 'ID_goods')->listBox(ArrayHelper::map($goods,'ID_goods','name_goods', 'price_goods'))?>
<?=$form->field($order, 'quantity_goods')?>
<?=$form->field($order, 'status_order')->checkBox()?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
