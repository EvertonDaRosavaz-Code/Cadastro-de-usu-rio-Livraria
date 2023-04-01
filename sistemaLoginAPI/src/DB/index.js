
const startDB = require('./mongoDB');

class runDB{
     start() {
        startDB().then(()=>{
            console.log("Connected in DataBase Mongo !");
        }).catch(()=>{
            console.log("Error Connecting in DataBase");
        })
    }
}



module.exports = new runDB;