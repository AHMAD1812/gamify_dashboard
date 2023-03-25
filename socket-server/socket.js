///pm2 start socket.js
const port = 9443;

var express = require("express");
var app = express();
app.set("trust proxy", "127.0.0.1");
app.use(function (req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "X-Requested-With");
    res.header("Access-Control-Allow-Headers", "Content-Type");
    res.header(
        "Access-Control-Allow-Methods",
        "PUT, GET, POST, DELETE, OPTIONS"
    );
    res.header("Access-Control-Allow-Credentials", "true");
    next();
});
var server = require("http").createServer(app);
var io = require("socket.io")(server, {
    path: "/socket.io",
    origins: "*:*",
});
server.listen(port);


app.get("/socket.io", function (req, res) {
    res.send("Socket Working Fine 256.");
});

io.on("connection", function (socket) {
    socket.on("message_send", function (data) {
        io.emit("message_send", {
            data: data,
        });
    });

    socket.on("message_receive", function (data) {
        io.emit("message_receive", {
            data: data,
        });
    });

});
