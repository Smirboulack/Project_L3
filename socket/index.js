const app = require('express')();
const server = require('http').createServer(app);
const io = require('socket.io')(server);

app.get('/test',(req,res)=>{
    res.sendFile(`${__dirname}/public/index.html`)
})

io.on('connection',(socket)=>{
    console.log('un utilisateur s\'est connectee');

    socket.on('disconnect',()=>{
        console.log('utilisateur est déco');
    })

    socket.on('chat message',(msg)=>{
       // console.log('Message: ' + msg);
       io.emit('chat message',msg)
    });
})



server.listen(3000,()=>{
    console.log('ecoute sur le port 3000');

})