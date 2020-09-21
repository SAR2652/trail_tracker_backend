var app = require('express')();
var http = require('http')
server = http.createServer(app);

io = require('socket.io').listen(server);
app.get('/', (req, res) => {
    res.send('Chat Server is running on port 3000')
});

var myData = "someData";
io.on('connection', (socket) => {
    console.log("user connected");
    setInterval(function () {
        io.emit("notification", {"data": myData});
        console.log(myData);
    }, 10000);
});

server.listen(3000, () => {
    console.log('Node app is running on port 3000');
});