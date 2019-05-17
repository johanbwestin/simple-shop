<?php 
require 'Employee.php';
require 'Developer.php';


$developer = new Developer('Johan', 'Westin', 25, 'JavaScript');

echo '<b>Anställd</b> <br>';
echo 'Förnamn: ' . $developer->getFirstName() . '<br>Efternamn: ' . $developer->getFirstName() . '<br>';
echo 'Ålder: ' . $developer->getAge() . '<br>Programspråk: ' . $developer->getLang();
