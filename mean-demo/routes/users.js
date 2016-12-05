var express = require('express');
var monk = require('monk');
var router = express.Router();

var db = monk('localhost:27017/mean-demo');

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
