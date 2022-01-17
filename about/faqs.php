<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "FAQ's";

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
        <div class="terms">
            <h1>FAQ's</h1>
            <div class="container">
                <div class="box">
                    
                    <h3>Frequently Asked Questions</h3>
                    <p>Many investors come to us with questions about our firm, including how we work and how we're different from other investment advisers. For your convenience, we have developed a list of the most common questions our prospective clients ask during their search for a money manager.</p>
                    
                    <ul id="faqs">
                        <li>
                            <a>What is <?php echo $companyRealName;  ?>?</a>
                            
                            <span>
                            <?php echo $companyRealName;  ?> is registered with the SEC as an investment adviser providing asset management to high net worth individuals and institutions worldwide. We uphold the industry’s highest standard of care and help investors reach their long-term goals through active money management. When you hire <?php echo $companyRealName;  ?> to help manage your money, you can expect a personalized, rewarding investment experience and world-class service.
                            </span>
                        </li>
                        
                        
                        <li>
                            <a>What makes <?php echo $companyRealName;  ?> Different?</a>
                            
                            <span>
                                Our approach to asset management starts with you. We help our clients reach their investment goals through tailored portfolios built with a dynamic, global approach to asset and style allocation. <br><br>

                                Other money managers may offer cookie-cutter portfolios or strategies based on a single style of investing. That means you’re getting the same advice as everyone else, regardless of your situation. While other managers may consider just your age or risk tolerance, we learn about your goals, financial needs, health, age, family circumstances and more. <br><br>

                                We approach communications differently, too. You’ll hear from us regularly not just when markets are doing well. While other money managers may avoid your calls when markets are turbulent, we’ll be in touch, letting you know what’s happening with your portfolio.
                            </span>
                        </li>
                        
                        <li>
                            <a>What services does <?php echo $companyRealName;  ?> provide?</a>
                            
                            <span>
                                Through tailored portfolio management, we help high net worth individuals and institutions around the world reach their long-term financial goals. <br> <br>

                                As a client, you will benefit from a comprehensive, personalized financial plan helping you confidently save, spend and invest. Communication and service are tailored to your needs. In addition, we can help with financial planning, budgeting, cash-flow analysis, estate and tax planning, and strategies for maximizing Social Security benefits.  <br> <br>

                                Beyond investing and financial planning, we want to help make you a more comfortable, disciplined and informed investor. That’s why you’ll have a dedicated Investment Counselor to help you understand what’s going on in your account—and why. Your Investment Counselor stays in touch through up and down markets and is also your gateway to a wealth of exclusive content and informational resources.  <br> <br>
                            </span>
                        </li>
                        
                        <li>
                            <a>What is our Fee structure?</a> 
                            
                            <span>
                                Unlike some money managers, we don’t earn commissions on trades. Instead, we use a tiered fee structure that’s based on your portfolio’s size. This means we’re always focused on your best interests, and when you do better we do better.
                            </span>
                        </li>
                        
                        <li>
                            <a>Who makes the firm's investment decisions?</a>
                            
                            <span>
                                Our Investment Policy Committee (IPC) makes all strategic investment decisions for our clients’ portfolios. The IPC has over 9 years of combined investing experience. They are supported by our large research department, which includes capital markets, macroeconomics, securities and quantitative analysts.
                            </span>
                        </li>
                        
                        <li>
                            <a>What is our approach to investing?</a>
                            
                            <span>
                                We take an active, disciplined and global approach to managing money. We learn about your unique goals and needs so we can create a personalized portfolio for you. Your investment objectives and our market outlook help determine your asset allocation—your mix of stocks, bonds, cash or other securities.<br> <br>

                                As market conditions or your needs change, we may adjust your asset allocation to keep your portfolio positioned to meet your long-term objectives. We meticulously analyze markets, identify attractive investment categories and then choose individual stocks, bonds or other securities for your portfolio. We search the world for investing opportunities because a diversified portfolio can help you achieve your goals sooner.<br> <br>

                                Our personalized, disciplined and global approach to managing money has helped our more than 69,000 clients worldwide plan for their financial future with confidence.*<br> <br>
                            </span>
                        </li>
                        
                        <li>
                            <a>How do i become a client?</a>
                            
                            <span>
                                You can become a client by registering an account. We’d be happy to communicate with you and discuss your goals. We will guide you through every step of becoming a new client. Our hands-on approach respects your time, keeps you informed and reduces the amount of paperwork you need to fill out.
                            </span>
                        </li>
                        
                        <li>
                            <a>How do we protect our client's account?</a>
                            
                            <span>
                                We take your security and privacy seriously and have implemented numerous layers of security measures for you. <br> <br>

                                At the forefront is your Investment Counselor, your primary point of contact who knows you and your personal situation. If your Investment Counselor receives an abnormal request, he or she will put it on hold until he or she can obtain confirmation from you. In addition, employees are supported by comprehensive data management systems and security policies to protect client data from external and internal threats. <br> <br>

                                When you invest with us, we manage your investments, but your assets are held by a third-party custodian. Using a third-party custodian helps in reducing conflicts of interest and promotes transparency. <br> <br>

                                Lastly, rest assured we never share or sell your name for marketing purposes. <br> <br>

                            </span>
                        </li>
                        
                        <li>
                            <a>Who owns <?php echo $companyRealName;  ?>?</a>
                            
                            <span>
                                We’re privately held, which helps us serve our clients and act in their best interests without obligation to private equity backers or other investors.
                            </span>
                        </li>
                        
                        <li>
                            <a>How many Employees do we have?</a>
                            
                            <span>
                                We and our affiliates have over 3,500 employees across 14 countries and six continents. Our exceptional workforce is highly specialized with diverse skills and backgrounds, but we’re all relentlessly focused on serving our clients. We’re nimble, we always put our clients’ best interests first, and we have carefully built this company so it can grow, continue to put clients first and deliver excellent investments results.
                            </span>
                        </li>
                        
                        <li>
                            <a>My Question wasn't answered. How can i ask it?</a>
                            
                            <span>
                                Please contact us via our online livechat. We’re happy to answer questions and look forward to helping you.
                            </span>
                        </li>
                        
                    </ul>
                    
                </div>
                
            </div>
        </div>
        
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>