<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        /* Genel Tasarım */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Header ve Footer için boşluklar */
        header, footer {
            padding: 20px 0;
            background-color: #222;
            color: white;
        }

        /* Başlık */
        h1 {
            font-size: 2.5rem;
            text-align: center;
            color: #333;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        /* Blog Yazıları */
        .container {
            margin-top: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            background-color: white;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #f4f4f4;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
            font-size: 1rem;
            color: #555;
        }

        .card-footer {
            background-color: #f9f9f9;
            padding: 10px;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-warning:hover, .btn-danger:hover {
            background-color: #333;
            transform: scale(1.05);
        }

        .btn-primary {
            background-color: #5c6bc0;
            color: white;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3949ab;
            transform: scale(1.05);
        }

        .form-control {
            border-radius: 5px;
            box-shadow: none;
            margin-top: 10px;
        }

        /* Yorumlar */
        .comment-container {
            margin-top: 20px;
        }

        .comment-container .comment {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .comment-container .comment:hover {
            background-color: #e8e8e8;
        }

        .comment-container .comment strong {
            color: #333;
        }

        /* Footer */
        footer {
            text-align: center;
            background-color: #222;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<?php include('header.php'); ?>

<div class="container mt-4">
    <h1>Blog Yazıları</h1>
    <div class="row">
        <?php if (!empty($blogs)): ?>
            <?php foreach ($blogs as $blog): ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong><?= esc($blog['title']) ?></strong>
                        </div>
                        <div class="card-body">
                            <p><?= esc($blog['content']) ?></p>
                        </div>
                        <div class="card-footer">
                            <h5>Yorumlar:</h5>
                            <div class="comment-container">
                                <?php if (!empty($blog['comments'])): ?>
                                    <?php foreach ($blog['comments'] as $comment): ?>
                                        <div class="comment">
                                            <strong><?= esc($comment['user_id']) ?>:</strong>
                                            <p><?= esc($comment['comment']) ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Henüz yorum yok.</p>
                                <?php endif; ?>
                            </div>
                            <form action="<?= base_url('/add_comment')?>" method="post">
                            
                                <input type="hidden" name="blog_id" value="<?= esc($blog['_id']) ?>">
                                <input type="hidden" name="user_id" value="anonymous_user">
                                <textarea class="form-control" name="comment" placeholder="Yorumunuzu yazın..." required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Yorum Yap</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Henüz blog yazısı bulunmamaktadır.</p>
        <?php endif; ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 Blog Sayfası. Tüm hakları saklıdır.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Yorum gönderme işlemi
    document.getElementById('commentForm').onsubmit = function(event) {
    event.preventDefault(); // Formun varsayılan davranışını engelle

    let formData = new FormData(this);
    let data = {
        blog_id: formData.get('blog_id'),
        user_id: formData.get('user_id'),
        comment: formData.get('comment')
    };

    fetch('http://127.0.0.1:5000/add_comment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data) // JSON verisini gönderiyoruz
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            alert('Yorum başarıyla eklendi!');
            // Yorum başarıyla eklendikten sonra blog sayfasına yönlendir
            window.location.href = 'blog'; // Blog sayfasına yönlendirme
        } else {
            alert('Bir hata oluştu: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Bir hata oluştu.');
    });
}
</script>

</body>
</html>
