<!-- app/Views/admin/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <style>
        /* assets/css/admin.css */
    /* assets/css/admin.css */
    body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            background-color: #333;
            margin: 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #0056b3;
        }

        section {
            padding: 30px;
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #f4f4f4;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .success {
            background-color: #28a745;
            color: white;
        }

        .error {
            background-color: #dc3545;
            color: white;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    </style>
</head>
<body>
    <?php include('header.php')?>
    
    <nav>
        <ul>
            <li><a href="<?= site_url('admin/user_list'); ?>">Kullanıcılar</a></li>
            <li><a href="<?= site_url('admin/role_list'); ?>">Roller</a></li>
        </ul>
    </nav>

    <section>
        <h2>Hoşgeldiniz, Admin!</h2>
        <p>Yönetici paneline başarıyla giriş yaptınız.</p>
    </section>

   <?php include('footer.php')?>

   

  
</body>
</html>
