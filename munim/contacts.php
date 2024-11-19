<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты | Школьная Газета</title>
    
    <style>
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
        /* Стили для header */
        .header {
            background: linear-gradient(135deg, #3B5998, #3B4C78);
            padding: 30px 0;
            text-align: center;
            color: #fff;
        }
        .header h1 {
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
        
        /* Стили для контактной страницы */
        .contacts-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            height:500px;
        }
        .contacts-container h2 {
            font-size: 2.2em;
            color: #3B5998;
            margin-bottom: 20px;
        }
        .contacts-container p {
            font-size: 1.2em;
            color: #555;
        }
        .contact-info {
            margin-top: 20px;
            font-size: 1.1em;
        }
        .contact-info table {
            width: 100%;
            margin-top: 20px;
            color: #333;
            border-collapse: collapse;
        }
        .contact-info td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            height:100px;
        }
        .contact-info td:first-child {
            font-weight: bold;
            color: #3B5998;
        }

        /* Стили для футера */
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


    .email:hover {
        cursor: pointer;
        color: #25365c;
        font-weight: bold;
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
                    <li><a href="interview.php">Интервью</a></li>
                    <li><a href="galary.php">Галерея</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Контент страницы контактов -->
    <main class="contacts-container">
        <h2>Контактная информация</h2>
        <p>Если у вас есть вопросы, предложения или вы хотите связаться с нашей редакцией, используйте информацию ниже:</p>
        
        <div class="contact-info">
            <table>
                <tr>
                    <td>Email:</td>
                    <td><code style="color:#3B5998; font-size:16px;" class="email">xaytan1.on@gmail.com</code></td>
                </tr>
                <tr>
                    <td>Telegram:</td>
                    <td><code style="color:#3B5998; font-size:16px;"  class="tg">@yan_bragin_52</code></td>
                </tr>
                <tr>
                    <td>Телефон:</td>
                    <td><code style="color:#3B5998; font-size:16px;"  class="phoneNum">+998 91 005 19 06, +998 90 012 35 90</code></td>
    </tr>
            </table>
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
