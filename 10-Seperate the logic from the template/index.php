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

  function filterByAuthor($books,$author){
    $filteredBooks = [];
  
  foreach($books as $book){
    if ($book['author']===$author)
      $filteredBooks[]=$book;          
    }   

  return $filteredBooks;
}

require 'index.view.php';