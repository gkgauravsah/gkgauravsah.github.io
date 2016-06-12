/**
 * Created by student on 6/11/2016.
 */
var express = require('express');
var app = express();
app.get('/',function (req,res) {

    var myData=["red","blue","green"];
    res.render('login.ejs', {
        data: myData
    });
    res.end();
});

app.listen(8080)
console.log("create server")