<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nd9</title>
</head>
<style>
body{
<?php if($_SERVER['REQUEST_METHOD'] === 'POST'):?>
    background-color:white;
    color: black;
<?php else:?>
        background-color:black;
        color: white;
<?php endif?>
}
label{
        color:pink;
    }
</style>
<body>
    <?php if($_SERVER['REQUEST_METHOD'] === 'GET'):?>
        <form action="" method="post">
            <?php $countAll = rand(3, 10)?>
            <?php foreach(range('A', 'K') as $key => $checkbox):?>
            <?php if($key == $countAll) break; ?>
            <input type="checkbox" name="box[]">
            <!-- <input type="checkbox" name="box[<?=$checkbox?>]"> jei reik zinoti kuris nuspaustas -->
            <label><?=$checkbox?></label>
            <?php endforeach?>
            <input type="hidden" name="all" value="<?=$countAll?>">
            <button type="submit" >Go</button>
        </form>
    <?php endif?>

    <?php if($_SERVER['REQUEST_METHOD'] === 'POST'):?>
    VISO: <?= count($_POST['box'] ?? [])?> is <?= $_POST['all']?> 
    <?php endif?>

</body>
</html>
