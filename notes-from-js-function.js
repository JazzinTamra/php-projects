/**
 * Created by Tamra on 3/7/2016.
 */

//function keyword declares or defines
//instructions are called statement
// js can return a value, object and even another function

function plus(a, b) {
    var sum = a+b;
    return sum;
}

console.log(plus(2,2)); //invoking the function
//the function can be called from the console with plus(2,2) or any other arguments

//FUNCTION DECLARATION (above) uses the function keyword by itself followed by a name and then statements and arguments, an then you call or invoke the function and pass it some parameters.
// Arguments/parameters(**a,b,c,...**)
//{} hold the function body that have 0 or more statements

//DEFINITION EXPRESSION
//  aSSIGNING FUNTIONS TO EXPRESSIONS
//  aNONYMOUS FUNTIONS
//  Names can be useful
//  More flexible than expressions
//  can be invoked immediately
//  can initialize values immediately

var plus = function(a,b) {
    return console.log(a+b);
}(); //invoking immediately with the parens if values are passed here that's called initalizing or instantiating the function
//use this invokation if the function is only needed once or when the results are needed immediatly
plus(2,2);

//INVOCATION PATTERNS
//4 ways of invoking functions
//  Functions*
//  Methods*
//  Constructors
//  Call & apply methods
//*most common

//Invoking as a Function
function plus(a,b) {
    return (
        console.log(a+b), //the result
            console.log(this), //window object
            console.log(arguments) //[2, 2] array like object
    )
}

plus(2,2)

//Invoking as a Method
//An object is one of JSs many data types: var, arrays, objects are the most flexible


//what an object looks like
//  start and end with curly braces
//  flexible properties
  //  The this argument points to the object
  //  The binding of the this happens at invocation time

var info = {
    full_name: "Tamra Fenstermaker", //this is an element
    title: "Web Developer",
    links: [ //this element is an array. A function could even go here
        {blog : "http..."},
        {twitter: "http..."},
    ]
};


var calc = {
    status: 'Awesome', //string property
    plus: function (a,b) { //function property
        return ( //statements of this function. return is a function
            console.log(this), //returns the parameters of the calc function
                console.log(a+b), //results
                console.log(arguments), //[2, 2]
                console.log(this.status) // awesome
        )
    }
};

calc.plus(2,2);//calling and instantiating the function   //  Invoke the function using dot notation


// Invoking through the constructor
//  functions

var Dog = function() { //constructor names should be capitalized
    var name, breed;
    return console.dir(this);
};

firstDog = new Dog;  //new keyword creates a new instance of the object above
firstDog.name = "Rover";
firstDog.breed = "Doberman";

console.log(firstDog); //results Rover

secondDog = new Dog;  //new instance with new properties
secondDog.name = "Fluffy";
secondDog.breed = "Poodle";


//Expanding objects through prototype

var speak = function(saywhat) {
    console.log(saywhat); //here's the request to log what they speak
};

var Dog = function() {
    var name, breed;
};

var Cat = function() {
    var name, breed;
};

Dog.prototype.speak = speak; //this gives the dog the ability to speak or adds speak to the to dog function
Cat.prototype.speak = speak;

firstDog = new Dog;
firstDog.name = "Rover";
firstDog.breed = "Doberman";
firstDog.speak('woof');

firstCat = new Cat;
firstCat.name = "Sniggles";
firstCat.breed = "Manx";
firstCat.speak('meow');

//Invoking through call & Apply
//  Indirect invocation
//  Define the value of this argument


var speak = function(what) {
    console.log(what); //gets you meow
    console.log(this); //gets you the Window
    console.log(this.love);//purr is the answer. I'm not quite sure why it pulls from below without calling saySomething
};
speak("meouff");

var saySomething = {normal: "meow", love: "purr"};
// call passes a value, Apply an array
speak.call(saySomething);
speak.apply(saySomething, ['meouff']);

///THE ARGUMENTS PARAMETER
// *lIST OF ELEMENTS PASSED
//  *aN ARRAY LIKE OBJECT
//  *Numerical index agrument[x]
//  *we cal get the arguments.length
//  *We can loop through arguments
//  *Can't use all array methods like pop push

var plus = function() { //no named function, so this is a function literal
    var sum =  0;
    for (var i = arguments.length - 1; i >= 0; i--) { //example of using the arguments parameter
        sum += arguments[i];
    };
    return sum;
};

console.log(plus(2,2,2,3,2,3,4));

//THE return STATEMENT
return sum;
//  *   Returns an express i.e. the results of the function
//  *  Sort of optional without it a function returns undefined
//  *  Can only be used in the function body
//  *  Return sends something back to the caller. It can be a variable or assigned to a variable
//  *  Stops execution of the function
//  *

