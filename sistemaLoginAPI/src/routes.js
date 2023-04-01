const express = require('express');
const Router = express.Router();

const  ControllUser = require('./controller/ControllerUser');
const { Route } = require('express');

//Enviar dados !
Router.post('/login', ControllUser.CreateUser);

//Consultar dados !
Router.get('/login', ControllUser.ReadUser);

//Consultar um dado em especifico
Router.get('/loginOnUser/:id', ControllUser.ReadUserOne);

//Atualizar dados ! put metodo http....
Router.put('/loginUpdate/:id', ControllUser.UpdateUser);

//Deletar usuarios/dados!
Router.delete('/loginDelete/:id', ControllUser.DeleteUser);

Router.get('/getEmail/', ControllUser.GetUserEmail);
module.exports = Router