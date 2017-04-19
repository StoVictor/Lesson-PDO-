<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php  ?>
    <?php foreach($this as $key=>$item):?>
    <?php if($key == 'items'):  ?>
    <?php foreach($item as $artcl):  ?>
    <h1><?php echo $artcl->get_data()['title'] ?></h1>
    <p> <?php echo $artcl->get_data()['text'] ?></p>
    <?php endforeach;?>
    <?php endif;?>
    <?php endforeach;?><br>
    <a href="views/add.php">Добавить новость</a> 
</body>
</html>
