<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main>
    <!-- お知らせページを読み込む -->
    <?php get_template_part('info'); ?>
    <p  id="intro"></p>
    <h2>当院の紹介</h2>
    <div class="white-line"></div>
    <section class="show-case">
        <div class="content">

            <div class="card">
                <img class="card-img" src="<?php echo get_template_directory_uri(); ?>/dist/img/看板2.jpg" alt="">
                <div class="card-space">
                    <p class="textheight">
                        当院は３代にわたって５０年以上続く、地域に根ざしたアットホームな歯科医院です
                    </p>
                </div>
                <img class="hlogo" src="<?php echo get_template_directory_uri(); ?>/dist/img/haisya2.png" alt="">
            </div>

            <div class="card">
                <img class="hlogo" src="<?php echo get_template_directory_uri(); ?>/dist/img/kaigo_kurumaisu.png" alt="">
                <div class="card-space">
                    <p class="textheight">
                        広々とした駐車場完備、車いす専用のスペースとスロープを設置しております
                    </p>
                </div>
                <img class="card-img fade fadeIn-r animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/shougai2.jpg" alt="">
            </div>

            <div class="main-img">
                <img class="fade fadeIn-b animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/駐車場.JPG" alt=""> 
            </div>


            <div class="card">
                <div class="card-space">
                    <p class="textheight">
                        待ち合いコーナーも広々としており、駐車場から診察室までバリアフリー環境となっています
                    </p>
                </div>
                <img class="hlogo" src="<?php echo get_template_directory_uri(); ?>/dist/img/haisya_woman.png" alt="">
            </div>

            <div class="imgflex">
                <img class="fade card-img fadeIn-l animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/matiai.jpg" alt="">
                <img class="fade card-img fadeIn-r animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/診察室入口1.jpg" alt="">
            </div>
     


            <div class="card">

                <div class="card-space">
                    <p class="textheight">
                        洗面台の歯みがきコーナーやトイレも車いす対応となっています。
                    </p>
                </div>
            </div>

            <div class="imgflex">
                <img class="fade card-img fadeIn-l animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/トイレ.jpg" alt="">
                <img class="fade card-img fadeIn-r animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/洗面台.jpg" alt="">
            </div>

            <div class="card">
                <img class="card-img fade fadeIn-l animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/uketuke.jpg" alt="">
                <div class="card-space">
                    <p class="textheight">
                        当院は予約制ではありませんが、お待たせしないように努めております<br>歯に関するお悩みやお困りごとなどお気軽にご相談ください
                    </p>
                </div>
            </div>

        </div>

        <div class="content">
            <div class="introcard">
                <div class="aisatu">
                    <img class="top-img1 fade fadeIn-l animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/aisatu.jpg" alt="">7
                    <p class="top-p1">痛みや不安もお聞かせください</p>
                </div>
                <div class="intro-space">
                    <p class="texttitle">院長</p>
                    <p class="textintro">益田　将裕</p>
                    <p class="texttitle">経歴</p>
                    <p class="textintro">日本歯科大学卒</p>
                    <p class="texttitle">趣味</p>
                    <p class="textintro">ロードバイク</p>
                </div>
                <div class="aisatu">
                    <img class="top-img2 fade fadeIn-r animated" src="<?php echo get_template_directory_uri(); ?>/dist/img/クロスバイク.jpg" alt="">
                    <!-- <p class="top-p2">痛みや不安もお聞かせください</p> -->
                </div>
            </div>
        </div>

    </section>

    <p id="acces"></p>
    <h2 >アクセス</h2>
    <div class="white-line"></div>
    <section class="show-case">
        <div class="acessimg">
            <p>交差点の角地　青い看板が目印です</p>
            <img class="cross" src="<?php echo get_template_directory_uri(); ?>/dist/img/交差点.JPG" alt="">
        </div>

        <div class="acesstool">
            <p>バスの方　伊予銀行西条支店前バス停から徒歩3分</p>
            <p>電車の方　伊予西条駅より徒歩10～15分</p>
            <img class="busstop" src="<?php echo get_template_directory_uri(); ?>/dist/img/screenshot.jpg" alt="">
        </div>

        <div class="acessmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.8436337793596!2d133.18332941558447!3d33.9194237806423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3551d2c61560b72f%3A0x22cbac361aa755a7!2z44CSNzkzLTAwMjYg5oSb5aqb55yM6KW_5p2h5biC5p2x55S677yS77yY77yT!5e0!3m2!1sja!2sjp!4v1571305819534!5m2!1sja!2sjp"
                width="1200" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>

    </section>

</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>