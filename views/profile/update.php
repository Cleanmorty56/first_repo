<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
?>

<div class="profile-update">
    <h2>Изменение email</h2>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<style>
    body {
        margin: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    /* Файл: web/css/profile-update.css */
    .profile-update {
        font-family: 'Georgia', 'Times New Roman', serif;
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background-color: #f8f1e5;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(139, 69, 19, 0.1);
        border: 1px solid #d4c0a5;
        position: relative;
        overflow: hidden;
    }

    .profile-update h2 {
        color: #5a3921;
        text-align: center;
        font-size: 1.8rem;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 2px solid #8b4513;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
    }

    /* Стили для формы */
    .form-group {
        margin-bottom: 25px;
    }

    .form-control {
        background-color: #fff9f0;
        border: 1px solid #d4c0a5;
        border-radius: 5px;
        padding: 10px 15px;
        font-family: 'Georgia', serif;
        color: #5a3921;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #8b4513;
        box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
        background-color: #fff;
    }

    .help-block {
        color: #8b4513;
        font-size: 0.85rem;
        margin-top: 5px;
    }

    /* Стили для кнопки */
    .btn-primary {
        background-color: #8b4513;
        border-color: #6b3100;
        color: white;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 5px;
        transition: all 0.3s;
        display: block;
        width: 100%;
        margin-top: 20px;
        font-family: 'Georgia', serif;
    }

    .btn-primary:hover {
        background-color: #6b3100;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    /* Декоративные шахматные элементы */
    .profile-update:before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 150px;
        height: 150px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><g fill="none" fill-rule="evenodd" stroke="%238b4513" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22.5 11.63V6M20 8h5" stroke="%238b4513"/><path d="M22.5 25s4.5-7.5 3-10.5c0 0-1-2.5-3-2.5s-3 2.5-3 2.5c-1.5 3 3 10.5 3 10.5" fill="%238b4513" stroke-linecap="butt"/><path d="M11.5 37c5.5 3.5 15.5 3.5 21 0v-7s9-4.5 6-10.5c-4-6.5-13.5-3.5-16 4V27v-3.5c-3.5-7.5-13-10.5-16-4-3 6 5 10 5 10V37z" fill="%238b4513"/><path d="M11.5 30c5.5-3 15.5-3 21 0m-21 3.5c5.5-3 15.5-3 21 0m-21 3.5c5.5-3 15.5-3 21 0" stroke="%23f8f1e5"/></g></svg>');
        background-repeat: no-repeat;
        opacity: 0.1;
        z-index: 0;
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .profile-update {
            padding: 20px;
            margin: 20px 15px;
        }

        .profile-update h2 {
            font-size: 1.5rem;
        }

        .btn-primary {
            padding: 8px 20px;
        }

        .profile-update:before {
            width: 100px;
            height: 100px;
            top: -30px;
            right: -30px;
        }
    }
</style>