<?php 

    // single line comments

    /* 
    multiple line
    comments
    */

    //variables and datatypes

    $s3_;
    $x;
    $_y='';         //null
    
    $x = 'Akash';   //string
    $y = '2';       //int
    $z = 9007199254740991;         //int
echo 9007199254740991 * 9007199254740991 * 9007199254740991;
    $a = false;     //boolean
    $b = 'true';   

    $arr = ['sfdsfd',23432,true,false];     //arrays - index value
    $arr2 = ['name'=>'Akash Soni','age'=>24,'location'=>'Bangalore','Graduate'=>true];    //array  - key value pair


    //output 
    echo $arr2['name'], $arr2['name'], $arr2['name'], $arr2['name'];
    echo '<br>';
    $x = print($arr[0].$arr2['name'].$arr2['name']);

    
    foreach($arr as $value) {
        echo $value;
    }

    //branching statements - if, if...else, else if, switch

    $age=21;
    if($age>62) {
        echo "Senior citizen";
        if($retired==true) {
        echo "Eligible for pension";
        }
        else {

        }
    }
    else if($age=='21') {
    echo "equal";
    }
    else if($age>=13) {
    echo "Teenager";
    }
    else {
        echo "A child";
    }


$grade = 'D';
switch($grade) {
    case 'A+':
        echo "95-100";
        break;
    case 'A':
        echo '90-94';
        break;
    case 'B+':
        echo "80-89";
        break;
    case 'B':
        echo "70-79";
        break;
    case 'C':
        echo "60-69";
        break;
    case 'D':
        echo "50-59";
        break;
    default:
        echo "Invalid grade";
}

//looping statements - while, for, do...while

$i = 0;
while($i<=50) {
    $i++;
    if ($i == 30)
        continue;
    echo $i,',';
}

for($i=100; $i<=50; $i++) {
    if($i%2==0) {
        echo $i,',';
    }
}

$i = 100;
do {
    if ($i % 2 == 0) {
        echo $i, ',';
    }
    $i=$i+1;
    $i += 1;

}
while ($i <= 50);


//variable scopes 

$outside = 10;   //global scope

function myfunc($param) {   //parameter scope
    $local = 4000;            //local scope
    static $s = 3000;         //static local scope
    echo ++$local;
    echo ++$s;
}
echo $param;
echo $local;
myfunc(20);
myfunc(20);
myfunc(20);
myfunc(20);
myfunc(20);

//loop control - break, continue

/*operators

    +  -  *  /  %  ++  --       //arithmetic operator

    >  <  >=  <=  ==  ===  !=   //comparison operators

    &&   ||   !                 //logical operators
    
    =  +=  -=  *=  /=  %=       //assignment operators
*/

$passcrypt = password_hash($password, PASSWORD_BCRYPT);
password_verify($password, $passcrypt);

function add($a,$b) {
    return $a + $b;
}

$sum = add(23, 45);

$username = 'unknown';
//form programming
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
    }

session_start();
$_SESSION['favcolor'] = 'Red';
setcookie("username", "Akash", time() + 86400);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style></style>
    <script></script>
</head>
<body>
    <div>
        <h1><?php echo "Hello ".$_COOKIE['username'] ?></h1>
        <form method="post" action="">
            <input type="text" name="username" id="">
            <button type="submit" name='submit'>Submit</button>
        </form>
    </div>
</body>
</html>