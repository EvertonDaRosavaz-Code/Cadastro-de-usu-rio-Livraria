//Chamando a conexão ao index
const DB = require('./DB');
DB.start();


// Conectado a porta 4001
const app = require('./app.js');
const port = 4001;

app.listen(port, ()=>{
    console.log("Servidor rodando !");
})

