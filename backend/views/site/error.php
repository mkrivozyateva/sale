<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
$this->title = 'Ошибка';
?>
<div class="site-error">
    <h1>Ошибка <?= $exception->statusCode ?></h1>
    <div class="alert alert-danger">
        <?= (Html::encode($message))?>
    </div>
</div>
