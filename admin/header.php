<header>
    <div  class="clearfix">
            <div class="logo"><a href="../index.php"><img src="../img/logo.jpg"></a></div>

            <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <label> Hello, <?php echo $_SESSION['username']; ?></label>

            <div class="profile"><a href="../app/profile.php"><img src="../app/img/male.png"></a></div>
        </div>
        
        <div class="totald">Pending Deposits
            <span> $<?php echo $pendingDeposits; ?> </span>
        </div>
        
        <div class="totale">Pending Withdrawals
            <span>$<?php echo $pendingWithdrawals; ?> </span>
        </div>
        
    </header>
    
    <aside>
        <ul>
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="shares.php"><i class="fas fa-chart-line"></i> Shares</a></li>
            <li><a href="history.php"><i class="fa fa-calendar"></i> History</a></li>
            <li><a href="mailer.php"><i class="fa fa-envelope"></i> Mailer</a></li>
            <li><a href="interest.php"><i class="fa fa-money"></i> Interests</a></li>
            <li><a href="postadd.php"><i class="fa fa-blog"></i> Add Post</a></li>
            <li><a href="news.php"><i class="fa fa-money"></i> News</a></li>
            <li><a href="testimonials.php"><i class="fa fa-user-plus"></i> Testimonials</a></li>
            <li><a href="<?php echo BASE_URL. '/app/index.php' ?>?logout=1"><i class="fa fa-sign-out"></i> Sign out</a></li>
            <li><a href="<?php echo BASE_URL. '/app/index.php' ?>"><i class="fa fa-user"></i> App</a></li>
        </ul>

    </aside>