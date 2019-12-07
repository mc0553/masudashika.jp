<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo wp_get_document_title(); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsib.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">

    <?php wp_head(); ?>
</head>


<body>
    <header>
        <!-- ハンバーガーメニュー -->
        <div class="hamburger">
            <span class="icon"></span>
        </div>

        <section class="top">
            <div class="title-logo">
                <h1>西条市東町の通いやすくて居心地がよい歯医者さん</h1>
                <div class="home-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo_Fotogenic.jpg" alt="">
                    <h3>masuda dental clinic</h3>
                    <h2>益田歯科医院</h2>
                </div>
            </div>

            <nav id="info">
                <div class="header-right">
                    <div class="tel">
                        <a href="TEL: 0897-55-2584" target="_blank">
                        <p class="right-text">TEL 0897-55-2584</p>
                        </a>
                        <p class="right-text">【休診日】水／日／祝・祭日</p>
                    </div>
                    <p class="pcalender"><img class="calender" src="<?php echo get_template_directory_uri(); ?>/dist/img/１週間時間.png" alt=""></p>
                    <p class="right-info">《お願い》午前・午後共,来院が診療終了時間間際になりそうな場合は,お手数ですが電話でのご連絡をお願いいたします</p>
                </div>
            </nav>
        </section>

        <div class="arch">
            <div class="arch-back"></div>
        </div>

        <!-- Navigation -->
        <nav id="navi" class="navi" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php wp_nav_menu(
                array(
                    //カスタムメニュー名
                    'theme_location' => 'header-navi',
                    //コンテナを表示しない
                    'container' => false,
                    //カスタムメニューを設定しない際に固定ページでメニューを作成しない
                    'fallback_cb' => false,
                    //出力されるulに対してidやclassを表示しない
                    'items_wrap' => '<ul>%3$s</ul>',
                )
            ); ?>
        </nav>
        <!-- Navigation -->

    </header>

    <!-- パンくずリスト -->
    <?php custom_breadcrumb(); ?>