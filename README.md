<?php
// Подключение к базе данных
$host = 'localhost';
$dbname = 'school_news'; // название базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Получение последних трех статей
$query = "SELECT * FROM articles ORDER BY published_date DESC LIMIT 3";
$statement = $pdo->prepare($query);
$statement->execute();
$articles = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Школьная газета</title>
    <style>
        /* Основные настройки */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Контейнер */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Шапка */
        .header {
            background: linear-gradient(135deg, #3B5998, #3B4C78);
            padding: 30px 0;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .header::before, .header::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #fff;
            opacity: 0.2;
        }
        
        .header::before {
            top: -20px;
            left: -20px;
        }
        
        .header::after {
            bottom: -20px;
            right: -20px;
        }

        .logo {
            font-size: 2.8em;
            letter-spacing: 2px;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .nav-menu li {
            margin: 0 15px;
        }

        .nav-menu a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            padding: 5px 15px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-menu a:hover {
            background-color: #333;
            color: #fff;
            border-radius: 5px;
        }

        /* Основной контент */
        .main-content {
            padding: 40px 0;
        }

        /* Блок с последними новостями */
        .highlight {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 40px;
            color: #3B5998;
        }

        .highlight-image {
            width: 50%;
            height: 300px;
            background-color: #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
        }

        .highlight-text {
            width: 50%;
        }

        .highlight-text h3 {
            font-size: 1.8em;
            color: #3B5998;
            margin-bottom: 10px;
        }

        .highlight-text p {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3B5998;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #333;
        }

        /* Сетка новостей */
        .news-section {
            margin-top: 40px;
        }

        .news-section h2 {
            color: #3B5998;
            margin-bottom: 20px;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .news-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .news-image {
            height: 150px;
            background-color: #e0e0e0;
            margin-bottom: 15px;
        }

        .btn-small {
            display: inline-block;
            padding: 5px 15px;
            background-color: #3B5998;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .btn-small:hover {
            background-color: #333;
        }

        /* Обрезка текста с троеточием */
        .news-card p {
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Ограничиваем до 3 строк */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis; /* Троеточие */
        }
        .footer {
        background-color: #222;
        color: #fff;
        padding: 40px 0;
        font-family: Arial, sans-serif;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-about,
    .footer-links,
    .footer-subscribe {
        flex: 1 1 30%;
        margin-bottom: 20px;
    }

    .footer h2, .footer h3 {
        color: #ffffff;
        font-size: 1.5em;
        margin-bottom: 15px;
    }

    .footer p {
        font-size: 1em;
        color: #e0e0e0;
        line-height: 1.6;
    }

    .footer-links ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-links a:hover {
        color: #ffcc00;
    }

    .footer-subscribe form {
        display: flex;
        flex-direction: column;
    }

    .footer-subscribe input[type="email"] {
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-bottom: 10px;
        font-size: 1em;
    }

    .footer-subscribe button {
        padding: 10px;
        background-color: #ffcc00;
        color: #3B5998;
        border: none;
        border-radius: 5px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .footer-subscribe button:hover {
        background-color: #ff9900;
    }

    .footer-bottom {
        text-align: center;
        background-color: #444;
        padding: 10px 20px;
        color: #ddd;
        font-size: 0.9em;
    }

    .footer-bottom p {
        margin: 0;
    }
    .punder {
        width: 300px;
    }
    </style>
</head>
<body>

    <!-- Шапка сайта -->
    <header class="header">
        <div class="container">
            <h1 class="logo">Школьная Газета</h1>
            <nav>
                <ul class="nav-menu">
                <li><a href="index.php">Главная</a></li>
                    <li><a href="news.php">Новости</a></li>
                    <li><a href="#">Интервью</a></li>
                    <li><a href="galary.php">Галерея</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Основной контент -->
    <main class="main-content">
        <div class="container">
            <!-- Основной блок с актуальной новостью -->
            <section class="highlight">
                <div class="highlight-image"> <img src="imgs/school.jpg" width=590 height=300>
                </div>
                <div class="highlight-text">
                    <h3>Немного о школе имени Мирзо Улугбека</h3>
                    <p style="font-size:14px;">Специализированная школа имени великого ученого и астронома Мирзо Улугбека была основана по инициативе президента Республики Узбекистан Шавката Миромановича Мирзиёева...</p>
                    <a href="mainArtic.php" class="btn">Читать далее</a>
                </div>
            </section>

            <!-- Раздел новостей -->
            <section class="news-section">
                <h2>Последние статьи</h2>
                <div class="news-grid">
                    <?php foreach ($articles as $article): ?>
                        <div class="news-card">
                            <?php if (!empty($article['image_url']) && file_exists($article['image_url'])): ?>
                                <!-- Загружаем изображение, если оно есть -->
                                <img src="<?= htmlspecialchars($article['image_url']); ?>" alt="Изображение статьи" class="news-image">
                            <?php else: ?>
                                <!-- Заглушка, если изображение не найдено -->
                                <div class="news-image">Изображение статьи</div>
                            <?php endif; ?>
                            <h3><?= htmlspecialchars($article['title']); ?></h3>
                            <p><?= htmlspecialchars($article['short_description']); ?></p>
                            <a href="article.php?id=<?= $article['id']; ?>" class="btn-small">Подробнее</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-about">
                <h2>Школьная Газета</h2>
                <p class = "punder">Новости, события и интересные истории нашей школы. Присоединяйтесь, чтобы всегда быть в курсе событий и не пропускать самые важные моменты!</p>
            </div>

            <div class="footer-links">
                <h3>Быстрая навигация</h3>
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="news.php">Новости</a></li>
                    <li><a href="news.php">События</a></li>
                    <li><a href="galary.php">Галерея</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                </ul>
            </div>

            <div class="footer-subscribe">
                <h3>Подписаться на рассылку</h3>
                <p>Получайте наши новости и обновления прямо на ваш email!</p>
                <form>
                    <input type="email" placeholder="Введите ваш email" required>
                    <button type="submit">Подписаться</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Школьная Газета. Все права защищены.</p>
        </div>
    </footer>

</body>
</html>
