var http = require('http');
var monmodule = require('./monmodule');
var server = http.createServer(function(req, res) {
    res.writeHead(200);
    // var EventEmitter = require('events').EventEmitter;
    // var produit = new EventEmitter();
    // produit.on('calcul', function(a, b) {
    //     var c = a * b;
    //     console.log("a * b :", c);
    // });
    // produit.emit('calcul', 2, 35);
    monmodule.direBonjour();
    monmodule.direByeBye();
});
server.listen(8080);
