<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
</head>
<body>
    <h1>Admin Paneli</h1>

    <h2>Kullanıcılar</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= $user['name'] ?> - <?= $user['email'] ?> 
                <a href="<?= base_url('admin/delete-user/' . $user['id']) ?>">Sil</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Roller</h2>
    <ul>
        <?php foreach ($roles as $role): ?>
            <li>
                <?= $role['name'] ?> - <?= implode(', ', $role['permissions']) ?> 
                <a href="<?= base_url('admin/delete-role/' . (string) $role['_id']) ?>">Sil</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
