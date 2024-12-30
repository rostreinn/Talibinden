
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorum Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">
    <h1>Yorum Düzenle</h1>
    <form method="post">
        <div class="mb-3">
            <label for="comment" class="form-label">Yorumunuz</label>
            <textarea class="form-control" name="comment" id="comment" rows="3" required><?= esc($comment['comment']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Yorum Güncelle</button>
    </form>
</div>

</body>
</html>
