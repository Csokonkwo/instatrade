<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Security Tips";

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
      
        <div class="sustain security">
            <h1>Security Tips</h1>
            <div class="container">
                <div class="left">
                </div>
                <div class="right">
                    <p>Keeping your personal information secure and confidential is a priority. We take appropriate measures to protect the security of your personal information.</p>
                </div>

            </div>
        </div>
    
        <div class="terms">
            <h1>How we secure your Account</h1>
            <div class="container">
                <div class="box">
                    <p>The security of our service and keeping your money safe is a primary concern for us. Online Banking is a safe way to manage your money. We have applied some security measures to ensure that your online account information are protected. Some of the measures we have applied include the following.</p>
                    
                    <h3>Features</h3>
                    <ul>
                        <li>Online Account services hosted on an encrypted server.</li>
                        <li>Online Account logs you out if you haven’t used the service for specified period of time. This provides security if you leave your PC and forget to log-out.</li>
                    </ul>

                    <h3>Benefits</h3>
                    <ul>
                        <li>Encryption converts your information into an encoded format before it is sent over the Internet.</li>
                        <li>Online account logs to stop fraudsters from repeatedly trying to gain access to your account. </li>
                        <li>If your access is disabled, please click on the forgotten account details link on the sign in page for information on how you can get back online.</li>
                    </ul>
                </div>
                
            </div>

            <h1>Internet Security Tips</h1>
            <div class="container">
                <div class="box">
                    <p>There are many steps that you can take to ensure that your computer does not become prey to an online fraudster.</p>  
                   
                    <ul>
                        <li>Update your system and web browser.
                            <br> 
                            Manufacturers regularly release security patches when weaknesses are discovered in their systems and browsers. Check with your software provider for these updates on a regular basis.
                        </li>
                        <li>Use a personal firewall and anti-virus software.
                            <br> 
                            This can prevent unauthorised access and viruses being downloaded onto your PC when you’re on the Internet.
                        </li>
                        <li>Check the padlock symbol and site certificate.
                            <br> 
                            Double-click the padlock symbol at the bottom of your browser when you log-in to our website to ensure the site certificate belongs to us. This will ensure you’re not being duped into entering your details on a ‘fake’ site.
                        </li>

                        <li>Keep your personal details secret.
                            <br> 
                            Never write down or reveal your password.
                        </li>
                        <li>Check your accounts regularly</li>

                        <li>Always log-out after using Online Banking
                            <br> 
                            Just select the log-out button and never leave your PC unattended while you’re logged in to the service. <br> 
                            We automatically instruct most browsers not to store your personal information in the cache (memory) as this may be affected by the type of browser you use. A always clear the cache yourself.
                        </li>
                        
                    </ul>
                </div>
                
            </div>

            <h1>Password Security</h1>
            <div class="container">
                <div class="box">
                    <p>Customers gain access to their accounts online by supplying their username and password to their account for verification and authentication. <br> Passwords are the keys to your personal and account information. Therefore care must be exercised in constructing passwords. The following are some easy steps that you can take to protect yourself from having your personal information compromised.</p>
                    
                    <ul> Do's <br> 
                        <li>Do use at least eight (8) characters</li>
                        <li>Do use both letters and numbers</li>
                        <li>Do use special characters if possible (e.g !,@#&$)</li>
                        <li>Do use UPPER and lower case</li>
                        <li>Do use combined or misspelled words</li>
                        <li>Do guard your fingers when typing</li>
                        <li>Do change password periodically</li>
                    </ul>

                    <ul>Don'ts
                        <li>Do not use names</li>
                        <li>Do not use personal information</li>
                        <li>Do not use dictionary words</li>
                        <li>Do not write it on a sticky note and paste it on your monitor</li>
                        <li>Do not keep it in a drawer or write it in your dairy</li>
                        <li>Do not use the same password for several applications</li>
                        <li>Do not recycle old passwords</li>
                        <li>Do not send through mail or SMS</li>
                        <li>Do not disclose it to someone else</li>
                    </ul>
                    <p>If you have a feeling that your login details have been compromised, kindly contact us via our live chat support.</p>
                </div>
                
            </div>



        </div>
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>