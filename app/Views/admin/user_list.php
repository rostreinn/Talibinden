<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    /* Genel Stil */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Başlık */
h2 {
    color: #333;
    margin-top: 20px;
    font-size: 24px;
}

/* Alert Mesajı */
.alert-success {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
    text-align: center;
}

/* Tablo Tasarımı */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

th {
    font-size: 16px;
    font-weight: bold;
}

td {
    font-size: 14px;
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

/* Düzenleme ve Silme Bağlantılarına Aralarına Boşluk Ekleme */
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
        font-size: 12px;
    }

    td a {
        font-size: 12px;
    }
}

</style>
</head>
<body>
<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>

<h2>Kullanıcı Listesi</h2>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>Ad</th>
            <th>Email</th>
            <th>Aksiyonlar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['kullaniciadi']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="<?= site_url('admin/edit_user/'.$user['id']); ?>">Düzenle</a> |
                    <a href="<?= site_url('admin/deleteUser/'.$user['id']); ?>" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>

</body>
</html>