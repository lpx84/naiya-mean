var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');

var index = require('./routes/index');
var users = require('./routes/users');
var chat = require('./routes/chat');


var app = express();

var server = require('http').createServer(app);
var io = require('socket.io').listen(server);
server.listen(3001);

io.on('connection', function(socket) {
  
  socket.on('login', function(data) {
    console.log(socket.name);
    
    socket.name = data.username;
    var msg = {
      "type": "login",
      "from": "system",
      "to": "all",
      "user": socket.name,
      "content": "用户"+socket.name+"上线了"
    };
    console.log(JSON.stringify(msg));
    io.sockets.emit("system", msg);
  });
  
  
  //接收并处理客户端发送的事件
  socket.on("client", function(data) {
    //将消息输出到控制台
    data.time = new Date();
    console.log(data);
    //socket.broadcast.emit("broadcast:"+data.to, data);
    io.sockets.emit("message:"+data.sid, data);
    //socket.emit("broadcast:"+data.to, data);
    //需要解释一下的是，在connection事件的回调函数中，socket表示的是当前连接到服务器的那个客户端。所以代码socket.emit('foo')则只有自己收得到这个事件，而socket.broadcast.emit('foo')则表示向除自己外的所有人发送该事件，另外，上面代码中，io表示服务器整个socket连接，所以代码io.sockets.emit('foo')表示所有人都可以收到该事件。
    
    
  });
  
  socket.on('disconnect', function() {
    console.log("client " + socket.name + " logout.");
    var msg = {
      "type": "logout",
      "from": "system",
      "to": "all",
      "user": socket.name,
      "content": "用户"+socket.name+"下线了"
    };
    io.sockets.emit("system", msg);
  });
    
});


global.gio = io;


// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');

// uncomment after placing your favicon in /public
//app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', chat);
app.use('/users', users);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
