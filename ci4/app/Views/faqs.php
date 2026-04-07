<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <h1><?= $title ?></h1>
    <hr>
    <p><?= $content ?></p>
    <div style="margin-top: 20px;">
        <h3>Q: Bagaimana cara menambah artikel?</h3>
        <p>A: Anda bisa masuk ke halaman admin untuk menambah atau mengedit artikel.</p>
    </div>
<?= $this->endSection() ?>