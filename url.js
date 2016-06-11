/**
 * Created by student on 6/10/2016.
 */
var http = require('http')
var url=require('url')

var server=http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    var page =url.parse(req.url).pathname;

    if(page=='/login') {
        res.write("Request page is login");
    }
    else {
        res.write("Request page is singup");
    }
        res.end()
});

    server.listen(8080);
console.log("Welcome to karachi");

