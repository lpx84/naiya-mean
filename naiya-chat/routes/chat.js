var express = require('express');
var router = express.Router();
var monk = require('monk');

var db = monk('121.194.62.243:27017/naiya-mean');


/* GET home page. */
router.get('/', function(req, res, next) {
  
  var params = req.query;
  //console.log(req);
  console.log(params);
  
  var currUser = {
      username: params['username'],
      name: params['name'],
      type: params['type']
    };
  var chatUser = {
      username: params['toUsername'],
      name: params['toName'],
      type: params['totype']
    };
  
  res.render('chat', {
    title: '奶牙-CHAT',
    currUser: JSON.stringify(currUser),
    chatUser: JSON.stringify(chatUser)
  });
});

router.get('/api/getsessions', function(req, res, next) {
  
  var collection = db.get('session');
  //var f = currUser.type == 'customer' ? currUser.username+":"+chatUser.username : chatUser.username+":"+currUser.username;
  var username = req.query['username'];
  var type = req.query['type'];
  var condition = {'customer': username};
  if (type != 'customer') {
    condition = {'merchant': username};
  }
  
  collection.find(condition).then(function(items){
    res.json(items);
    console.log(items);
  },function(err){
    console.log(err);
  }).then(function() {
    console.log("after query");
  });
});

module.exports = router;
