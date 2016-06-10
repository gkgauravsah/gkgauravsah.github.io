var http = require('http');

var userCount = 0;
http.createServer(function (request, response) {
    console.log('New connection');
    var name="Gaurav Sah"
    var roll="1513314902"

    response.writeHead(200, {'Content-Type': 'text/plain'});
    response.write('Hello!\n');
    response.write('My Name is '+name+'\n Roll no. is '+roll);
    response.end();
}).listen(8080);

console.log('Server started');
