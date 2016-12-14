<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Добавление препарата</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($goods, 'name_goods')?>
<?=$form->field($goods, 'weight_goods')?>
<?=$form->field($goods, 'price_goods')?>

<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
