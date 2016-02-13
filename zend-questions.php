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