var express = require('express');
const app = express();
var { writeFile } = require('fs');
var { json, urlencoded } = require('body-parser');
var rp = require('request-promise');
var { createPool } = require('mysql');
var pool = createPool({
    connectionLimit : 100,
    host     : '127.0.0.1',
    user     : 'root',
    password : '',
    database: 'nongmao'
});

var filesInProgress, checkTimer, logFile, isProgressing;
var processTimer;

function CheckLocalhost(callback) {
    rp("http://localhost/mymymymymy.html").then(function(html){ 
        if (html == 'gggyyy') callback ("localhost");
        else callback("gggyyy.cn");
    }).catch(function(err){
        writeFile(logFile, "[Error] " + new Date().toLocaleString() + " ----  Get local domain failed\n", {flag: 'a'}, ()=>{});    
    });
}
function scrapeFile(domain, url, filename) {
    filesInProgress++;
    rp("http://" + domain + url).then(function(html){ 
        writeFile("/var/www/html" + filename, html, ()=>{});
        writeFile(logFile, "[Success] " + url + " " + filename + "\n", {flag: 'a'}, ()=>{});
        filesInProgress--;
    }).catch(function(err){
        writeFile(logFile, "[Error, " + new Date().toLocaleString(), "]: " + url + " " + filename + "\n", {flag: 'a'}, ()=>{});    
        filesInProgress--;
    });
}

function make2(s) { return s < 10 ? "0" + s : s; }

function callDaemon() {
    if (checkTimer) {
        writeFile(logFile,"-------- Daemon restarted " + new Date().toLocaleString() + "--------\n", {flag: 'a'}, ()=>{});          
        clearInterval(checkTimer);
        checkTimer = 0;            
    }   
    clearInterval(processTimer);  

    filesInProgress = 0;
    isProgressing = 1;
    CheckLocalhost(function(domain) {            
        setTimeout(() => {
            logFile = "Log_" + new Date().getFullYear() + "-" + make2(new Date().getMonth() + 1) + "-" + make2(new Date().getDate()) + "-" + make2(new Date().getHours()) + "-"
                + make2(new Date().getMinutes()) + "-" + make2(new Date().getSeconds()) + ".txt";
            writeFile(logFile,"-------- Daemon started --------\n--- " + new Date().toLocaleString() + " ---\n",{flag: 'a'}, ()=>{});    
            processFiles(domain);
        }, 10000);    
    })  
}

function processFiles(domain) {
    var urlList = [];
    urlList.push(["/N1/p1.php", "/index.html"]); //should start path with '/'
    urlList.push(["/N1/p5.php", "/sj/sjhz.html"]);
    urlList.push(["/N1/p6.php", "/sj/zfhz.html"]);
    urlList.push(["/N5/p37.php", "/sj/nmscdw.html"]);

    var urlIndex = 0;
    processTimer = setInterval(function() {
        scrapeFile(domain, urlList[urlIndex][0], urlList[urlIndex][1]);
        if (++urlIndex == urlList.length) {
            clearInterval(processTimer);
            writeFile(logFile,"\n\n-------- Daemon ended --------\n--- " + new Date().toLocaleString() + " ---\n\n\n\n",{flag: 'a'}, ()=>{});        
            clearInterval(checkTimer);
            checkTimer = 0;      
            isProgressing = 0;
            processTimer = 0;
        }        
    }, 1000);    
}

app.set('port', 8080);
app.listen(app.get('port'), '0.0.0.0');
app.use(json({limit: '10mb', extended: true}));
app.use(urlencoded({limit: '10mb', extended: true}));
app.all('/workon', (req, res) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    setTimeout(() => { callDaemon(); }, 10);
    setTimeout(() => {res.send("success");}, 10000);
});
app.all('/isprocessworkon', (req, res) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    if (checkTimer) res.send("success");
    else res.send("done");
});