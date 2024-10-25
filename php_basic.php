<?php
//ende jeder Linie in PHP muss ; sein
//definition Variables:
//$ ist für variable definition 
$my_string = "hello"; //type is String
$my_integer = 34; //type is int
$my_float = 34.66; // type is float
$my_bool = true; // boolean type accept true oder false;
$my_array = []; 
$my_char = 'c';
//type string ist ein Array von charechter type!!




//Operators in PHP : 

//Add operator   + 
$my_number = 3; 
$my_number = 3+5 ; // $my_number ist 8

$my_age = 18; 
$tenYearsFromNow = 10;

$my_age_in_ten_years = $my_age + $tenYearsFromNow ; //$my_age_in_ten_years = 28
//echo $my_age_in_ten_years;


// minus oprator - 
$my_number = 23 -10; 
//echo $my_number;//my_number ist jestzt 13;


//durch oprator  /
$my_number = 15;
//echo $my_number/3;  //result ist 5

//Multiple Oprator  * 
//echo $my_number * 3;  // 15 * 3 = 45

//Oprator gewicht 

$my_number = 5+1+3/2;

$my_number = 1-6/2;
//echo $my_number;//-2

//hilfe für operator Wichtigkeit ( )

$my_number =  (1+2)+(6/3);//5
//echo $my_number;

echo $my_number ; 
echo "<hr>";
if($my_number !== 5 ){
    echo "it is smaller";
}
else{
    echo "it is bigger";
}

//Comperssion Operators
// == ist gleich
// === ist 100% geleich!!!!
// !  reverse   NOT
// < Kleiner
// > bigger
// >=   =<
// <> not
//for more info https://www.w3schools.com/php/php_operators.asp
echo "<hr>";
//for loop
for($myint = 5 ; $myint <= 10 ; $myint++)
{
    echo $myint; 
    echo "<br>";
}

$person = [];
$person["first_name"] = "Roy";
$person["last_name"] = "Faust";
$person["age"] = 35;
foreach($person as $item)
{
    if($item == "Faust")
    {
        echo "Founded!";
    }

}
$counter = 0;
while(1)
{
    echo "hi <br>";
    $counter++;
    if($counter > 200)
    {
        break;
    }
}


