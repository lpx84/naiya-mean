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
      name: params['name']
    };
  var chatUser = {
      username: params['toUsername'],
      name: params['toName']
    };
//  var collection = db.get('session');
//  collection.find({'customer': currUser.username}, function(err, users){
//    if (err) throw err;
//    //res.json(users);
//    
//    
//    
//  });
  
  res.render('chat', {
    title: '奶牙-CHAT',
    currUser: JSON.stringify(currUser),
    chatUser: JSON.stringify(chatUser)
  });
});

module.exports = router;
