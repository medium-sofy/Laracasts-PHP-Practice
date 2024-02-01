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
        [
            'name' => 'Project Hail Mary',
            'author' => 'Andy Wier',
            'releaseYear' => 2021,
            'purchaseUrl' => 'example.com'
        ],

        [
            'name' => 'The Martian',
            'author' => 'Andy Wier',
            'releaseYear' => 2011,
            'purchaseUrl' => 'example.com'
        ],
        [
            'name' => 'Can\'t Hurt me',
            'author' => 'David Goggins',
            'releaseYear' => 2009,
            'purchaseUrl' => 'example.com'
        ]
    ];

        function filter($items,$fn){
        $filteredItems = [];
        
        foreach($items as $item){
          if ($fn($item)){
            $filteredItems[]=$item;          
        }   
      }
        return $filteredItems;
      }    

     
                                                        
    ?>
    <ul>
      <?php foreach (filter($books, function ($book){
        return $book['author'] === 'Andy Wier'; 
              }) as $book):?>
            
                <li>
                    <a href="<?= $book['purchaseUrl']?>">
                        <?=$book['name']?> (<?=$book['releaseYear']?>)
                    </a>
                </li>
                
        <?php endforeach?>

    </ul>
</body>
</html>

