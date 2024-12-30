<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>"> <!-- Örnek CSS Dosyası -->
    <script src="<?= base_url('assets/js/script.js'); ?>"></script> <!-- Örnek JS Dosyası -->
    <style>
        /* Genel stil */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
        }

        /* Sidebar Tasarımı */
        .sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
    padding: 20px;
    height: 100%;
    position: fixed;
    top: 0;
    right: 0;  /* Sol yerine sağa yerleştiriyoruz */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 20px;
}

.sidebar ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.sidebar ul li a:hover {
    background-color: #4CAF50;
}

        /* İçerik Alanı */
        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Tasarımı */
        .form-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }

        .form-control:focus {
            border-color: #007BFF;
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007BFF;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Responsive tasarım */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }

            .form-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="<?= site_url('admin'); ?>">Ana Sayfa</a></li>
            <li><a href="<?= site_url('admin/user_list'); ?>">Kullanıcılar</a></li>
            <li><a href="<?= site_url('admin/role_list'); ?>">Roller</a></li>
        </ul>
    </div>
    <div class="content">
        <?= $this->renderSection('content'); ?>
    </div>
</body>
</html>
