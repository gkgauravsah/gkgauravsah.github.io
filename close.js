/**
 * Created by student on 6/11/2016.
 */
var http = require('http')
var server=http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});

});
server.on('close',function(){
    console.log("server stoped")
})

server.listen(8080);
server.close();

