    <?php
    // Подключение к базе данных
    $host = 'localhost';
    $db = 'school_news';
    $user = 'root';
    $pass = '';
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

    // Проверка наличия параметра id
    if (isset($_GET['id'])) {
        $articleId = intval($_GET['id']);

        // SQL-запрос для получения статьи по id
        $stmt = $conn->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->bindParam(':id', $articleId, PDO::PARAM_INT);
        $stmt->execute();

        // Проверка, существует ли статья
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($article) {
            // Статья найдена, отображаем её
        } else {
            // Если статья не найдена
            echo "<p>Статья не найдена.</p>";
            exit;
        }
    } else {
        echo "<p>Некорректный запрос.</p>";
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>+
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($article['title']); ?></title>
        <style>
            /* Стили страницы статьи */
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                color: #333;
                line-height: 1.6;
                padding: 20px;
            }

            .container {
                max-width: 800px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .article-title {
                font-size: 2em;
                color: #3B5998;
                margin-bottom: 10px;
            }

            .article-date {
                font-size: 0.9em;
                color: #777;
                margin-bottom: 20px;
            }

            .article-image {
                width: 100%;
                height: auto;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            .article-content {
    font-size: 1.2em;
    color: #333;
    line-height: 1.8;
    word-wrap: break-word; /* Разрывать длинные слова */
    overflow-wrap: break-word; /* Переносить длинные слова */
}

        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="article-title"><?php echo htmlspecialchars($article['title']); ?></h1>
            <p class="article-date">Дата публикации: <?php echo date("d.m.Y", strtotime($article['published_date'])); ?></p>

            <?php if ($article['image_url']): ?>
                <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="Изображение статьи" class="article-image">
            <?php endif; ?>

            <div class="article-content">
                <p class="cont"><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
                
            </div>
        </div>
    </body>
    </html>
