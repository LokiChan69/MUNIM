<?php
// Подключение к базе данных
$host = 'localhost'; // Адрес сервера БД
$db = 'school_news'; // Имя базы данных
$user = 'root'; // Имя пользователя БД
$pass = ''; // Пароль (если нет пароля, оставьте пустым)

// Создаем подключение к базе данных
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    exit;
}

// Запрос для получения последних новостей
$query = "SELECT id, title, content, published_date FROM articles ORDER BY published_date DESC";
$stmt = $pdo->query($query);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости - Школьная Газета</title>
    <style>
        /* Стили для страницы новостей */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

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
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .article {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .article h2 {
            color: #3B5998;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .article p {
            margin-bottom: 20px;
        }

        .article .date {
            font-size: 0.9em;
            color: #777;
        }

        .btn {
            background-color: #3B5998;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #333;
        }
        /* Общие стили для footer */
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

    <main class="main-content">
        <div class="container">
            <h2>Новости</h2>

            <?php foreach ($articles as $article): ?>
                <div class="article">
                    <h2><?= htmlspecialchars($article['title']) ?></h2>
                    <p class="date"><?= date('d.m.Y H:i', strtotime($article['date_published'])) ?></p>
                    <p><?= htmlspecialchars(substr($article['content'], 0, 150)) ?>...</p>
                    <a href="article.php?id=<?= $article['id'] ?>" class="btn">Читать далее</a>
                </div>
            <?php endforeach; ?>

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
