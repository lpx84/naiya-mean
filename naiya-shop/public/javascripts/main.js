var app = angular.module("naiya-chat", ['ngResource', 'ngRoute']);

app.config(['$routeProvider', function($routeProvider){
  $routeProvider
    .when('/', {
      templateUrl: 'tpl/chat.html',
      controller: 'ChatCtrl'
    })
    .otherwise({
      redirectTo: '/'
    });
  
}]);

app.controller('ChatCtrl', ['$scope', '$resource', '$compile', function($scope, $resource, $compile){
  
  
  $scope.currUser = currUser;
  
  if (chatUser == undefined || chatUser == {}) {
    chatUser = {
      "username": "sample",
      "name": "当前没有回话"
    };
  }
  $scope.chatUser = chatUser;
  
  var socket = io.connect("http://"+location.hostname+":3001");//与服务器进行连接
  
  socket.on("system", function(data) {
    if (data.user != undefined && data.user == chatUser.username) {
      console.log(getTimeString()+">>> Recieve: "+JSON.stringify(data));
      appendMsg(data, $scope);
    }
  });
  
  console.log(getTimeString()+" >>> Create connection...");
  
  

  // 发送登录信息
  socket.emit("login", currUser);
  
  
  var Sessions = $resource("/api/getsessions");
  
  Sessions.query({
    'username': currUser.username, 
    'type': currUser.type
  }, function(res) {
    for (var i = 0; i < res.length; ++i) {
      var item = res[i];
      $("#side-menu").append($compile(createChaterItem(item, $scope, socket))($scope));
      var chartUserName = currUser.type == 'customer' ? item.merchant : item.customer;
      var chartName = currUser.type == 'customer' ? item.mname : item.cname;
      if(i == 0) {
        $scope.selectSession(item._id, chartUserName, chartName);
      }
      
    }
    
    
    // 启动定时刷新
    startUpdateOnTimes($resource, $compile, $scope, socket);
    
  });
  
  
  
  $scope.selectSession = function(sid, username, name) {
    
    if (sid == chatUser.sid) {
      return ;
    }
    
    $("li[sid='"+sid+"'] a span.read-msg").fadeOut();
    $("li[sid='"+sid+"'] a span.read-msg").html("0");
    $(".content.content-msg").html("");
    $("#side-menu li").removeClass("active");
    $("#side-menu li[sid='"+sid+"']").addClass("active");
    
    chatUser["name"] = name;
    chatUser["username"] = username;
    chatUser["sid"] = sid;
    
    $scope.chatUser = chatUser;
    var arr = msgs[chatUser.sid];
    if (arr != undefined) {
      for(var i = 0; i < arr.length; ++i) {
        appendMsg(arr[i], $scope);
      }
    }
    
  }
  
  $scope.sendMsg = function() {
    
    if ($scope.content == "") {
      return ;
    }
    
    var msg = {
      "sid": chatUser.sid,
      "type": "chat",
      "from": currUser.username, 
      "to": chatUser.username, 
      "content": $scope.content
    };
    
    socket.emit("client", msg);
    console.log(getTimeString()+" >>> send: "+JSON.stringify(msg));
    
    $scope.content = "";
    
    //
    //appendMsg(msg, $scope);
    //$scope.msgBoard += msg.from+": "+msg.content+"\n";
  }
  
  
  
}]);

//app.controller('AddUserCtrl', ['$scope', '$resource', '$location', function($scope, $resource, $location){
//  $scope.save = function() {
//    var Users = $resource('/users/add');
//    console.log($scope);
//    //debugger
//    Users.save($scope.user, function(res){
//      console.log(res);
//      $location.path('/');
//    });
//  }
//}]);

function getTimeString() {
  return new Date().toTimeString().substr(0, 8);
}

function toBottom() {
  var content = document.getElementById("content-msg");
  content.scrollTop = content.scrollHeight - content.clientHeight;
}


function appendMsg(data, $scope) {
//  $scope.msgBoard = $scope.msgBoard || "";
//  $scope.msgBoard += data.from+": "+data.content+"\n";
//  $scope.$apply();
  var msgEle = $(document.createElement("div"));
  msgEle.html('<div class="author-name"><span class="name">Anna Lamson</span> <small class="chat-date">11:24 am</small></div><div class="chat-message">msg</div>');
  
  if (currUser.username != data.from) {
    msgEle.attr("class", "left");
  } else {
    msgEle.attr("class", "right");
  }
  
  if (data.type == "system" || data.type == "login" || data.type == "logout") {
    msgEle.find(".chat-message").addClass("chat-warning");
  } else if (data.from != currUser.username) {
    msgEle.find(".chat-message").addClass("active");
  }
  msgEle.find(".author-name .name").html(data.from);
  msgEle.find(".author-name .chat-date").html(getTimeString());
  msgEle.find(".chat-message").html(data.content);
  $(".content.content-msg").append(msgEle);
  
  toBottom();
}


function createChaterItem(item, $scope, socket) {
  var ele = $(document.createElement("li"));
  ele.html('<a href="javascript:void(0)"><i class="fa fa-user"></i><span class="nav-label">大米科技</span><span class="read-msg label label-info pull-right" style="display: none;">0</span></a>');
  ele.attr("sid", item._id);

  var chartUserName = currUser.type == 'customer' ? item.merchant : item.customer;
  var chartName = currUser.type == 'customer' ? item.mname : item.cname;
  
  ele.attr("ua", chartUserName);
  ele.find(".nav-label").html(chartName);
  ele.attr("ng-click", "selectSession('"+item._id+"', '"+chartUserName+"', '"+chartName+"')");
  
  
  // 接收消息
  socket.on("message:"+item._id, function(data) {
    if(msgs[data.sid] == undefined) {
      var arr = [];
      arr.push(data);
      msgs[data.sid] = arr;
    } else {
      msgs[data.sid].push(data);
    }
    if (chatUser.sid == data.sid) {
      appendMsg(data, $scope);
    } else {
      var num = parseInt($("li[sid='"+data.sid+"'] a span.read-msg").html());
      num = num + 1;
      $("li[sid='"+data.sid+"'] a span.read-msg").html(num);
      $("li[sid='"+data.sid+"'] a span.read-msg").fadeIn();
      document.getElementById("tips-audio").play();
    }

    console.log(getTimeString()+" >>> recieve: "+JSON.stringify(data));
  });
  console.log(getTimeString()+" >>> start listen...  user: "+item.username);
  
  return ele;
}

function startUpdateOnTimes($resource, $compile, $scope, socket) {
  setInterval(function() {
    var Sessions = $resource("/api/getsessions");
    
    Sessions.query({
      'username': currUser.username, 
      'type': currUser.type,
      'time': lastUpdateTime
    }, function(res) {
      
      if (res != undefined && res != null && res.length > 0) {
        console.log("get newer items...");
        console.log(res);
        
        for (var i = 0; i < res.length; ++i) {
          if (lastUpdateTime < res[i].time) {
            lastUpdateTime = res[i].time;
          }
          $("#side-menu").append($compile(createChaterItem(res[i], $scope, socket))($scope));
        }
        
      }
    });
    
//    Sessions.query({
//      'username': currUser.username, 
//      'type': currUser.type,
//      'time': lastUpdateTime
//    }, function(res) {
//      console.log("get newer items...");
//      console.log(res);
//      if (res != undefined && res != null) {
//        lastUpdateTime = res[0].time;
//      }
//    });
    
  }, 2000);
}
