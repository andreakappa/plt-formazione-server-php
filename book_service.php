<?php

ini_set("soap.wsdl_cache_enabled", "0");

class Book
{
    public $name;
    public $year;
}


function bookYear($book)
{
    // list of the books
    $_books = [
        ['name' => 'test 1', 'year' => 2011],
        ['name' => 'test 2', 'year' => 2012],
        ['name' => 'test 3', 'year' => 2013],
    ];
    // search book by name
    foreach ($_books as $bk)
        if ($bk['name'] == $book->name)
            return $bk['year'];

    return 0;
}


$server = new SoapServer("books.wsdl", [
    'classmap' => [
        'book' => 'Book',
    ]
]);


$server->addFunction('bookYear');
$server->handle();
