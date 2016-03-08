var socialMedia = {
  facebook : 'http://facebook.com/viewsource',
  twitter: 'http://twitter.com/planetoftheweb',
  flickr: 'http://flickr.com/planetotheweb',
  youtube: 'http://youtube.com/planetoftheweb'
};

var social = function() {
  var output = '<ul>', //opening ul tag
  myList = document.querySelectorAll('.socialmediaicons'); //this selects the html element

  for (var key in arguments[0]) { //assigns facebook, twitter etc to the key var
    //note single quotes are for js double for html
    output +=' <li><a href="' + socialMedia[key] + '">' + //key here says get me the url for socialMedia[facebook etc.]
        '<img src="images/' + key +'.png" alt="icon for ' + key + '">' +
        '</img></a></li> ';
  }
  output += '</ul>'; //closing ul tag

  for (var i = myList.length - 1; i >= 0; i--) {
    myList[i].innerHTML = output;
  }

}(socialMedia);