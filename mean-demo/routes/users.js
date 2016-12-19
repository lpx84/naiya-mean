var express = require('express');
var monk = require('monk');
var router = express.Router();


// mongodb
var db = monk('localhost:27017/mean-demo');


var mysql = require('mysql');


var connection = mysql.createConnection({
    host: '121.194.62.243',
    port: 3306,
    user: 'naiya',
    password: 'naiya123',
    database:'naiya'
});

// ---------test mysql------------

connection.connect();
connection.query('SELECT * FROM m_user', function(err, rows, fields) {
    if (err) throw err;
    console.log('The solution is: ', rows);
});
connection.end();

// ---------------------

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('This is the user module index page!');
});

router.get('/getlist', function(req, res, next) {
  var collection = db.get('users');
    collection.find({'username':'lpxiang'}, function(err, users){
        if (err) throw err;
        res.json(users);
    });
});

router.post('/add', function(req, res, next) {
  var collection = db.get('users');
    collection.insert(req.body, function(err, user){
        if (err) throw err;
        res.json(user);
    });
});



module.exports = router;
