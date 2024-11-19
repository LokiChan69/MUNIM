<?php
session_start();

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

// Обработка выхода
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Обработка отправки формы входа
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Поиск пользователя в базе данных
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    // Проверка пароля
    if ($user && hash('sha256', $password) === $user['password_hash']) {
        $_SESSION['logged_in'] = true;
    } else {
        $login_error = "Неверный логин или пароль.";
    }
}

// Проверка, если пользователь не авторизован, отображается форма входа
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true):
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход администратора</title>
    <style>
        /* Стили для централизованной формы входа */
        body { display: flex; justify-content: center; align-items: center; height: 100vh; font-family: Arial, sans-serif; }
        .login-container { width: 300px; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center; }
        .login-container input { width: 100%; padding: 10px; margin: 10px 0; }
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Вход администратора</h2>
        <?php if (isset($login_error)) echo "<p class='error'>$login_error</p>"; ?>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Логин" required><br>
            <input type="password" name="password" placeholder="Пароль" required><br>
            <button type="submit" name="login">Войти</button>
        </form>
    </div>
</body>
</html>

<?php
exit;
endif; // Завершаем условие входа, чтобы показать админ-панель только после авторизации
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <style>
        /* Стили для панели администратора */
        body { font-family: Arial, sans-serif; }
        .logout { text-align: right; margin: 10px; }
        .container { max-width: 600px; margin: auto; padding: 20px; background: #f4f4f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
        h2 { text-align: center; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="logout">
        <a href="?logout=true">Выйти</a>
    </div>
    <div class="container">
        <h2>Админ панель - Добавление статьи</h2>
        <!-- Форма добавления статьи -->
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Контент:</label>
            <textarea id="content" name="content" rows="5" required></textarea>

            <label for="author">Автор:</label>
            <input type="text" id="author" name="author" required>

            <label for="img">Изображение:</label>
            <input type="file" id="img" name="img" accept="image/*" required>

            <input type="submit" value="Добавить статью" name="submit_article">
        </form>

        <?php
        // Обработка добавления статьи
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_article'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
            $uploadDir = 'imgs/';

            // Короткое описание
            $shortDescription = mb_substr($content, 0, 100) . '...';

            // Обработка изображения
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $imgName = basename($_FILES['img']['name']);
                $imgPath = $uploadDir . time() . '_' . $imgName;

                if (move_uploaded_file($_FILES['img']['tmp_name'], $imgPath)) {
                    // Вставка данных в базу данных
                    try {
                        $stmt = $pdo->prepare("INSERT INTO school_news.articles (title, content, short_description, image_url, author, published_date) VALUES (:title, :content, :short_description, :image_url, :author, NOW())");
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
                    } catch (PDOException $e) {
                        echo "<p>Ошибка при добавлении статьи: " . $e->getMessage() . "</p>";
                    }
                } else {
                    echo "<p>Ошибка при загрузке изображения.</p>";
                }
            } else {
                echo "<p>Пожалуйста, выберите изображение.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
