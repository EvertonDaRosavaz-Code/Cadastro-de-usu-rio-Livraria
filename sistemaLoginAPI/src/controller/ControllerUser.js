

const UserModel = require('../model/UserModel');
const { use } = require('../routes');

class ControllUser{
    //Crear novo usuario, função assincrona
    async CreateUser(req, res){
        // Tratamento de erros ao criar um novo usuario para somente o email
       try{
            const {email} = req.body;
            const emailJaExiste = await UserModel.findOne({email});
            //Ver se ao adicionar se tem o mesmo email, me retorna uma mensagem
            if(emailJaExiste){
                return res.status(404).json("Tente outro email, o email solicitado ja esta em uso") 
            }

            //Verificar se os camos foram preenchidos devidamente
            const {nome, senha, data} = req.body;
            //Colocar so a variavel/constante, se houver um valor /existir  retorna true
            if(!nome ||  !senha || !data){
                return res.status(404).json("Uns dos campos solicitados, nao está preenchido")
            }

            
            const createUser =  await UserModel.create(req.body);

            return res.status(200).json({createUser});
       }
       
       catch(e){
            return res.status(404).json("Error, tente novamente, consulte os dados que inseriu ")
       }
    }

    // Consultar usuarios, função assincrona
    async ReadUser(req, res){
        try{
            const consulta = await UserModel.find();
            res.status(200).json({consulta});
        }catch(e){
            return res.status(404).json("Erro ao solociar o usuario, tente novamente, verifique o id correspondente")
        }
    }

    //Consulta apenas um usuario em especifico
    async ReadUserOne(req, res){
        try{
            const {id} = req.params;
            const User = await UserModel.findById(id)
           return res.status(200).json(User);
        }catch(e){
            return res.status(404).json('Error')
        }
    }

    //Atualizar usuario, função assincrona
    async UpdateUser (req, res){
        //Tratamento de erros ao atualizar
       try{
            const {id} = req.params
             const updateDados = await UserModel.findByIdAndUpdate(id, req.body)
             res.status(200).json({
                updateDados
            }); 
       }catch(e){
            return res.status(404).json('Error')
       }

    }

    //Deletar usuario, função assincrona
    async DeleteUser(req, res){
        try{
            const {id} = req.params;
            const deleteUser = await UserModel.findByIdAndRemove(id)
            res.status(200).json(
                deleteUser
            );

        }catch(e){
            return res.status(404).json("Erro ao deletar, tente novamente")
        }
    }


    //Buscar usuario com o email, função assincrona
    async GetUserEmail(req, res){
        const {email} = req.body;
        const user = await UserModel.findOne({email});

        if(!user){
            return  res.status(404).json({MESSAGE: "ERRO ao buscar Email"});
        }

       return res.status(200).json(user);
    }
}


module.exports = new ControllUser();