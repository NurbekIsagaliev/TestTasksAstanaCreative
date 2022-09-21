<?php
//использовал XAMPP; Ubuntu 20.04LTS
/* Имеется многомерный массив, необходимо его отсортировать. 
Для первого уровня достаточно отсортировать по полю age, для продвинутого пользователя
 - по двум полям, при этом должна быть возможность сортировать в обратном порядке, 
 то есть для первого уровня: ORDER BY age ASC, и для высокого уровня: 
 ORDER BY age ASC,gender DESC. Сам массив: [code]$array = 
 array( 'a1' => array('id'=>'1', 'age'=>'16', 'gender'=>'m', 'login'=>'Вася'), 
 'a2' => array('id'=>'2', 'age'=>'18', 'gender'=>'m', 'login'=>'Петя'), 
 'a3' => array('id'=>'3', 'age'=>'20', 'gender'=>'g', 'login'=>'Катя'), 
 'a4' => array('id'=>'4', 'age'=>'20', 'gender'=>'m', 'login'=>'Стас'), 
 'a5' => array('id'=>'5', 'age'=>'12', 'gender'=>'g', 'login'=>'Маша'), 
 'a6' => array('id'=>'6', 'age'=>'44', 'gender'=>'g', 'login'=>'Галя'), 
 'a7' => array('id'=>'7', 'age'=>'45', 'gender'=>'m', 'login'=>'Макс'), 
 'a8' => array('id'=>'8', 'age'=>'20', 'gender'=>'m', 'login'=>'Илья'),
  'a9' => array('id'=>'9', 'age'=>'20', 'gender'=>'g', 'login'=>'Даша'), );[/code] 
  Верный порядок: Для первого уровня: Маша, Вася, Петя, (Катя,Стас,Илья,Даша), Галя, 
  Макс. Для среднего уровня: Маша, Вася, Петя, (Стас,Илья),(Катя,Даша),Галя,Макс. 
  Обратите внимание, что в скобки взял те имена, которые местами могут не совпадать 
  то той причине, что поля для сортировки в любом случае у них одинаковые..*/
$user = 'root';
$pass = '';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

    $sql = 'SELECT login FROM test_table  ORDER BY age ASC,gender DESC';
    foreach ($dbh->query($sql) as $row) {
        print $row['login'] . "<br>";
    }
} catch (\Throwable $th) {
    print "Error!: " . $e->getMessage() . "<br>";
    die();
}
