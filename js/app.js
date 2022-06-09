
const mysql = require('mysql');


//Establecemos los prámetros de conexión
const conexion = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'restaurante'
})
//Conexión a la database
conexion.connect(function (error) {
    if (error) {
        throw error
    } else {
        console.log("¡Conexión exitosa a la base de datos!")
    }


})