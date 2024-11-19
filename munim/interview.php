
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интервью с Учителями</title>
    <style>
        /* Общие стили, взятые из вашего кода */
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
        /* Контент */
        .container {
            width: 90%;
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 0;
        }
        h1 {
            text-align: center;
            color: #3B5998;
            margin-bottom: 30px;
            font-size: 2em;
        }
        .interview-card {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .interview-card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .teacher-photo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #ddd;
            margin-right: 20px;
            background-image: url('imgs/teacher-placeholder.jpg');
            background-size: cover;
            background-position: center;
            transition: transform 0.4s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .teacher-photo:hover {
            transform: scale(1.1);
        }
        .interview-content {
            flex: 1;
        }
        .question {
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            font-size: 1.1em;
        }
        .answer {
            color: #555;
            line-height: 1.6;
            font-size: 1em;
        }
        /* Футер */
        .footer {
            background-color: #222;
            color: #fff;
            padding: 40px 0;
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
    </style>
</head>
<body>

<!-- Шапка сайта -->
<header class="header">
    <div class="container" style="height:120px;">
        <h1 class="logo" style="color:white; margin-top: -30px;">Школьная Газета</h1>
        <nav>
            <ul class="nav-menu" style="color:white; margin-top: -10px;">
                <li><a href="index.php">Главная</a></li>
                <li><a href="news.php">Новости</a></li>
                <li><a href="interview.php">Интервью</a></li>
                <li><a href="galary.php">Галерея</a></li>
                <li><a href="contacts.php">Контакты</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Основной контент страницы с интервью -->
<main class="container">
    <h1>Интервью с Учителями</h1>
    <div class="interview-card">
        <div class="teacher-photo" style="background-image: url('imgs/teacher1.jpg');"></div>
        <div class="interview-content">
            <div class="question">Что вас вдохновило стать учителем?</div>
            <div class="answer">Я всегда стремился делиться знаниями, и для меня стать учителем было не только профессией, но и миссией.</div>
        </div>
    </div>
    <div class="interview-card">
        <div class="teacher-photo" style="background-image: url('imgs/teacher2.jpg');"></div>
        <div class="interview-content">
            <div class="question">Какой ваш любимый предмет для преподавания?</div>
            <div class="answer">Математика — это язык, который открывает ученикам множество возможностей.</div>
        </div>
    </div>
    <div class="interview-card">
        <div class="teacher-photo" style="background-image: url('imgs/teacher2.jpg');"></div>
        <div class="interview-content">
            <div class="question">Какой ваш любимый предмет для преподавания?</div>
            <div class="answer">Математика — это язык, который открывает ученикам множество возможностей.</div>
        </div>
    </div>
    <div class="interview-card">
        <div class="teacher-photo" style="background-image: url('imgs/teacher2.jpg');"></div>
        <div class="interview-content">
            <div class="question">Какой ваш любимый предмет для преподавания?</div>
            <div class="answer">Математика — это язык, который открывает ученикам множество возможностей.</div>
        </div>
    </div>
</main>

<!-- Футер сайта -->
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
