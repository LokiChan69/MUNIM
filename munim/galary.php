<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея Фотографий</title>
    <style>
        /* Основные стили страницы */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            font-size: 2.5em;
            text-align: center;
            color: #3B5998;
            margin-bottom: 40px;
        }

        .gallery {
            column-count: 5; /* Количество колонок */
            column-gap: 15px;
        }

        .gallery-item {
            display: inline-block;
            margin-bottom: 15px;
            width: 100%;
            break-inside: avoid;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        /* Стили для модального окна */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            position: relative;
            max-width: 90%;
            max-height: 80%;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #fff;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        
        .modal-close:hover {
            background-color: #3B5998;
            color: white;
        }

        /* Адаптивность */
        @media (max-width: 1024px) {
            .gallery {
                column-count: 3;
            }
        }

        @media (max-width: 768px) {
            .gallery {  
                column-count: 2;
            }
        }

        @media (max-width: 480px) {
            .gallery {
                column-count: 1;
            }
        }

        .headr {
            background: linear-gradient(135deg, #3B5998, #3B4C78);
            padding: 30px 0;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .headr::before, .header::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #fff;
            opacity: 0.2;
        }
        
        .headr::before {
            top: -20px;
            left: -20px;
        }
        
        .headr::after {
            bottom: -20px;
            right: -20px;
        }
        .continer {
                width: 90%;
                max-width: 1200px;
                margin: 0 auto;
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
    </style>
</head>
<body>
<header class="headr">
        <div class="continer">
            <h1 class="logo">Школьная Газета</h1>
            <nav>
            <ul class="nav-menu" >
                <li><a href="index.php">Главная</a></li>
                <li><a href="news.php">Новости</a></li>
                <li><a href="interview.php">Интервью</a></li>
                <li><a href="galary.php">Галерея</a></li>
                <li><a href="contacts.php">Контакты</a></li>
            </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1 class="header">Галерея Фотографий</h1>
        <div class="gallery">
            <!-- Добавляем больше фотографий -->
            <!-- Стандартный формат с указанием размеров в alt -->
            <div class="gallery-item"><img src="imgs/galary/300x200.jpg" alt="300x200"></div>
            <div class="gallery-item"><img src="imgs/galary/400x250.jpg" alt="400x250"></div>
            <div class="gallery-item"><img src="imgs/galary/500x350.jpg" alt="500x350"></div>
            <div class="gallery-item"><img src="imgs/galary/450x300.jpg" alt="450x300"></div>
            <div class="gallery-item"><img src="imgs/galary/600x400.jpg" alt="600x400"></div>
            <div class="gallery-item"><img src="imgs/galary/300x450.jpg" alt="300x450"></div>
            <div class="gallery-item"><img src="imgs/galary/400x600.jpg" alt="400x600"></div>
            <div class="gallery-item"><img src="imgs/galary/550x450.jpg" alt="550x450"></div>
            <div class="gallery-item"><img src="imgs/galary/450x550.jpg" alt="450x550"></div>
            <div class="gallery-item"><img src="imgs/galary/500x300.jpg" alt="500x300"></div>
            <div class="gallery-item"><img src="imgs/galary/350x200.jpg" alt="350x200"></div>
            <div class="gallery-item"><img src="imgs/galary/300x250.jpg" alt="300x250"></div>
            <div class="gallery-item"><img src="imgs/galary/600x500.jpg" alt="600x500"></div>
            <div class="gallery-item"><img src="imgs/galary/700x350.jpg" alt="700x350"></div>
            <div class="gallery-item"><img src="imgs/galary/250x350.jpg" alt="250x350"></div>
            <div class="gallery-item"><img src="imgs/galary/450x400.jpg" alt="450x400"></div>
            <div class="gallery-item"><img src="imgs/galary/400x450.jpg" alt="400x450"></div>
            <div class="gallery-item"><img src="imgs/galary/500x550.jpg" alt="500x550"></div>
            <div class="gallery-item"><img src="imgs/galary/350x300.jpg" alt="350x300"></div>
        </div>
    </div>

    <!-- Модальное окно -->
    <div class="modal" id="modal">
        <button class="modal-close" onclick="closeModal()">✖</button>
        <div class="modal-content">
            <img id="modal-img" src="" alt="Полноразмерное фото">
        </div>
    </div>

    <script>
        // Открытие модального окна
        const galleryItems = document.querySelectorAll('.gallery-item img');
        const modal = document.getElementById('modal');
        const modalImg = document.getElementById('modal-img');

        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                modal.style.display = 'flex';
                modalImg.src = item.src;
            });
        });

        // Закрытие модального окна
        function closeModal() {
            modal.style.display = 'none';
        }

        // Закрытие по клику вне изображения
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>
