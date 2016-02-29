<?php
function divideTwo($first, $second) {
    if(is_numeric($first) === false || is_numeric($second) === false) {
        throw(new InvalidArgumentException("those are not numbers"));
    }
    if($second == 0) {
        throw(new RangeException("cannot divide by zero"));
    }

    return($first / $second);
}
try {
    divideTwo(42.0, "0");
} catch(Exception $exception) { //(since Range Exception is a child of Exception it caught here. A better way to write this would be to have the more specific Range exception caught first.)
   echo "Exception: " . $exception->getMessage();
} catch(InvalidArgumentException $invalidArgument) {
    echo "InvalidArgumentException: " . $invalidArgument->getMessage();
} catch(RangeException $range) {
    echo "Range Exception :" . $range->getMessage();
}
?>

<?php //example 2
function reverseArrayMembers($array) {
    foreach($array as $key => $member) {
        $array[$key] = strrev($member);
        //nothing is returned so nothing is transferred below
    }
}

$array = ["foo", "bar", "baz"];
reverseArrayMembers(array_flip($array));
echo $array[1];
?>

//this should work
<?php
function reverseArrayMembers($array) {
    foreach($array as $key => $member) {
        $array[$key] = strrev($member);
        //nothing is returned so nothing is transferred below added return($array); below to fix that.
    }
    return($array);
}

$array = ["foo", "bar", "baz"];
$array = reverseArrayMembers(array_flip($array));//this is flipping the reference with the variable. 0 cannot be reversed so it looks like it not doing anything
print_r($array);


//outputs yay
?>

<?php
interface Logger {
    public function log($message);
}
class Foo implements Logger {
    public function log($message) {
        echo $message . PHP_EOL;
    }
}
class Bar extends Foo { //this is just a copy of Foo
    // blank!
}
function enhancedLogger(Logger $logger, $message) { //Logger is a type hint
    echo "<p>";
    $logger->log($message);
    echo "</p>";
}

//implementation
$bar = new Bar();
enhancedLogger($bar, "yay");
//answer
//<p>yay
//</p>
?>
<?php
//new example
interface Logger {
    public function log($message);
}
class Foo implements Logger {
    public function log($message) {
        echo $message . PHP_EOL;
    }
}
class Bar extends Foo {
    // blank!
}
class Baz {
    // also blank
}
function enhancedLogger(Logger $logger, $message) {
    echo "<p>";
    $logger->log($message);
    echo "</p>";
}
$bar = new Bar();
$baz = new Baz();
enhancedLogger($bar, "Back Paws for Bernie");
enhancedLogger($baz, "Meow");
?>

<?php
$closure = function foo($a, $b, $c) { //closures should not have names remove foo to get 3|2|1
    echo "$c|$b|$a" . PHP_EOL;
};
​
$closure(1, 2, 3);
?>

//parse error
//Be prepared for purposeful and subtle syntax errors in Zend questions. Many take the format of:
//
//What is the output of the following code?
//    `// ...code here...`
//    a) foo
//b) bar
//c) baz
//d) parse error
//e) fatal error


//parse errors are syntactical
//fatal error are logical problems see example on page 101
//page 100 #2 diamond problem bc doSomething() and doSomething($special) PHP does not know which to use, so fatal error as well as problems with function naming specialFunction and mySpecialFunction

<?php
$numbers = [1, 2, 3];
$words = ["foo", "bar", "meow"];
$merged = array_merge($numbers, $words);
//1,2,3, foo, bar, meow
usort($merged, function($first, $second) { //user sort; good for sorting object
    if(strlen($first) !== strlen($second)) {
        return(strlen($second) - strlen($first)); //longer stings return positive and get prority
    } else {
        return($second - $first); //numeric subtraction or 0 for string - ewww = mean!!!! Strings = 0
    }
});
print_r($merged);
?>
results
Array
(
[0] => meow
[1] => bar
[2] => foo
[3] => 3
[4] => 2
[5] => 1
)

//Topic 8 Databases This sections questions most closly looks like that you'll find on the exam
FooSQL Aggregation
 orderHeader: generic order data
 product: generic product data
 m-to-n relationship because Derek's sales are so high :D
 orderLine: weak entity from m-to-n relationship
 SELECT orderLineProductId, orderLineOrderHeaderId, orderLineQuantity
  FROM orderHeader;
  output: gobs of ids and quantities - not enough for Derek - he needs his sales numbers!

SELECT orderLineProductId, orderLineOrderHeaderId, orderLineQuantity
FROM orderHeader
INNER JOIN orderHeader ON orderHeader.orderHeaderId = orderLineOrderHeaderId
INNER JOIN product ON product.productId = orderLineProductId
WHERE orderHeaderDate >= "2016-02-27 00:00:00"
 And orderHeaderDate <= "2016-02-27 23:59:59"
 output: same useless data as before with a date filer - dull, dull, dull!

