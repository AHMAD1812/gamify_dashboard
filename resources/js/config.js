var env = process.env.NODE_ENV || "development";
// var env = 'development';
// var env = 'production';

var config = {
    development: {
        API_URL: "",
        BASE_URL: "http://localhost:8000/",
        SITE_URL: "http://127.0.0.1:8000/",
        ASSET_URL: "http://localhost:8000/",
        SOCKET_URL: "http://127.0.0.1:8008/",
        // SOCKET_URL: "http://54.159.224.249:8008/",
    },
    // development: {
    //     API_URL: "",
    //     BASE_URL: "http://54.159.224.249/",
    //     SITE_URL: "http://54.159.224.249/",
    //     ASSET_URL: "http://54.159.224.249/",
    //     SOCKET_URL: "http://54.159.224.249:8008/",
    // },
    // development: {
    //     API_URL: "",
    //     BASE_URL: "http://snapwork.biz/",
    //     SITE_URL: "http://snapwork.biz/",
    //     ASSET_URL: "http://snapwork.biz/",
    //     SOCKET_URL: "http://snapwork.biz:8008/",
    //     // SOCKET_URL: "wss://cpas-sports.com:8008",
    // },
    // development: {
    //     API_URL: "",
    //     BASE_URL: "http://3.215.243.200/",
    //     SITE_URL: "http://3.215.243.200/",
    //     ASSET_URL: "http://3.215.243.200/public/",
    //     SOCKET_URL: "http://3.215.243.200:8008/",
    // },
    // production: {
    //     API_URL: "",
    //     BASE_URL: "https://cpas.stackup.solutions/",
    //     SITE_URL: "https://cpas.stackup.solutions/",
    //     SOCKET_URL: "https://cpas.stackup.solutions:53000/",
    // },
    // staging: {},
};

module.exports = config[env];
