<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Overview";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
      
     <div class="sustain about">
            <h1><?php echo $companyRealName;  ?></h1>
            <div class="container">
                <div class="left">
                </div>
                <div class="right">
                    <h1>About us</h1>
                    <p>If you're looking for an investment firm to support you during these volatile times, provide disciplined investing strategies and offer straightforward market perspective, then you have come to the right place. </p>
                </div>
                
            </div>
        </div>
    
        <div class="terms">
            <h1>Overview</h1>
            <div class="container">
                <div class="box">
                    <h3>How We are Different</h3>
                    <p>For over 6 years, <?php echo $companyRealName;  ?> has worked in our clients’ best interests by thinking and acting independently rather than following outdated industry practices. <br> Our personalized approach, our total commitment to serving our clients and our investing experience make us unique in our industry. That’s why <?php echo $companyRealName;  ?> currently manages $12 billion* for investors worldwide and helps over 20,000 clients* meet their financial goals.</p>
                    
                    <h3>Our Features</h3>
                    <p>Clearly Different Money Management</p>
                    
                    <ul>
                        <li>Advice That Is Always in Your Best Interest <br> <br> As a fiduciary, we always put your interests first and we’ve designed our entire business to keep it this way. Unlike some money managers, we have no incentives to sell you commission-based financial products or place trades in your account when it’s not best for you. Our simple fee structure aligns your interests with our business goals. Simply put, when you do better we do better.
                        </li> <br>
                        
                        <li>A Portfolio Tailored to Your Needs <br> <br>
                            We respect how hard you worked to build your nest egg, and before we recommend anything, we get to know you. We ask questions about your goals and needs, your expenses, your health, your family commitments and more to better understand what you need your money to accomplish. This enables us to recommend a personalized portfolio designed to meet your needs and to help you enjoy the retirement you’ve earned. 
                        </li> <br>
                        
                        <li>Communication and Counsel to Help You Stay on Track <br> <br>You will receive a personal point of contact-your Investment Counselor committed to understanding you on a personal level and keeping your financial plan on track. Your Investment Counselor will be there for you, whether you want to know how your portfolio is doing and why, or whether you want guidance when the ups and downs of the stock market rattle your nerves. Your Investment Counselor will keep in touch in all market conditions and won’t be afraid to give you an occasional dose of tough love to help you stay disciplined to your long-term plan.</li> <br>
                        
                        <li>Disciplined and Active Portfolio Management<br> <br>We’re more than just stock pickers. We believe active portfolio management centered on your long-term goals is the best way to discover opportunities and achieve long-term results. Our five-person Investment Policy Committee, supported by a large in-house research staff, analyzes global investing opportunities-narrowing down from country and sector to find securities they think will do well moving forward. This disciplined approach allows us to interpret information differently and find global investing opportunities other money managers may overlook.</li> <br>
                        
                        <li>Transparency<br> <br>You deserve to know what we’re doing with your money. That’s why we’re transparent about the investing decisions we make for your portfolio. We proactively discuss current events and openly share our forecast with you through your Investment Counselor, live events, quarterly reviews, regular publications like MarketMinder and more. Whether you’re someone who wants to dig in to the details of your portfolio or you want to be more hands-off, we provide a variety of resources to get you the information you need, when you need it all to make sure you’re comfortable with our investing approach.</li>
                    
                    </ul>
                    
                    <h3>Our Culture</h3>
                    <p>When you work with dedicated professionals who care about your well-being, it can give you confidence and peace of mind. Our culture supports our commitment to provide unparalleled service that puts clients’ interests first.
                    </p>
                    <ul>
                        <li>Putting Clients First<br> <br>We do things differently from other investment firms-not just to be different, but because it matters for our clients. We designed our entire business to minimize conflicts of interest. We have a strong division of labor between our sales and service roles, allowing employees in each role to focus on their strengths. At <?php echo $companyRealName;  ?>, our client service focuses entirely on providing superior service, not additional sales. <br>

                        This clear focus on servicing our clients is what makes <?php echo $companyRealName;  ?> a better place to work, too.</li> <br>
                        <li>Diversity and Inclusion<br> <br>Everyone is welcome at <?php echo $companyRealName;  ?>. We value diverse perspectives and encourage innovation and forward thinking. <br>We seek those who aren’t afraid to try something different and are open to considering new processes and approaches. That’s why we hire people from different backgrounds, with different points of view, and why 60% of our senior executive vice presidents are women and report directly to the CEO.</li> <br>
                        
                        <li>Opportunity<br> <br>Our employees drive our firm’s success, and we support their development by providing opportunities to succeed. We hire and promote employees based on merit, potential and “will-do” attitude. We empower employees to achieve excellence as they grow a lifelong <?php echo $companyRealName;  ?> career. While everyone forges their own unique path at <?php echo $companyRealName;  ?>, we are all on a journey together a journey to better the investment universe.</li> <br>
                        
                        <li>Support<br> <br>We support each other. In our open office environment, everyone from entry-level employees to VPs shares the same space and is treated as an equal. Teams are motivated to collaborate and interact without physical or organizational barriers. <br> <br>

                        Our customized development programs and award-winning training help employees excel in their current roles, while gaining new skills to prepare for their next one. To support employees’ health, wellness and family life, we offer a robust benefits package and on-site services to help make employees’ busy lives a little easier. At <?php echo $companyRealName;  ?>, we have each other's backs.</li> <br>
                    </ul>
                    
                    <h3>Our culture drives our success</h3>
                    <p>By creating a positive, productive and rewarding work environment, we are able to maximize the quality of service we deliver to each and every client. In doing so, we are proud to be recognized as a top place to work.
                    </p>
                    
                    
                </div>
                
            </div>
        </div>
        
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>