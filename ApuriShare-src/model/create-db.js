const Sequelize = require('sequelize');
const database = require('./connection-db');

const Usuario = database.define('Usuario', {
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

const Sala = database.define('Sala', {
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

const Atividade = database.define('Atividade', {
    codigo: {
        type: Sequelize.INTEGER,
        primaryKey: true,
        allowNull: false,
        autoIncrement: true
    },
    RespostaThink: {
        type: Sequelize.STRING,
        allowNull: false
    },
    RespostaPair: {
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

module.exports = {
    Usuario,
    Sala,
    Atividade
};