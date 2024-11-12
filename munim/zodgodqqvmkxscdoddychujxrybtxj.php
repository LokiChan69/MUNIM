<?php
// Подключение к базе данных
$host = 'localhost';
$db = 'school_news';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $uploadDir = 'imgs/';

    // Генерация короткого описания
    $shortDescription = mb_substr($content, 0, 100) . '...';

    // Обработка и загрузка изображения
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $imgName = basename($_FILES['img']['name']);
        $imgPath = $uploadDir . time() . '_' . $imgName;

        // Перемещение изображения в папку imgs/
        if (move_uploaded_file($_FILES['img']['tmp_name'], $imgPath)) {
            // Вставка данных в базу данных
            $stmt = $pdo->prepare("INSERT INTO articles (title, content, short_description, image_url, author, published_date) VALUES (:title, :content, :short_description, :image_url, :author, NOW())");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':short_description', $shortDescription);
            $stmt->bindParam(':image_url', $imgPath);
            $stmt->bindParam(':author', $author);

            if ($stmt->execute()) {
                echo "<p>Статья успешно добавлена!</p>";
            } else {
                echo "<p>Ошибка при добавлении статьи.</p>";
            }
        } else {
            echo "<p>Ошибка при загрузке изображения.</p>";
        }
    } else {
        echo "<p>Пожалуйста, выберите изображение.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель - Добавление статьи</title>
    <style>
        /* Основные стили формы */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .admin-panel {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #3B5998;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 1em;
            background-color: #3B5998;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        p {
            text-align: center;
            color: #3B5998;
        }
    </style>
</head>
<body>

<div class="admin-panel">
    <h2>Добавить новую статью</h2>
    <form action="admin_panel.php" method="post" enctype="multipart/form-data">
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Контент:</label>
        <textarea id="content" name="content" rows="5" required></textarea>

        <label for="author">Автор:</label>
        <input type="text" id="author" name="author" required>

        <label for="img">Изображение:</label>
        <input type="file" id="img" name="img" accept="image/*" required>

        <input type="submit" value="Добавить статью">
    </form>
</div>

</body>
</html>
