<?php
$this->registerCssFile("@web/css/tour.css");
use yii\bootstrap5\Html;

?>
<div class="site-tournament">
    <h3><?= Html::encode($this->title) ?></h3>

    <div>
        <?php if(!empty($tournaments)): ?>
            <div class="tournament-list">
                <?php foreach ($tournaments as $t): ?>
                    <div class="tournament-card">
                        <img src="img/<?php echo $t['img']?>">
                        <div class="tournament-name"><?php echo $t->name; ?></div>
                        <div class="tournament-desc"><?php echo $t->description; ?></div>
                        <div class="tournament-meta">
                            <?php echo 'Режим: '. $t->gamemode->name ?>
                            <p>Локация: <?php echo $t->location; ?></p>
                            <p>Раундов: <?php echo $t->quantity_rounds; ?></p>
                            <p>Статус: <?php echo $t->status; ?></p>
                        </div>

                        <?php if (!Yii::$app->user->isGuest): ?>
                            <div class="tournament-actions">
                                <?php if ($t->isAvailableForRegistration()): ?>
                                    <?php if (in_array($t->id, $userTournamentIds)): ?>
                                        <span class="btn btn-success">Вы зарегистрированы</span>
                                    <?php else: ?>
                                        <?= Html::a('Записаться', ['site/register-for-tournament', 'tournamentId' => $t->id], [
                                            'class' => 'btn btn-primary', 'style' => 'background-color: ',
                                            'data' => [
                                                'confirm' => 'Вы уверены, что хотите записаться на этот турнир?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="btn btn-secondary">Регистрация закрыта</span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-tournaments">
                <h5>На этом уровне пока нет турниров</h5>
            </div>
        <?php endif; ?>
        <div class="back-button-container">
            <a href="<?= Yii::$app->request->referrer ?: \yii\helpers\Url::to(['site/level']) ?>" class="back-link">
                ← Вернуться к списку уровней
            </a>
        </div>
    </div>
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
</style>