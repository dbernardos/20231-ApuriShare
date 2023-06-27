(async () => {
    const database = require('./connection-db');
    const Usuario = require('./create-db'); 
    await database.sync();

    const novoUsuario = await Usuario.create({
        nome: 'admin',
        email: 'admin@ifsc.edu.br',
        senha: 'admin'
    })
})();