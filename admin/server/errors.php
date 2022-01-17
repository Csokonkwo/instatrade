<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>


    <?php if(count($errors) > 0);?>
    <div class="msg error">

    <?php foreach($errors as $error){ ?>
        <li class=".li-height"><?php echo $error; }?></li>

    </div>
    </body>

    
</html>

