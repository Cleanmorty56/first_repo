<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

$this->registerCssFile("@web/css/onas.css");
$this->title = 'О нас';
?>

<div class="about-page">
    <div class="chess-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <h5>Страсть к игре, совершенствование мастерства, сообщество единомышленников</h5>
    </div>

    <div class="about-container">
        <section class="mission-section">
            <h2>Наша миссия</h2>
            <p style="font-size: large">Мы создали эту организацию в 2024 году с целью объединить любителей шахмат всех уровней. Наша миссия -
                популяризация шахмат как интеллектуального спорта, развитие стратегического мышления и создание
                дружелюбного сообщества.</p>

            <div class="chess-board">
                <img src="img/board.png" alt="">
            </div>
        </section>

        <section>
            <h2>Наши достижения</h2>
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">2000+</div>
                    <p>Участников</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">52+</div>
                    <p>Турниров ежегодно</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10</div>
                    <p>Гроссмейстеров</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100+</div>
                    <p>Победителей ежегодно</p>
                </div>
            </div>
        </section>

        <section>
            <h2>Наша команда</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="img/vladimir.jpg" class="member-photo">
                    <div class="member-info">
                        <h3>Владимир Петров</h3>
                        <p>Главный тренер, гроссмейстер</p>
                    </div>
                </div>
                <div class="team-member">
                    <img src="img/ww.jpg" class="member-photo">
                    <div class="member-info">
                        <h3>Дмитрий Лакаев</h3>
                        <p>Организатор турниров</p>
                    </div>
                </div>
                <div class="team-member">
                    <img src="img/tactic.jpg" class="member-photo">
                    <div class="member-info">
                        <h3>Иван Иванов</h3>
                        <p>Тренер по тактике</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2>Присоединяйтесь к нам</h2>
            <p style="font-size: large">Мы всегда рады новым участникам! Независимо от вашего уровня, у нас найдется место для вас. Участвуйте в
                турнирах, посещайте мастер-классы или просто приходите сыграть партию.</p>
            <?= Html::a('Зарегистрироваться', ['site/signup'], ['class' => 'btn btn-primary', 'style' => 'background-color: black; !important;
        color: white; !important; border: black 1px;']) ?>
        </section>
    </div>
</div>
