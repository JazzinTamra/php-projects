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
​
try {
    divideTwo(42.0, "0");
} catch(Exception $exception) { //(since Range Exception is a child of Exception it caught here. A better way to write this would be to have the more specific Range exception caught first.)
   echo "Exception: " . $exception->getMessage();
} catch(InvalidArgumentException $invalidArgument) {
    echo "InvalidArgumentException: " . $invalidArgument->getMessage();
} catch(RangeException $range) {
    echo "Range Exception :" . $range->getMessage();
}

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


//this should work

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

<?php
$closure = function foo($a, $b, $c) { //closures should not have names remove foo to get 3|2|1
    echo "$c|$b|$a" . PHP_EOL;
};
​
$closure(1, 2, 3);

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