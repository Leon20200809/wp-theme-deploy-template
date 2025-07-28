<?php
/*
Template Name: チンチロリン
*/
?>

<?php get_header(); ?>

<style>
/* ページタイトル */
    .page-title,
    .page-title-texton{
        background-color: #faa755;
        color: #fff;
        font-size: 2.25rem;
        padding: 50px 0;
        text-align: center;
        position: relative;
    }
/* セクションタイトル */
    .section-title{
        text-align: center;
        font-size: 2.75rem;
        font-weight: bold;
        position: relative;
        padding: 60px 0;
    }
    .section-title::before{
        position: absolute;
        content: "";
        width: 200px;
        height: 3px;
        background-color: #faa755;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
    }
    .section-title::after{
        position: absolute;
        content: "";
        width: 200px;
        height: 3px;
        background-color: #faa755;
        top: 50%;
        transform: translateY(-50%);
        right: 0;
    }
/* テキストエリア */
    .text-nomal{
        background-color: #fff;
        border: #faa755 2px solid;
        border-radius: 10px;
        font-size: 1.25rem;
        font-weight: bold;
        line-height: 2.5;
        padding: 10px 20px;
        position: relative;
        margin-bottom: 20px;
    }
/* ボタン */
    .btn-area{
        text-align: center;
        margin: 50px;
    }
    .btn-1,.btn-2,.btn-3{
        display: inline-block;
        width: 250px;
        line-height: 3.5;
        margin: 0 auto;
        text-align: center;
        text-decoration: none;
        border-radius: 10px;
        color: #fff;
        font-weight: bold;
        background-color: #faa755;
        box-shadow: 5px 5px 0px #58320b;
        transition: .3s;
        position: relative;
        overflow: hidden;
    }
    .btn-1::after{
        position: absolute;
        content: "";
        width: 10px;
        height: 10px;
        border-top: #fff 3px solid;
        border-right: #fff 3px solid;
        transform: rotate(45deg) translateY(-50%);
        top: 45%;
        right: 25px;    
    }
    .btn-1::before{
        position: absolute;
        display: inline-block;
        content: "";
        width: 30px;
        height: 100%;
        top: -180px;
        left: 0;
        background-color: #fbfbfb;
        animation: shining 2.5s ease-in-out infinite;
    }

    .btn-1:hover,
    .btn-2:hover,
    .btn-3:hover{
        box-shadow: unset;
        transform: translate(4px,4px);
    }

