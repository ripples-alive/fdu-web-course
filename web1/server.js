'use strict'

const express = require('express')
const cookieParser = require("cookie-parser")
const crypto = require("crypto")
const jade = require("jade")
const fs = require("fs")
const morgan = require('morgan')


const PORT = 10081
const app = express()
app.use(cookieParser())
app.set('view engine', 'jade')
app.use(morgan(':remote-addr :date[web] :method :url :status :login_cookie'))

morgan.token('login_cookie', (req, res)=>{
    return req.cookies.login;
})


function base64_encode(s) {
    return new Buffer(s).toString("base64")
}

function base64_decode(s) {
    return new Buffer(s, "base64").toString()
}

function md5(text) {
    return crypto.createHash('md5').update(text).digest('hex');
}


app.get("/", (req, res) => {
    var login_cookie = req.cookies.login
    if (login_cookie == undefined) {
        var not_login_status = "false"
        var not_login_status_md5 = md5(not_login_status)
        var cookie_value = base64_encode(not_login_status + not_login_status_md5)
        res.cookie("login", cookie_value)
        res.cookie("hint", "lowerCase_and_no_CRLF")
        // res.send(welcome_site())
        res.render('welcome', { title: "Have you heard Nodejs?", message: "Wanderer" })
    } else {
        var cookie_value = login_cookie
        // console.log(cookie_value)
        var cookie_value_decode = base64_decode(cookie_value)

        var md5hash = cookie_value_decode.substring(cookie_value_decode.length - 32, cookie_value_decode.length)
        var value = cookie_value_decode.substring(0, cookie_value_decode.length - 32)

        if (value == "true" && md5hash == md5("true")) {
            res.redirect("/admmmmmmmmmmmmmmmmmmmmin")
        } else {
            res.render('welcome', { title: "Have you heard Nodejs?", message: "Wanderer" })
        }
    }
})

app.post('/', (req, res) => {
    res.render('welcome', { title: "Have you heard Nodejs?", message: "Wanderer", error_message: "Wrong username or password"})
})

app.get('/admmmmmmmmmmmmmmmmmmmmin', (req, res)=> {
    res.render('admin')
})

app.get('/article', (req, res) => {
    var article_numer = req.query.id
    var data = fs.readFileSync('article/'+article_numer)
    if (data) {
        res.send(data)
    } else {
        res.send("Cannot find file article/" + article_numer)
    }
})

app.get('/flaaaaaaaaaaaaaaag', (req, res) => {
    res.send("*CTF{TOO_EASY_FOR_YOU}")
})
app.listen(PORT)

console.log("Running on http://0.0.0.0:%d", PORT)
