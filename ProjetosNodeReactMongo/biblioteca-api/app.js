//arquivo principal

const express = require("express");
const bodyParser = require("body-parser");
const livroRoutes = require("./routes/livroRoutes");
require("dotenv").config();
require("./config/database"); // Conectando ao banco de dados


const app = express();
const cors = require("cors");
app.use(cors());


// Middlewares
app.use(bodyParser.json());


// Rotas
app.use("/livros", livroRoutes);


// Exportando a aplicação configurada
module.exports = app;


