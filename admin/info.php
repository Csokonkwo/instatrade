<?php 

include('../path.php');
include('server.php');


 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
    <link rel="stylesheet" href="css/form.css">
    
</head>
<body>
    
    <?php include("header.php"); ?>
    
    <main>

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>

        <div class="form news">
            <form action="info.php" method="post" enctype="multipart/form-data">
                <h3>Info</h3>

                <?Php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?>.</li>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                
                <input name="investors_online" placeholder="Enter Investors_online">
                <input name="total_investors" placeholder="Total_investors">
                <input name="total_withdrawals" placeholder="Total_withdrawals">
                <input name="total_deposits" placeholder="Total_Deposits">
                
                <button type="submit" name="info_submit">Submit</button>
            
            </form>
        </div>

        
        <div class="table">
            <h3>All Info</h3>
            <?php $infos = selectAll('info'); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>Investors_online</th>
                        <th>Total_investors</th>
                        <th>Total_withdrawals</th>
                        <th>Total_Deposits</th>
                        
                    </thead>
                    
                    <tbody>
                    <?php foreach ($infos as $key => $info): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $info['investors_online'] ?></td>
                            <td><?php echo $info['total_investors'] ?></td>
                            <td><?php echo $info['total_withdrawals'] ?></td>
                            <td><?php echo $info['total_deposits'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

        </div>
    </main>
    
    <?php include("footer.php"); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="script.js"></script>
    
</body>
</html>