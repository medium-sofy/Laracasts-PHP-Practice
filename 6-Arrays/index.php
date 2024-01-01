<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fav Books</title>
</head>
<body>
    

    <?php 
    $books = [
        "Hail Mary",
        "Atomic Habits",
        "Can't Hurt Me"
    ];
    ?>
    <ul>
        <?php foreach($books as $book):?>
            <li style="color:red"><?= $book?></li>
         <?php endforeach; ?>
    </ul>
</body>
</html>