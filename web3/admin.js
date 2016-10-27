var page = require('webpage').create();


page.addCookie({
    'name'     : 'flag',   /* required property */
    'value'    : '*CTF{LORD_VOLDEMORT}',  /* required property */
    'domain'   : '10.131.255.6'
});


page.onResourceReceived = function(response) {
  console.log('Response ' + JSON.stringify(response, undefined, 4));
 };

page.open('http://10.131.255.6:10082/AdminForXss.php', function(status) {
  console.log("Status: " + status);
  if(status === "success") {
    page.render('example.png');
    var cookie = page.evaluate(function(){
      return document.cookie;
    });
    console.log(cookie);
    // console.log(JSON.stringify(page.cookies));
    // console.log(JSON.stringify(phantom.cookies));
  }

  phantom.exit();

});
