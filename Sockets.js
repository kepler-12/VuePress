const app = require('express')();
const http = require('http').Server(app);
require('dotenv').config()

// For Incoming and Outgoing connections
const io = require('socket.io')(http);

//Instatiate a socket.io connection
io.on('connection', function (socket) {
  socket.on('event', ({response, data}) => {
    io.emit(response, data);
  })
});


http.listen(process.env.PORT, function () {
  console.log(`listening on *:${process.env.PORT}`);
})
