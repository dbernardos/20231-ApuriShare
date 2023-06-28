const database = 'db_apurishare';
const hostname = 'localhost';
const user = 'root';
const password = '';
const sgbd = 'mysql';
const portbd = 3306;

const Sequelize = require('sequelize');

const sequelize = new Sequelize(database, user, password, {
host: hostname,
dialect: sgbd,
port: portbd
});

module.exports = sequelize;