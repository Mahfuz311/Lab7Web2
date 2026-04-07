<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'My Website' ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
    <style>
        #container { display: flex; flex-direction: column; min-height: 100vh; width: 100%; max-width: 100%; background: #fff; }
        
        section#wrapper { flex: 1; padding: 20px 30px; display: block; }
        section#main { width: 100%; float: none; margin: 0; padding: 0; }
        
        footer { background: #1a1a1a; color: #fff; padding: 15px 30px; text-align: center; width: 100%; box-sizing: border-box; margin-top: auto; }
        
        nav { background-color: #2464b3; display: flex; padding: 0 10px; }
        nav a { padding: 15px 20px; color: white; text-decoration: none; font-weight: bold; }
        nav a:hover, nav a.active { background-color: #3b88e9; }
    </style>
</head>
<body>
    <div id="container">
        <header>
            <h1>Portal Berita</h1>
        </header>
        
        <nav>
            <a href="<?= base_url('/'); ?>" class="<?= (uri_string() == '' || uri_string() == '/') ? 'active' : '' ?>">Home</a>
            <a href="<?= base_url('/artikel'); ?>" class="<?= (uri_string() == 'artikel') ? 'active' : '' ?>">Artikel</a>
            <a href="<?= base_url('/about'); ?>" class="<?= (uri_string() == 'about') ? 'active' : '' ?>">About</a>
            <a href="<?= base_url('/contact'); ?>" class="<?= (uri_string() == 'contact') ? 'active' : '' ?>">Kontak</a>
        </nav>
        
        <section id="wrapper">
            <section id="main">
                <?= $this->renderSection('content') ?>
            </section>
        </section>
        
        <footer>
            <p>&copy; 2026 Mahfuz Fauzi</p>
        </footer>
    </div>
</body>
</html>