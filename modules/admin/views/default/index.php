<?php use yii\helpers\Url;?>
<div class="admin-default-index chess-admin-theme">
    <h1 class="chess-admin-title">Административная панель</h1>
    <p class="chess-admin-subtitle">Управление шахматной организацией</p>

    <div class="chess-divider"></div>

    <div class="chess-button-container">
        <a href="<?php echo Url::to(['tournament/index']) ?>" class="chess-admin-btn chess-tournament-btn">
            <i class="fas fa-chess-board"></i>
            <span>Управление турнирами</span>
        </a>

        <a href="<?php echo Url::to(['planning/index']) ?>" class="chess-admin-btn chess-planning-btn">
            <i class="fas fa-chess-king"></i>
            <span>Заявки на планирование турниров</span>
        </a>
    </div>

    <div class="chess-board-decoration">
        <div class="chess-piece king"></div>
        <div class="chess-piece queen"></div>
        <div class="chess-piece rook"></div>
    </div>
</div>

<style>
    .chess-admin-theme {
        font-family: 'Georgia', 'Times New Roman', serif;
        background-color: #f8f1e5;
        padding: 30px;
        border-radius: 15px;
        max-width: 900px;
        margin: 30px auto;
        box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
        position: relative;
        overflow: hidden;
    }

    .chess-admin-title {
        color: #5a3921;
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 10px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        font-weight: bold;
    }

    .chess-admin-subtitle {
        color: #8b4513;
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 30px;
        font-style: italic;
    }

    .chess-divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, #8b4513, transparent);
        margin: 20px 0;


    }

    body {
        margin: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    .chess-button-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin: 40px 0;
    }

    .chess-admin-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 30px 20px;
        border-radius: 10px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
        z-index: 1;
        border: 2px solid transparent;
    }

    .chess-admin-btn i {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .chess-admin-btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(139, 69, 19, 0.9), rgba(91, 57, 33, 0.9));
        z-index: -1;
        transition: all 0.3s ease;
    }

    .chess-admin-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }

    .chess-admin-btn:hover:before {
        background: linear-gradient(135deg, rgba(139, 69, 19, 1), rgba(91, 57, 33, 1));
    }

    .chess-tournament-btn:before {
        background: linear-gradient(135deg, rgba(106, 81, 56, 0.9), rgba(70, 50, 30, 0.9));
    }

    .chess-planning-btn:before {
        background: linear-gradient(135deg, rgba(139, 69, 19, 0.9), rgba(91, 57, 33, 0.9));
    }

    .chess-board-decoration {
        position: absolute;
        bottom: -30px;
        right: -30px;
        opacity: 0.1;
        z-index: 0;
    }

    .chess-piece {
        width: 100px;
        height: 100px;
        background-size: contain;
        background-repeat: no-repeat;
        position: absolute;
    }

    .king {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><g fill="none" fill-rule="evenodd" stroke="%23000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22.5 11.63V6M20 8h5" stroke="%23000"/><path d="M22.5 25s4.5-7.5 3-10.5c0 0-1-2.5-3-2.5s-3 2.5-3 2.5c-1.5 3 3 10.5 3 10.5" fill="%23000" stroke-linecap="butt"/><path d="M11.5 37c5.5 3.5 15.5 3.5 21 0v-7s9-4.5 6-10.5c-4-6.5-13.5-3.5-16 4V27v-3.5c-3.5-7.5-13-10.5-16-4-3 6 5 10 5 10V37z" fill="%23000"/><path d="M11.5 30c5.5-3 15.5-3 21 0m-21 3.5c5.5-3 15.5-3 21 0m-21 3.5c5.5-3 15.5-3 21 0" stroke="%23fff"/></g></svg>');
        right: 0;
        bottom: 0;
    }

    .queen {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><g fill="%23000" fill-rule="evenodd" stroke="%23000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 12a2 2 0 1 1-4 0 2 2 0 1 1 4 0zm16 0a2 2 0 1 1-4 0 2 2 0 1 1 4 0zm7 10a2 2 0 1 1-4 0 2 2 0 1 1 4 0zM6 26a2 2 0 1 1-4 0 2 2 0 1 1 4 0zm28-4a2 2 0 1 1-4 0 2 2 0 1 1 4 0z" stroke="none"/><path d="M9 26c8.5-1.5 21-1.5 27 0l2-12-7 11V11l-5.5 13.5-3-15-3 15-5.5-14V25L7 14l2 12z" stroke-linecap="butt"/><path d="M9 26c0 2 1.5 2 2.5 4 1 1.5 1 1 .5 3.5-1.5 1-1.5 2.5-1.5 2.5-1.5 1.5.5 2.5.5 2.5 6.5 1 16.5 1 23 0 0 0 1.5-1 0-2.5 0 0 .5-1.5-1-2.5-.5-2.5-.5-2 .5-3.5 1-2 2.5-2 2.5-4-8.5-1.5-18.5-1.5-27 0z" stroke-linecap="butt"/><path d="M11.5 30c3.5-1 18.5-1 22 0M12 33.5c6-1 15-1 21 0" fill="none"/></g></svg>');
        right: 80px;
        bottom: 20px;
    }

    .rook {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><g fill="%23000" fill-rule="evenodd" stroke="%23000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 39h27v-3H9v3zM12 36v-4h21v4H12zM11 14V9h4v2h5V9h5v2h5V9h4v5" stroke-linecap="butt"/><path d="M34 14l-3 3H14l-3-3"/><path d="M31 17v12.5H14V17" stroke-linecap="butt" stroke-linejoin="miter"/><path d="M31 29.5l1.5 2.5h-20l1.5-2.5"/><path d="M11 14h23" fill="none" stroke-linejoin="miter"/></g></svg>');
        right: 40px;
        bottom: 60px;
    }

    @media (max-width: 768px) {
        .chess-admin-theme {
            padding: 20px;
            margin: 20px 15px;
        }

        .chess-button-container {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .chess-admin-btn {
            padding: 20px;
            font-size: 1rem;
        }

        .chess-admin-btn i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .chess-admin-title {
            font-size: 2rem;
        }
    }
</style>