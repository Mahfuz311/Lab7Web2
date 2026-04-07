<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
    <style>
        /* Gaya untuk merapikan tata letak admin menjadi FULL WIDTH */
        body { margin: 0; padding: 0; font-family: sans-serif; background-color: #fff; }
        #container { width: 100%; background: #fff; }
        header h1 { color: #b5b5b5; padding: 20px 30px; margin: 0; font-size: 2.2em; }
        nav { background-color: #2464b3; width: 100%; }
        nav ul { list-style: none; margin: 0; padding: 0 10px; display: flex; }
        nav ul li a { display: block; padding: 15px 20px; color: white; text-decoration: none; font-weight: bold; }
        nav ul li a:hover, nav ul li a.active { background-color: #3b88e9; }
        
        /* Ini kuncinya: Memaksa area konten utama mengabaikan sidebar dari style.css */
        section#wrapper { padding: 20px 30px; min-height: 400px; display: block; }
        section#main { width: 100%; float: none; margin: 0; padding: 0; }
        
        table.table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table.table th, table.table td { border: 1px solid #e0e0e0; padding: 12px; text-align: left; }
        table.table th { background-color: #5c9ced; color: white; }
        .btn { padding: 6px 12px; background: #b5b5b5; text-decoration: none; color: #fff; border-radius: 4px; font-size: 14px; display: inline-block; margin-right: 5px;}
        .btn-danger { background: #e74c3c; }
        footer { background: #1a1a1a; color: #fff; padding: 15px 30px; text-align: left; width: 100%; box-sizing: border-box; clear: both; }
        
        /* Gaya tambahan untuk form input */
        form p { margin-bottom: 15px; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit; }
        input[type="submit"] { background-color: #3b88e9; color: white; border: none; cursor: pointer; padding: 10px 20px; border-radius: 4px; font-size: 16px; font-weight: bold; }
        input[type="submit"]:hover { background-color: #2464b3; }
    </style>
</head>
<body>
    <div id="container">
        <header>
            <h1>Admin Portal Berita</h1>
        </header>
        <nav>
            <ul>
                <li><a href="<?= base_url('/admin'); ?>" class="<?= (uri_string() == 'admin' || uri_string() == 'admin/') ? 'active' : '' ?>">Dashboard</a></li>
                <li><a href="<?= base_url('/admin/artikel'); ?>" class="<?= (uri_string() == 'admin/artikel') ? 'active' : '' ?>">Artikel</a></li>
                <li><a href="<?= base_url('/admin/artikel/add'); ?>" class="<?= (uri_string() == 'admin/artikel/add') ? 'active' : '' ?>">Tambah Artikel</a></li>
            </ul>
        </nav>
        <section id="wrapper">
            <section id="main">