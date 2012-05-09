<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title><?php if (isset($metatitle) && $metatitle != NULL) {
    echo $metatitle;
} else {
    if(isset($title) && $title != NULL) { 
        echo $title;
    } else {
        echo "FlyerDirect";
    }
} ?></title>
<meta name="description" content="<?php if (isset($meta_description) && $meta_description != NULL) {
    echo $meta_description;
} else {
    
} ?>">

<meta name="keywords" content="<?php if (isset($meta_keywords) && $meta_keywords != NULL) {
    echo $meta_keywords;
} else {
    
} ?>">
<meta name="author" content="Redstudio Design Limited">

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=960, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?= base_url() ?>css/custom-theme/jquery-ui-1.8.9.custom.css">
<link rel="stylesheet" href="<?= base_url() ?>css/<?=$this->config_theme?>/base.css">
<link rel="stylesheet" href="<?= base_url() ?>css/<?=$this->config_theme?>/noskeleton.css">
<link rel="stylesheet" href="<?= base_url() ?>css/<?=$this->config_theme?>/layout.css">
<link rel="stylesheet" href="<?= base_url() ?>css/<?=$this->config_theme?>/template.css">

<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Favicons
================================================== -->
<link rel="shortcut icon" href="<?= base_url() ?>images/favicon.ico">
<link rel="apple-touch-icon" href="<?= base_url() ?>images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>images/apple-touch-icon-114x114.png">


<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-19623681-13']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>