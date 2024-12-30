<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Genel Sayfa Tasarımı */
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #495057;
        }

        /* Header Stili */
        .header {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            color: white;
            padding: 20px 0;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin: 0 15px;
            font-size: 1.2rem;
        }

        .header a:hover {
            color: #ff9800;
        }

        /* Profil Fotoğrafı */
        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #007bff;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Container ve İçerik Düzeni */
        .container {
            margin-top: 80px;
        }

        .profile-section {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 25px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .comments-list {
            margin-top: 30px;
        }

        .comment-item {
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .comment-item small {
            color: #888;
        }

        /* Footer Stili */
        footer {
            background-color: #222;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }

    </style>
</head>
<body>

<?php include('header.php') ?>

    <!-- Profil İçeriği -->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="profile-section">
                    <form action="<?= base_url('profile/uploadPhoto') ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <?php if (file_exists(WRITEPATH . 'uploads/' . $user['id'] . '.jpg')): ?>
                                <img src="<?= base_url('writable/uploads/' . $user['id'] . '.jpg') ?>" class="profile-photo" alt="Profil Fotoğrafı">
                            <?php else: ?>
                                <img src="<?= base_url('default-avatar.jpg') ?>" class="profile-photo" alt="Varsayılan Fotoğraf">
                            <?php endif; ?>
                        </div>
                        <input type="file" name="profile_photo" class="form-control mb-3" accept="image/*">
                        <button type="submit" class="btn btn-custom">Fotoğraf Yükle</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-section">
                    <h1>Hoşgeldiniz, <?= htmlspecialchars($user['kullaniciadi']); ?>!</h1>
                    <p><strong>Kayıt Tarihi:</strong> <?= date('d M Y', strtotime($user['created_at'])); ?></p>
                    <hr>
                    <h3>Yorumlarınız</h3>
                    <div class="comments-list">
                        <?php if (!empty($comments)): ?>
                            <?php foreach ($comments as $comment): ?>
                                <div class="comment-item">
                                    <strong><?= htmlspecialchars($comment['title']); ?>:</strong>
                                    <p><?= htmlspecialchars($comment['comment']); ?></p>
                                    <small class="text-muted">Tarih: <?= date('d M Y, H:i', strtotime($comment['created_at'])); ?></small>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Henüz yorum yapmamışsınız.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
   <?php include('footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
