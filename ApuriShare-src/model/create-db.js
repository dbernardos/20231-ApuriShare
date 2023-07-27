const Sequelize = require('sequelize');
const { validate } = require('./connection-db');
const database = require('./connection-db');

const Usuario = database.define('Usuarios', {
    nickname: {
        type: Sequelize.STRING,
        primaryKey: true,
        allowNull: false
    },
    nome: {
        type: Sequelize.STRING,
        allowNull: false
    },
    email: {
        type: Sequelize.STRING,
        allowNull: false
    },
    senha: {
        type: Sequelize.STRING,
        allowNull: false
    }
});

sequelize.sync({ force: true }) // Se force: true, a tabela será recriada toda vez que o código for executado
.then(() => {
console.log('Tabela criada com sucesso!');
})
.catch((err) => {
console.error('Erro ao criar tabela:', err);
});

const Sala = database.define('Salas', {
    idsala: {
        type: Sequelize.INTEGER,
        primaryKey: true,
        allowNull: false,
        autoIncrement: true
    },
    chaveAcesso: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    atividade: {
        type: Sequelize.STRING,
        allowNull: false
    },
    comentario: {
        type: Sequelize.STRING,
    },
    nome: {
        type: Sequelize.STRING,
        allowNull: false
    },
    criador: {
        type: Sequelize.STRING,
        allowNull: false,
        references: { model: 'Usuario', key: 'nickname' }
    }
});

sequelize.sync({ force: true }) // Se force: true, a tabela será recriada toda vez que o código for executado
.then(() => {
console.log('Tabela criada com sucesso!');
})
.catch((err) => {
console.error('Erro ao criar tabela:', err);
});

const Atividade = database.define('Atividades', {
    codigo: {
        type: Sequelize.INTEGER,
        primaryKey: true,
        allowNull: false,
        autoIncrement: true
    },
    respostaThink: {
        type: Sequelize.STRING,
        allowNull: false
    },
    respostaPair: {
        type: Sequelize.STRING,
        allowNull: false
    },
    tempoThink: {
        type: Sequelize.TIME,
        allowNull: false
    },
    tempoPair: {
        type: Sequelize.TIME,
        allowNull: false
    },
    enderecoImagem: {
        type: Sequelize.STRING
    },
    sala_idsala: {
        type: Sequelize.INTEGER,
        allowNull: false,
        references: { model: 'Sala', key: 'idsala' }
    },
    Usuario_nickname: {
        type: Sequelize.STRING,
        allowNull: false,
        references: { model: 'Usuario', key: 'nickname' }
    }
});

sequelize.sync({ force: true }) // Se force: true, a tabela será recriada toda vez que o código for executado
.then(() => {
console.log('Tabela criada com sucesso!');
})
.catch((err) => {
console.error('Erro ao criar tabela:', err);
});

module.exports = {
    Usuario,
    Sala,
    Atividade
};