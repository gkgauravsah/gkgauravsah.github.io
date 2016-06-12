/**
 * Created by student on 6/11/2016.
 */
var express = require('express');
var app = express();
app.get('/model/:courseName',function (req,res) {

    
    res.render('model.ejs',{
        data:req.params.courseName
    })
    res.end();
});

app.listen(8080)
console.log("create server")