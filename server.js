const express = require('express');
const app = express();
const server = app.listen(3000, () => {
    console.log("Listening on port: " + 3000);
});
const io = require('socket.io')(server);
let Redis = require('ioredis');

let redis = new Redis();
redis.subscribe('news-action');
redis.on('message', function (channel, message) {
    console.log('Channel is:' + channel);
    console.log('Message is:' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data)

})

//запускаем сервер



