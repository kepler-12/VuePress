const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const axios = require('axios');

app.get('/', function(req, res){
  res.send("Silence is golden");
});

const baseUrl = "http://vuepress.dev/wp-json/wp/v2/"

io.on('connection', function(socket){
  console.log('a user connected');
  socket.on('wp-rest', ({method, path, data, response}) => {
    const url = baseUrl+path
    return axios({
      method,
      url,
      data
    })
    .catch(error)
    .then(emit(response))
  })
});

function emit(path){
  return function(res){
    console.log(path, res.data);
    return io.emit(path, res.data)
  }
}


function error(res){
  console.error("error", res)
  return io.emit('error')
}

http.listen(3020, function(){
  console.log('listening on *:3020');
});
