<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Добавление клиента</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($client, 'last_name_client')?>
<?=$form->field($client, 'first_name_client')?>
<?=$form->field($client, 'patronimic_name_client')?>
<?=$form->field($client, 'date_birth')?>
<?=$form->field($client, 'address')?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>