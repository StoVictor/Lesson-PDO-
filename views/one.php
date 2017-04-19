<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php foreach($this as $key=>$item): ?>
   <?php if($key == 'item'): ?>
    <h1><?php echo $item->get_data()['title'] ?></h1>
    <p> <?php echo $item->get_data()['text'] ?></p>
    <?php break; ?>
    <?php endif; ?>
    <?php endforeach; ?> 
    <br>
    <a href="views/add.php">Добавить новость</a>     
</body>
</html>
