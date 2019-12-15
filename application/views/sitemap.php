<?php $data = $this->db->get('services')->result_array(); ?>

<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

//auto detect google isis dan url web
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc> <?= base_url(); ?></loc>
        <priority>1.0</priority>
    </url>

    <!-- My code is looking quite different, but the principle is similar -->
    <?php foreach ($data as $url) { ?>
        <url>
            <loc> <?= base_url('layanan/') . $url['slug_service'] ?></loc>
            <priority>0.5</priority>
        </url>
    <?php } ?>

    <!-- <?php foreach ($data2 as $url) { ?>
        <url>
            <loc> <?= base_url('trading/') . $url['slug_trading'] ?></loc>
            <priority>0.5</priority>
        </url>
    <?php } ?> -->

</urlset>