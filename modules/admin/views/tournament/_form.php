<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile("@web/css/onetothree.css");
/** @var yii\web\View $this */
/** @var app\models\Tournament $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tournament-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gamemode_id')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity_rounds')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
