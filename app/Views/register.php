<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
        include('header.php');
     ?>
<div class="container mt-5">
    <h2 class="text-center">Kayıt Ol</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            alert('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <script>
            alert('<?= session()->getFlashdata('error'); ?>');
        </script>
    <?php endif; ?>

    <form method="POST" action="<?= base_url('register') ?>">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="kullaniciadi" class="form-label">Kullanıcı Adı:</label>
            <input type="text" class="form-control" id="kullaniciadi" name="kullaniciadi" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-posta:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Şifre:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Şifreyi Onayla:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Kayıt Ol</button>
    </form>
    <p class="text-center mt-3">Zaten bir hesabınız var mı? <a href="<?= base_url('login') ?>">Giriş Yap</a></p>
</div>
<?php
        include('footer.php');
     ?>

</body>
</html>
