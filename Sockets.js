const app = require('express')();
const http = require('http').Server(app);

// For Incoming and Outgoing connections
const io = require('socket.io')(http);

//For all HTTP Requests
const axios = require('axios');

//The base url for all of our axios requests
const baseUrl = "http://vuepress.dev/wp-json/wp/v2/"

//Instatiate a socket.io connection
io.on('connection', function (socket) {
  //Listen for the event 'wp-rest' and preform function
  socket.on('wp-rest', ({ method, path, data, response }) => {
    const url = baseUrl + path
    //Submit the ajax request to the wordpress restapi
    axios({
      method,
      url,
      data
    })
      .then(emit(response))
      .catch(emitError('error'))
  });
  socket.on('update', ({response, data}) => {
    emit(response)({data});
  })
});

// function for emmiting to all sockets currently connected to this port
function emit(path) {
  return function (res) {
    console.log(path, res.data);
    return io.emit(path, res.data)
  }
}

function emitError(path) {
  return function (res) {
    console.log(path, res);
    return io.emit(path, res)
  }
}

http.listen(3020, function () {
  console.log('listening on *:3020');
})
