<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        .header {
            background: linear-gradient(45deg, #3a3a3a, #555);
            color: #fff;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 0 0 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.05rem;
            transition: color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .header a:hover {
            color: #ff9800;
            transform: scale(1.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 0.1rem;
            color: #ff9800;
            text-transform: uppercase;
        }

        /* ANİMASYONLAR */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .header {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>
<body>
<div class="header">
    <a class="logo">PROJE</a>
    <div class="header-right">
        <a href="index.php">Ana Sayfa</a>
        <a href="#stills">Yeteneklerimiz</a>
        <a href="#my-works">Çalışmalarımız</a>
        <a href="blog" class="blog-link">Blog</a>
        <a href="#contact">İletişim</a>

        <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
            <!-- Kullanıcı giriş yaptıysa -->
            <a href="profile"><?= esc($kullaniciadi) ?></a>  <!-- Kullanıcı adını burada gösteriyoruz -->
            <a href="logout">Çıkış Yap</a>
        <?php else: ?>
            <!-- Kullanıcı giriş yapmamışsa -->
            <a href="login">Giriş Yap</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
