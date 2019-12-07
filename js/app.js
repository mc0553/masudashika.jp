$(function() {

    let kan = $('.kan')
    let info = $('#info')
    kan.hide();

    $(window).on('load scroll', function() {

        var box = $('.fade');
        var animated = 'animated';

        //ドキュメントがスクロールされた量を取得する変数を作る
        let scrollTop = $(document).scrollTop();
        //htmlのトップの位置を取得する
        let htmlTop = $('html').offset().top;
        // アイコンのkanをスクロールで出す
        if (scrollTop > htmlTop + 400) { kan.fadeIn('slow'); } else { kan.fadeOut('slow'); }
        // 診療時間等のinfoをスクロールで出す
        if (scrollTop > htmlTop + 100) { info.fadeOut('slow'); } else { info.fadeIn('slow'); }

        box.each(function() {

            let boxOffset = $(this).offset().top;
            let scrollPos = $(window).scrollTop();
            let wh = $(window).height();

            //画面内のどの位置で処理を実行するかで「100」の値を変更
            if (scrollPos > boxOffset - wh + 150) {
                $(this).addClass(animated);
            } else { $(this).removeClass(animated); }

        });

    });

    kan.click(function() {
        $('html,body').animate({ scrollTop: 0 }, 1000);
    })

    // ここからハンバーガーメニュー連動の動き

    $('.hamburger').click(function() {
        $('.icon').toggleClass('rotate');
        $('.icon').toggleClass('hide');
        $('.hamburger').toggleClass('rotate2');
        $('#navi').toggleClass('heightUp');
        const p1 = document.getElementById("navi");
        if (p1.style.display == "block") {
            // noneで非表示
            p1.style.display = "none";
        } else {
            // blockで表示
            p1.style.display = "block";
        }
    })


    if ($(window).width() <= 1000) {


        $('#menu-item-21').click(function() {

            // もし幅が1000px未満だったら実行

            $('.icon').toggleClass('rotate');
            $('.icon').toggleClass('hide');
            $('.hamburger').toggleClass('rotate2');
            const p1 = document.getElementById("navi");
            if (p1.style.display == "block") {
                // noneで非表示
                p1.style.display = "none";
            } else {
                // blockで表示
                p1.style.display = "block";
            }
        })

        $('#menu-item-22').click(function() {

            // もし幅が1000px未満だったら実行

            $('.icon').toggleClass('rotate');
            $('.icon').toggleClass('hide');
            $('.hamburger').toggleClass('rotate2');
            const p1 = document.getElementById("navi");
            if (p1.style.display == "block") {
                // noneで非表示
                p1.style.display = "none";
            } else {
                // blockで表示
                p1.style.display = "block";
            }
        })





    }









})