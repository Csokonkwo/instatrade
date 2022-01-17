<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Services";

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
      
    <div class="sustain">
        <h1>Our Services</h1>
        <div class="container">
            <div class="left">
            </div>
            <div class="right">
                <h1>What We Offer</h1>
                <p>Your financial future is personal, but that doesn’t mean you need to go it alone. We help individuals and families assess their unique, personal situations, plan for the long term and invest to meet their goals. From financial planning to annuity assessment, we always put our clients’ needs first. Our steady counsel helps clients stay on track, even when markets are choppy or life is unpredictable.</p>
            </div>

        </div>
    </div>
    
    <div class="terms">
            <h1>Services We Provide</h1>
            <div class="container">
                <div class="box">
                    
                    <h3>Personalized Portfolio Management</h3>
                    <p>You deserve a tailored portfolio, not a cookie cutter strategy. We take the time to learn about your unique goals and needs. Then we create a personalized plan so you can invest with confidence and meet your long-term objectives.</p>
                    
                    <h3>Financial Planning</h3>
                    <p>A good financial plan is the blueprint that helps you make decisions holistically and confidently. We can help our clients with budgeting and cash flow analysis, estate and tax planning, and even strategies for maximizing Social Security.</p>
                    
                    <h3>Annuity Assessment</h3>
                    <p>We’ve worked with many clients who were sold annuities that did not meet their needs and helped them develop a new financial plan that does. We can help you evaluate an annuity, understand the fine print and weigh the pros and cons.</p>
                    
                </div>
                
            </div>
        
        <h1>How we make it happen</h1>
            <div class="container">
                <div class="box">
                    
                    <h3>Institutional Expertise</h3>
                    <p>We manage money for some of the world’s leading companies, pension funds and endowments. When you choose <?php echo $companyRealName;  ?>, you’re getting the same investment team and process trusted by large institutions.</p>
                    
                    <h3>Excellent Service </h3>
                    <p>We’re relentlessly focused on our clients. Their long-term success is our main goal. As a client you’ll hear from us regularly. Not because we have something to sell, but to keep you informed about how we’re managing your money and to make sure we understand your needs. Our Investment Counselors will stand with you through thick and thin and keep you connected to our firm’s many resources.</p>
                    
                    <h3>Active Portfolio Management</h3>
                    <p>We take an active, disciplined and global approach to managing money. We start by getting to know the real you through your goals, needs, lifestyle, family, health and more. Then we create a personalized portfolio for you. We’re always focused on your long-term goals. As market conditions or your needs change, so does your portfolio.</p>
                    
                    <h3>Experienced Management Team</h3>
                    <p>Our 5-person Investment Policy Committee, who makes strategic portfolio decisions, has over 40 years of combined industry experience. And our executive team has been working together for over three decades. This stability and experience across multiple market cycles help us deliver results for our clients.</p>
                    
                </div>
                
            </div>
        
        <h1>Preparing for Retirement</h1>
            <div class="container">
                <div class="box">
                    
                    <h3>Retirement Planning</h3>
                    <p>Whether you’re approaching retirement and don’t know where to start or you’re currently retired and want to re-evaluate your plan, we can help you ask the right questions to help you reach your goals.</p>
                    
                    <h3>Generating Retirement Income</h3>
                    <p>You may need to take income from your investments after you stop receiving a regular paycheck. We can help you figure out how without depleting your funds.</p>
                    
                    <h3>Understanding Your Time Horizon</h3>
                    <p>This sounds abstract, but it comes down to a simple and important question: How long will you need your money to work for you? The answer likely stretches well beyond when you plan to retire. We can help you figure out the right timeline for your strategy.</p>
                    
                    <h3>Evaluating Your Financial Plan</h3>
                    <p>How does your financial plan stack up? We can help you evaluate if you’re on track to meet your goals and help with budgeting for the future you want.</p>
                    
                </div>
                
            </div>
        </div>
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>