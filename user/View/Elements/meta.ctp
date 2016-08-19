<?php echo $this->Html->meta('description', $this->fetch('description')); ?>
<?php echo $this->Html->meta('keywords', 'アセットシェアリング,不動産,投資,資産運用,相続,相続相談,資産組替,アセットアロケーション,資産,ポートフォリオ,インテリックス'); ?>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" href="/as/img/apple-touch-icon.png">

<meta property="og:url" content="<?php echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];?>">
<meta property="og:image" content="http://www.intellex.co.jp/as/img/ogp.png">
<meta property="og:site_name" content="Intellex">
<meta property="og:title" content="<?php echo $this->fetch('title')?>">
<meta property="og:description" content="<?php echo $this->fetch('description') ?>">
<meta property="og:type" content="article">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $this->fetch('title')?>">
<meta name="twitter:description" content="<?php echo $this->fetch('description') ?>">
<meta name="twitter:image:src" content="https://www.intellex.co.jp/as/img/ogp.png">