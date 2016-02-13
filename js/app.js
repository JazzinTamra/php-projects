/**
 * Created by Tamra on 1/24/2016.
 */

angular
    .module('app', ['ngMessages'])
    .controller('MainCtrl', MainCtrl);

function MainCtrl() {}

(function() {

    var a = document.getElementById("a").value *1;
    console.log(typeof a);
    var b = document.getElementById("b").value *1;
    console.log(typeof b);
    var c = document.getElementById("c").value *1;
    console.log(typeof c);
    var p = (a + b + c )/2;
    console.log(typeof p);
    var x = Math.sqrt(p* ((p - a)*(p - b)*(p - c)));
    console.log(typeof x);
    document.getElementById("demo").innerHTML = x;
})();