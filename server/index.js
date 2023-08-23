const express = require('express');
require("dotenv").config();
const bodyParser = require('body-parser');
const mysql = require('mysql');
const cors = require('cors');
const app = express();

const db = mysql.createPool({
    host: "localhost",
    user: "root",
    password: "",
    database: "test"
});

app.use(express.json());
app.use(bodyParser.urlencoded({extended: true}));
app.use(cors({origin: true, credentials: true}));

app.get('/api/get', (req, res) =>{
    const sqlSelect = "SELECT * FROM user";
    // console.log(userName, userPassword);
    //res.send(userName, userPassword);
    db.query(sqlSelect, (err, result) => {
        res.send(result);
    })
});

app.post('/api/insert', (req, res) =>{
    const userName = req.body.username;
    const userPassword = req.body.userpassword;
    const sqlInsert = "INSERT INTO user (name, password) VALUES (?, ?);";
    // console.log(userName, userPassword);
    //res.send(userName, userPassword);
    db.query(sqlInsert, [userName, userPassword], (err, result) => {
        // res.status(status).send(body);
        res.send(userName, userPassword);
    })
});
// app.get('/', (req, res) => {
//     const sqlInsert = 
//     "INSERT INTO user (name, password) VALUES (?, ?);";
//     // "INSERT INTO movie_reviews (movieName, movieReview) VALUES (?, ?)";
//     db.query(sqlInsert, [name, password], (err, result) =>{
//         res.send(err);
//     });
// });
app.listen(3001, () =>{
    console.log("Running on port 3001");
});