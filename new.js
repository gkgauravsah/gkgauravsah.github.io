/**
 * Created by student on 6/10/2016.
 */
var http=require('http')
url = require("url");

var server = http.createServer(function(req,res){
    res.writeHead(200,{"contentType":"text/html"})
    res.end("<h1>Hiiiii My self Gaurav</h1>," +
        "<h2>I m From khagaria Bihar</h2>," +
        "<h3>I pass out 10th and 10+2 from bihar board with 65.2% and 69.2%.</h3>," +
        "<h4>My higher education is BCA from TMBU with 71%.<h4>," +
        "<h5>I am doing MCA from NIET college.</h5>")
})

server.listen(8080)
