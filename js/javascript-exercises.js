/**
 * Created by Tamra on 1/23/2016.
 */


function printWindow() {
	window.print();
}

// #3 current date

function currentDate1() {

	var date = new Date().toString("mm-dd-yyyy");
	console.log(date);

	// add to the DOM, to the strong tag called "CurrentDate"
	document.getElementById("currentDate1").innerHTML(date);
}
// now call it when the window is resized.
document.write() = function () {
	currentDate1();
};