/* セクション */
    #chinchiro{
        background-color: rgba(255, 249, 226, 1);
        overflow-x: hidden;
    }

    #result-text{
        font-weight: bold;
        margin: 3%;
        font-size: 1.25rem;
        color: #000;
        height: 60px;
        line-height: 60px;
    }
    #roll-dice{
        border: 1px solid #000;
    }

    #dice-1,#dice-2,#dice-3{
        width: 100px;
        height: 100px;
        display: inline-block;
    }

    .dice-results, .chinchiroyaku, .dice-area{
        text-align: center;
        margin: 2%;
    }
    .chinchiroyaku img{
        border: #000 2px solid;
    }
    .chinchiroyaku p{
        text-decoration: underline 2px double;
        text-underline-offset: 5px;
        margin-top: 5%;
        margin-bottom: 1%;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .will-learn{
        margin: 5% 0;
    }
    .will-learn dt{
        padding: 0 3%;
    }
    .will-learn dd{
        padding: 0 3%;
        margin-bottom: 2%;
        font-size: 1rem;
        font-weight: normal;
        line-height: 1.5;
    }
    .will-learn{
        
    }
</style>

<section id="chinchiro">
    <h1 class="page-title">PHPとJavascriptで作ったチンチロリン</h1>
    <main class="wrapper">
        
        <div class="dice-results">
            <p id="result-text">サイコロの出目</p>
            <div class="dice-area">
                <span id="dice-1"><img src="<?php echo esc_url(get_theme_file_uri('/img/dice/saikoro-illust1.png')) ?>" alt=""></span>
                <span id="dice-2"><img src="<?php echo esc_url(get_theme_file_uri('/img/dice/saikoro-illust1.png')) ?>" alt=""></span>
                <span id="dice-3"><img src="<?php echo esc_url(get_theme_file_uri('/img/dice/saikoro-illust1.png')) ?>" alt=""></span>
            </div>
            <button id="roll-dice" class="btn-1">サイコロを振る</button>
        </div>

        <div class="chinchiroyaku">
            <p>役一覧</p>
            <img src="<?php echo esc_url(get_theme_file_uri('./img/dice/chinchiroyaku.png')); ?>" alt="">
        </div>

        <div class="will-learn">
            <h2 class="section-title">このページを作ることで学べること</h2>
            <dl class="text-nomal">
                <dt>オリジナルのWEBページが作れるようになる。</dt>
                <dd>
                    HTML、CSS、JavaScript（jQuery）の理解が深まり、WEB制作の基礎固めに良い。<br>
                    ソースコードが読めると世に出回っているWEBサイトを参考にして自分好みデザインやアニメーションにカスタマイズして組み込める。<br>
                    ChatGPTへ上手く指示が出せるようになり、正解に近いヒントを出してくれるようになる。
                </dd>

                <dt>オリジナルのWEBページをワードプレスに組み込めるようになる。</dt>
                <dd>
                    自動で画像やURLを読み込むワードプレスの関数を覚えて動的で実践的なWEBページが作れる。
                </dd>
            </dl>
        </div>

    </main>
</section>


<script>
    jQuery(function($){
        
        // スタートボタンクリック処理
        $("#roll-dice").click(function(){
            
            $('#result-text').css({
                'font-size': '1.25rem',
                'color': '#000',
            })

            // 1から6のランダムな数を生成
            let dice_1 = Math.floor(Math.random() * 6) + 1; //0から0.5.999の数字を生成。小数点以下切り捨て
            let dice_2 = Math.floor(Math.random() * 6) + 1;
            let dice_3 = Math.floor(Math.random() * 6) + 1;

            let home_url = "<?php echo esc_url(get_theme_file_uri()); ?>";

            let img_url_1 = '/img/dice/saikoro-illust'+ dice_1 +'.png';
            let img_url_2 = '/img/dice/saikoro-illust'+ dice_2 +'.png';
            let img_url_3 = '/img/dice/saikoro-illust'+ dice_3 +'.png';

            // サイコロの表示
            $("#dice-1").html('<img src=" '+ home_url + img_url_1 +'" alt="">');
            $("#dice-2").html('<img src=" '+ home_url + img_url_2 +'" alt="">');
            $("#dice-3").html('<img src=" '+ home_url + img_url_3 +'" alt="">');

            // 結果判定
            let result = "";

            // サイコロの目をソート
            let dice = [dice_1, dice_2, dice_3].sort();

            // ゾロ目かチェック
            if(dice_1 === dice_2 && dice_2 === dice_3){
                switch(dice_1){
                    case 1:
                        $('#result-text').text('ピンゾロのアラシ');
                        $('#result-text').css({
                            'font-size': '2.5rem',    // フォントサイズを大きくする
                            'color': 'red',       // 文字色を緑に変更
                        })
                        break;
                    
                    case 2:
                        $('#result-text').text('ニゾウのアラシ');
                        $('#result-text').css({
                            'font-size': '2rem',    // フォントサイズを大きくする
                            'color': 'red',       // 文字色を緑に変更
                        })
                        break;

                    case 3:
                        $('#result-text').text('サンタのアラシ');
                        $('#result-text').css({
                            'font-size': '2rem',    // フォントサイズを大きくする
                            'color': 'red',       // 文字色を緑に変更
                        })
                        break;
                    
                    case 4:
                        $('#result-text').text('ヨツヤのアラシ');
                        $('#result-text').css({
                            'font-size': '2rem',    // フォントサイズを大きくする
                            'color': 'red',       // 文字色を緑に変更
                        })
                        break;

                    case 5:
                        $('#result-text').text('ゴケのアラシ');
                        $('#result-text').css({
                            'font-size': '2rem',    // フォントサイズを大きくする
                            'color': 'red',       // 文字色を緑に変更
                        })
                        break;

                    case 6:
                        $('#result-text').text('ロッポウのアラシ');
                        $('#result-text').css({
                            'font-size': '2rem',    // フォントサイズを大きくする
                            'color': 'red',       // 文字色を緑に変更
                        })
                        break;
                }

            // 123か456かチェック
            } else if(dice.join('') === "123"){
                $('#result-text').text('ヒフミ');
                $('#result-text').css({
                    'font-size': '2rem',    // フォントサイズを大きくする
                    'color': 'blue',       // 文字色を緑に変更
                })
            } else if(dice.join('') === "456"){
                $('#result-text').text('シゴロ');
                $('#result-text').css({
                    'font-size': '2rem',    // フォントサイズを大きくする
                    'color': 'red',       // 文字色を緑に変更
                })

            // シングル
            } else if(dice_1 === dice_2 || dice_2 === dice_3 || dice_1 === dice_3){
                // ペアの目を特定
                let pairedValue = (dice[0] === dice[1]) ? dice[0] : dice[2];
                // ペアでない目
                let nonPairedValue = (dice[0] === dice[1]) ? dice[2] : dice[0];
                
                $('#result-text').text(nonPairedValue + "の目");

            // 目無し
            } else {
                $('#result-text').text("目無し");
            }
            
        })

    })
</script>



<?php get_footer(); ?>