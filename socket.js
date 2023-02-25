// var app = require("express")(8008);
// var http = require("https").Server(app);
// const fs = require("fs");
// const server = require("https").createServer({
//     cert: fs.readFileSync("./cpas_certificates/9ccd2407dc3d95f8.crt"),
//     key: fs.readFileSync("./cpas_certificates/cpas-sports.key"),
//   });
const port = 8443;
const fs = require("fs");
var options = {
    key: fs.readFileSync("./ssl-certificates/snapwork.biz.key"),
    cert: fs.readFileSync("./ssl-certificates/b2bf6a3d7243bd1b.crt"),
};
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
var server = require("https").createServer(options, app);
var io = require("socket.io")(server, {
    path: "/socket.io",
    origins: "*:*",
});
server.listen(port);
// var app = require("express")(7000);
// var http = require("http").Server(app);
// var io = require("socket.io")(http, {
//     cors: {
//         origin: ["http://127.0.0.1:8000"],
//     },
// });

app.get("/socket.io", function (req, res) {
    res.send("Socket Working Fine 256.");
});

var sockets = {};

io.on("connection", function (socket) {
    socket.on("draft_accepted", function (data) {
        io.emit("draft_accepted", {
            data: data,
        });
    });

    socket.on("draft_approved", function (data) {
        io.emit("draft_approved", {
            data: data,
        });
    });

    socket.on("draft_rejected", function (data) {
        io.emit("draft_rejected", {
            data: data,
        });
    });

    socket.on("revision_requested", function (data) {
        io.emit("revision_requested", {
            data: data,
        });
    });

    socket.on("profile_updated", function (data) {
        io.emit("profile_updated", {
            data: data,
        });
    });

    socket.on("card_updated", function (data) {
        io.emit("card_updated", {
            data: data,
        });
    });

    socket.on("message_send", function (data) {
        io.emit("message_send", {
            data: data,
        });
    });

    socket.on("campaign_created", function (data) {
        io.emit("campaign_created", {
            data: data,
        });
    });

    socket.on("notify_user", function (data) {
        io.emit("notify_user", {
            data: data,
        });
    });
});

// http.listen(8008, function () {
//     console.log("Socket Working Fine..");
// });
