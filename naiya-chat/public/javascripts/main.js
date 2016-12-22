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

app.controller('ChatCtrl', ['$scope', '$resource', function($scope, $resource){
  
  
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
  
  
  socket.on("message:"+currUser.username, function(data) {

    appendMsg(data, $scope);

    console.log(getTimeString()+" >>> recieve: "+JSON.stringify(data));
  });
  console.log(getTimeString()+" >>> start listen...  user: "+currUser.username);

  
  socket.emit("login", currUser);
  
  $scope.sendMsg = function() {
    
    if ($scope.content == "") {
      return ;
    }
    
    var msg = {
      "type": "chat",
      "from": currUser.username, 
      "to": chatUser.username, 
      "content": $scope.content
    };
    socket.emit("client", msg);
    console.log(getTimeString()+" >>> send: "+JSON.stringify(msg));
    
    $scope.content = "";
    
    //
    appendMsg(msg, $scope);
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
