<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Home";

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php include(ROOT_PATH . "/includes/head.php"); ?>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/css/hero.css' ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/css/main.css' ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/css/plan.css' ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/css/blog.css' ?>">
    
</head>
<body>
    
    <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>

        <div class="hero">
            <div class="container">
                <div class="box"></div>
                
                <div class="content">
                    <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Register</a>
                    <p>Wealth Development & Management</p>
                    <h2>We build your portfolio and provide Advice that is always in your best interest</h2>
                </div>
            </div>
        </div>

        <!-- TradingView Widget BEGIN -->

        <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
        {
        "symbols": [
            {
            "proName": "FOREXCOM:SPXUSD",
            "title": "S&P 500"
            },
            {
            "proName": "FOREXCOM:NSXUSD",
            "title": "Nasdaq 100"
            },
            {
            "proName": "FX_IDC:EURUSD",
            "title": "EUR/USD"
            },
            {
            "proName": "BITSTAMP:BTCUSD",
            "title": "BTC/USD"
            },
            {
            "proName": "BITSTAMP:ETHUSD",
            "title": "ETH/USD"
            }
        ],
        "colorTheme": "light",
        "isTransparent": false,
        "showSymbolLogo": true,
        "locale": "en"
        }
        </script>
        </div>

        <!-------------- Blog ------------>

        <div class="news">
        <div class="container">
            <?php $news = selectStaz('news', 3 , ['published' => 1]); 
                foreach($news as $new):
                ?>

            <div class="box">
                <img src="<?php echo BASE_URL . '/admin/blog/'. $new['image']; ?>">
                <h2><a href="about/read_blog.php?id=<?php echo $new['id'] ?>"><?php echo $new['title'] ?></a></h2>
                <span style="text-transform: capitalize"><?php echo $new['username'] ?> • <?php echo date('F j, Y.', strtotime($new['created_at'])); ?></span>
            </div>
            
        <?php endforeach; ?>
        </div>
        </div>

        <!-------------- Financial Guides ----------->

        <div class="blog">
            <h1>Recent Articles</h1>
            <div class="container">
            <?php $articles = selectStaz('posts', 3, ['topic_id' =>1 , 'published' => 1]); 
                foreach($articles as $article):

                $user = selectOne('users', ['id' => $article['user_id']]);
            ?>
                <div class="box">
                    <div class="content">
                        <h2><a href="about/single.php?id=<?php echo $article['id'] ?>"> <?php echo $article['title'] ?> </a></h2>

                        <p><?php echo html_entity_decode(substr($article['body'], 0, 100). '...'); ?></p>

                        <span style="text-transform: capitalize"><?php echo $user['username'] ?> • <?php echo date('F j, Y.', strtotime($article['created_at'])); ?></span>
                    </div>

                    <img src="<?php echo BASE_URL . '/admin/guide/'. $article['image']; ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-------------- Plans ----------->

        <?php include(ROOT_PATH . "/includes/plans.php"); ?>

        <!-------------- Horinz widget ----------->

        <div style="height:40px; 
                    background-color: #FFFFFF; overflow:hidden; 
                    box-sizing: border-box;  
                    border-radius: 4px; 
                    text-align: right; 
                    line-height:14px; 
                    width: 100%;">
            <div style="height:40px; 
                        padding:0px; 
                        margin:0px; 
                        width: 100%;">
                <iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=light&pref_coin_id=1505&invert_hover=" width="100%" height="38px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
            </div>
        </div>

        <!------------- bitcoin graph ----------->

        <div class="bitcoin-cover">
            <div class="bitcoin-graph">
                <iframe class="bitcoin-iframe" src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=859&pref_coin_id=1505" 
                        width="100%" 
                        height="536px" 
                        scrolling="auto" 
                        marginwidth="0" 
                        marginheight="0" 
                        frameborder="0" 
                        border="0">
                </iframe>
            </div>
            
        </div>

    </main>
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>
</html>