<!DOCTYPE html>
<html lang="en">
    <head>
<style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    /* Genel Stil */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Tablo Stil */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
}

thead {
    background-color: #4CAF50;
    color: white;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Aksiyonlar İçin Bağlantılar */
td a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

td a:hover {
    color: #45a049;
}

/* Düzenleme ve Silme Butonları */
td a:first-child {
    margin-right: 15px;
}

/* Responsive Tasarım */
@media (max-width: 768px) {
    table {
        width: 100%;
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    th, td {
        padding: 10px;
    }

    td a {
        font-size: 14px;
    }
}
</style>
</head>
<body>
<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>
<table>
    <thead>
        <tr>
            <th>Rol Adı</th>
            <th>İzinler</th>
            <th>Aksiyonlar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $role['name']; ?></td>
                <td>
                    <?php
                    // Eğer permissions boşsa veya dizi değilse, boş bir string döndür
                    $permissions = is_array($role['permissions']) ? $role['permissions'] : explode(',', $role['permissions']);
                    echo implode(', ', $permissions);
                    ?>
                </td>
                <td>
                    <a href="<?= site_url('admin/editRole/'.$role['id']); ?>">Düzenle</a> |
                    <a href="<?= site_url('admin/deleteRole/'.$role['id']); ?>" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>