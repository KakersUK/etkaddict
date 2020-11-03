<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?= $title ?></title>
<?php if($active == "Home") { ?>
<meta name="description" content="ETK Addict imports data from the available ExtremeTK APIs and displays it for you in an easy to read format." />
<meta name="keywords" content="ExtremeTK,ETKAddict,ETK Addict,Realm of Chaos,Userpages,Powerlists,Stats">
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="/favicon.ico" />
<!-- Stylesheets -->
<link rel="stylesheet" property="stylesheet" href="/assets/css/bootstrap.min.css?1.3.9" />
<link rel="stylesheet" property="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" >
<?php if($active == "Rankings" || $active == "Clans" ) { ?>
<link rel="stylesheet" property="stylesheet" href="/assets/css/bootstrap-table.min.css?1.3.9" />
<?php } ?>
<link rel="stylesheet" property="stylesheet" href="/assets/css/style.min.css?1.3.9" />
<script data-cfasync="false">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-113859354-2', 'auto');
    ga('send', 'pageview');
</script>
</head>
<body>
<!-- start:wrap -->
<div id="wrap">

<!-- start:navbar -->
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span id="navbar-logo"><a href="/"><img src="/assets/img/logo.png" alt="ETK Addict Logo" width="50" height="50" />ETK Addict</a></span>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if($active == "Home"){echo "class=\"active\"";}?>>
                    <a href="/"><i class="fas fa-home nav-icons"></i>Home</a>
                </li>
                <li <?php if($active == "About"){echo "class=\"active\"";}?>>
                    <a href="/about/"><i class="fas fa-info nav-icons"></i>About</a>
                </li>                 
                <li <?php if($active == "Rankings"){echo "class=\"active\"";}?>>
                    <a href="/rankings/"><i class="fas fa-chart-line nav-icons"></i>Rankings</a>
                </li>
                <li <?php if($active == "Characters"){echo "class=\"active\"";}?>>
                    <a href="/characters/"><i class="fas fa-user nav-icons"></i>Characters</a>
                </li>
                <li <?php if($active == "Clans"){echo "class=\"active\"";}?>>
                    <a href="/clans/"><i class="fas fa-users nav-icons"></i>Clans</a>
                </li>
                <li <?php if($active == "Calculators"){echo "class=\"active\"";}?>>
                    <a href="/calculators/"><i class="fas fa-calculator nav-icons"></i>Calculators</a>
                </li>                
                <li>
                    <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#104;&#111;&#108;&#108;&#97;&#110;&#100;&#101;&#116;&#107;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;'><i class="fas fa-at nav-icons"></i>Contact</a>
                </li>                 
            </ul>
        </div> 
    </div>
</div>
<!-- end:navbar -->
