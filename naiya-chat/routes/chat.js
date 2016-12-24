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
  
  if (currUser.type == 'merchant') {
    currUser["avator"] = "xiaomi.png";
  } else {
    currUser["avator"] = "profile_small.jpg";
  }
  
  
  if (currUser.username != undefined && chatUser.username != undefined) {
    var collection = db.get('session');
    var condition = {};
    if (currUser['type'] == 'customer') {
      condition = {'customer': currUser.username, 'merchant': chatUser.username};
    } else {
      condition = {'customer': chatUser.username, 'merchant': currUser.username};
    }

    collection.find(condition).then(function(items){

      console.log(items);

      if (items == undefined || items.length == 0) {
        var record = {};
        if (currUser['type'] == 'customer') {
          record['customer'] = currUser.username;
          record['cname'] = currUser.name;
          record['merchant'] = chatUser.username;
          record['mname'] = chatUser.name;
        } else {
          record['customer'] = chatUser.username;
          record['cname'] = chatUser.name;
          record['merchant'] = currUser.username;
          record['mname'] = currUser.name;
        }
        record["time"] = getTimeString();
        console.log("records:");
        console.log(record);
        collection.insert(record).then(function(res) {
          //console.log(">>>>>success insert>>>>>>");
          //console.log(res);  // res is the record inserted.
        }, function(err) {

        });

      }
    },function(err){
      console.log(err);
    }).then(function() {
      console.log("after query");
    });
  }

  
  
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
  var time = req.query['time'];
  
  var condition = {'customer': username};
  if (type != 'customer') {
    condition = {'merchant': username};
  }
  
  if (time != undefined && time != null) {
    condition['time'] = {$gt: time};
  }
  
  console.log(condition);
  collection.find(condition).then(function(items){
    res.json(items);
    console.log(items);
    
//    if (time != undefined && time != null && items.length > 0) {
//      global.gio.emit('newsession:'+, );
//    }
    
  },function(err){
    console.log(err);
  }).then(function() {
    console.log("after query");
  });
});

module.exports = router;

function getTimeString() {
  var now = new Date();
  return now.format("yyyy-MM-dd hh:mm:ss");
}


Date.prototype.format = function (fmt) { //author: meizz 
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}