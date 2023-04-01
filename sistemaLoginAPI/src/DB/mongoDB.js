const mongoose = require('mongoose');
const url = "mongodb+srv://evertondarosavaz:98057640fbo@cluster0.xm3wbgo.mongodb.net/?retryWrites=true&w=majority"

async function startDB(){
    await mongoose.connect(url)
}

module.exports = startDB;