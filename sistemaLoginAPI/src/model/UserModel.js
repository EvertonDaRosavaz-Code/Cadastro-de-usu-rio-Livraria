const mongoose = require('mongoose');
const cripto = require('bcrypt');

//Definindo um modelo 
const Schema = mongoose.Schema;
const ObjectId = Schema.ObjectId;

const UserSchema = new Schema({
    id: ObjectId,
    nome: String,
    email: String,
    senha: String,
    data: Date
});


UserSchema.pre('save', async function(){
    this.senha = await cripto.hash(this.senha, 12);
})


//Adicionando o modelo ao banco,  nome "usuarios"
const UserModel = mongoose.model('usuarios', UserSchema);


module.exports = UserModel;