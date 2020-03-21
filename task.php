<?php
$a = 5;
function getValue1($a) {
    return $a++;
}
function getValue2($a) {
    return ++$a;
}

echo getValue1(getValue2(getValue2(getValue1(getValue1($a)))));

echo "<br>";
echo "<br>";
echo "<br>";
var_dump(in_array('text', [0,1]));


$basket = [
    [
        'position' => 'книга по php',
        'quantity' => 1,
    ],
    [
        'position' => 'Мышь беспроводная',
        'quantity' => 12,
    ]
];

function countBasket($array) {
    if (count($array) <= 10) {
        $quantity = 0;
        foreach ($array as $item) {
            foreach ($item as $key => $value) {
                if ($key == 'quantity') {
                    $quantity += $value;
                }
            }
        }
        return $quantity;
    } else {
        echo "<p>Number of positions in the basket is greater than 10<br>Количество позиций в корзине больше 10</p>";
    }
}

echo countBasket($basket);

$data = [
    ['author' => 'Александр Сергеевич Пушкин',
    'email' => 'pushkin@gmail.com',
    'bdate' => '10.02.1837',
    'books' =>
        [['bookname' => 'Евгений Онегин',
        'published' => '1832'],
        ['bookname' => 'Борис Годунов',
        'published' => '1831']]],

    ['author' => 'Лев Толстой',
    'email' => 'tolstoy@gmail.com',
    'bdate' => '09.09.1828',
    'books' =>
        [['bookname' => 'Война и мир',
        'published' => '1865'],
        ['bookname' => 'Анна Каренина',
        'published' => '1877']]],

    ['author' => 'Фёдор Достоевский',
    'email' => 'dostoevsky@gmail.com',
    'bdate' => '11.11.1821',
    'books' =>
        [['bookname' => 'Идиот',
        'published' => '1869']]]
    ];

echo "===Книги===<br>";
foreach ($data as $author) {
    foreach ($author['books'] as $book) {
        echo $book['bookname'] . ' - ' . $author['author'] . ' - ' . $book['published'] . "<br>";
    }
}
echo "<br>";
echo "===Авторы===<br>";
foreach ($data as $author) {
    echo $author['author'] . ' - ' . $author['email'] . ' - ' . $author['bdate'] . "<br>";
}




function task17($n) {
    $sum = 0;
    for ($num=0;$num<=$n;$num++) {
        if (($num % 3) == 0 && ($num % 5) == 0) {
            --$sum;
        } elseif (($num % 5) == 0) {
            $sum += $num;
        } elseif (($num % 3) == 0) {
            echo $num . "<br>";
        }
    }
    return $sum;
}