SELECT orderLineProductId, orderLineOrderHeaderId, orderLineQuantity
    SUM(productPrice * orderLineQuantity) AS orderHeaderTotal
 FROM orderHeader
INNER JOIN orderHeader ON orderHeader.orderHeaderId = orderLineOrderHeaderId
INNER JOIN product ON product.productId = orderLineProductId
WHERE orderHeaderDate >= "2016-02-27 00:00:00"
And orderHeaderDate <= "2016-02-27 23:59:59"
 GROUP BY orderLineOrderHeaderId;
    output: all orders with their totals for the day of 2016-02-27

SELECT SUM(productPrice * orderLineQuantity) AS orderHeaderTotal,
    SUM(orderHeaderTotal) AS dailyTotal
    DATE(orderHeaderTotal) AS orderHeaderDay
FROM orderHeader
INNER JOIN orderHeader ON orderHeader.orderHeaderId = orderLineOrderHeaderId
INNER JOIN product ON product.productId = orderLineProductId
GROUP BY orderHeaderDay
 output: two columns: dailyTotal with the amount made for orderHeaderDay(per day)

TL;DR; Don't worry Zend doesn't go SQL insane like this
    However, being able to derive the small parts (one of them) is very useful
    FFS, this is useful in the real world :D
Use the data base bc the PDO is the PDO usage when you can don't write these with php
Transaction similar to a system restore point in Windows

bindParam() vs bindValue()

$answer = 42;
$query = "INSERT INTO foo(bar, baz) VALUES(:bar, :baz)";
$statement = $pdo->prepare($query);
$statement->bindParam(":bar",$answer); //binds the variable by reference
$answer = 16; //this changes what will be executed from the line above
$statement->bindParam(":bar", $answer); //this line will
$statement->execute();

1D 5 does not get NULL
2A
3A can't put a param in the select list
4B begin() makes this a transaction
5D

ARRAYS
array_push vs $array[]
    both add elements to the end of an array
    $array[]="foo' adds to the end of an array using the next available index
    $numeric = ['foo', 'bar'];
    $numeric[] = 'baz'; //['foo','bar', 'baz];
    $associative=["kkeller13=>"ensign", "ethomas"=>"viceroy"];
    $associative=[]="gkephart";
    //["kkeller13=>"ensign", "ethomas"=>"viceroy" 0=>"gkephart"]

array_unshift() adds to the beginning not the end as array_push does

array_unshift() vs array_push()
    classic data structures that George is in live with: Stack and Queue :D
    array_unshift()/array_shift() lets you have a Stack with an array
    array_push()/array_pop() lets you have a Queue with an array
    array_pop(): take from the end of an array
    array_shift(): take from the beginning of an array
    TL:DR: Don't use these - use SplStack and SplQueue

Feeling loopy?
    //numeric array
    for($i=0; $i<count($array); $i++) {}
    //associative array
    foreach($array as $value)
    //associative array with indexed
    foreach($array as $index => $value)
    //run a closure
    array_walk($array, function() {});

WARNING: PHP7 changed the foreach!
    //this will break on PHP7 and work on PHP 5.6;
    foreach($array as $value){
        $value = $value + 42;
}
PHP 5.6 allowed you to modify array values in an array directly
PHP7 gives you a coy of the value and leaves the array unchanged
In PHP7, you can overrride this behavior if necessary:
foreach($array as &$value) {
    $value=$value +42;
}
But is you're doing this, you're doing it wrong - there are better design patterns for this!

The data was in random order because Skyler was feeling out of sorts!
    sort($array) sorts the array in default order
    sort() can take a second parameter for different behaviors:
    SORT_NUMERIC: sort number like strings numerically
    SORT_STRING: sort number like strings lexicographically ex 12 before 2
    SORT_FLAG_CASE//

<?php
$numbers = [1, 10, 11, 13, 2, 21, 22, 24];
sort($numbers, SORT_STRING);
print_r($numbers);
​
$words = ["foo", "bar", "Baz"];
sort($words);
print_r($words);
sort($words, SORT_FLAG_CASE | SORT_STRING);
print_r($words);

?>
//usort is a sort with a closure
<?php
$numbers = [1, 10, 11, 13, 2, 21, 22, 24];
​
/**
 * determines whether a number is divisible by 2
 *
 * @param int $input integer to test
 * @returns int number of times the number is divisible by two
 **/
function divisibleByTwo(int $input) {
    if($input % 2 === 0 && $input !== 0) {
        return(divisibleByTwo($input / 2) + 1);
    } else {
        return(0);
    }
}
​
// now, use a closure to order the array by the number of factors of two
// imagine using an operator, such as <, the closure does $left < $right
usort($numbers, function($left, $right) {
    return(divisibleByTwo($right) - divisibleByTwo($left));
});
print_r($numbers);
?>



