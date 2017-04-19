<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>St-News</title>
</head>
<body>
    <form action="../index.php?ctrl=Admin&act=Add" method="post" enctype="multipart/form-data">
       <label for="title" >Название новости</label>
        <input type="text" name="title"><br>
        <lable for="text">Текст новости</lable>
        <input type="text" name="text"><br>
        <input type="submit" value="Отправить">
    </form>
    <form action="../index.php?ctrl=Admin&act=Del" method="post" enctype="multipart/form-data">
        <label for="title" >Название новости</label>
        <input type="text" name="title"><br>
        <input type="submit" value="Удалить">
    </form>
</body>
</html>