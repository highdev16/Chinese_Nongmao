import express from 'express';
const app = express();
import { writeFile } from 'fs';
import { json, urlencoded } from 'body-parser';
import rp from 'request-promise';
import { createPool } from 'mysql';
import { domain } from 'process';
var pool = createPool({
    connectionLimit : 100,
    host     : '127.0.0.1',
    user     : 'root',
    password : '',
    database: 'nongmao'
});

var filesInProgress, checkTimer, logFile;
function CheckLocalhost(callback) {
    rp("http://localhost/mymymymymy.html").then(function(html){ 
        if (html == 'gggyyy') callback ("localhost");
        else callback("gggyyy.cn");
    }).catch(function(err){
        writeFile(logFile, "[Error] " + new Date().toLocaleString() + " ----  Get local domain failed\n", 'a');    
    });
}
function scrapeFile(domain, url, filename) {
    filesInProgress++;
    rp("http://" + domain + url).then(function(html){ 
        writeFile("/var/www/html" + filename, html);
        writeFile(logFile, "[Success] " + url + " " + filename + "\n", 'a');
        filesInProgress--;
    }).catch(function(err){
        writeFile(logFile, "[Error, " + new Date().toLocaleString(), "]: " + url + " " + filename + "\n", 'a');    
        filesInProgress--;
    });
}

function make2(s) { return s < 10 ? "0" + s : s; }

function callDaemon() {
    if (checkTimer) {
        writeFile(logFile,"-------- Daemon restarted " + new Date().toLocaleString() + "--------\n", 'a');          
        clearInterval(checkTimer);
        checkTimer = 0;      
    }   
    filesInProgress = 0;
    CheckLocalhost(function(domain) {            
        setTimeout(() => {
            logFile = "Log_" + new Date().getFullYear() + "-" + make2(new Date().getMonth() + 1) + "-" + make2(new Date().getDate()) + "-" + make2(new Date().getHours()) + "-"
                + make2(new Date().getMinutes()) + "-" + make2(new Date().getSeconds()) + ".txt";
            writeFile(logFile,"-------- Daemon started --------\n--- " + new Date().toLocaleString() + " ---\n",'a');    

            checkTimer = setInterval(function() {
                if (checkTimer) {
                    if (filesInProgress == 0) {
                        writeFile(logFile,"\n\n-------- Daemon ended --------\n--- " + new Date().toLocaleString() + " ---\n\n\n\n",'a');        
                        clearInterval(checkTimer);
                        checkTimer = 0;      
                    }
                }
            }, 5000);
            processFiles(domain);
        }, 10000);    
    })  
}

function processFiles(domain) {
    scrapeFile(domain, "/N1/p1.php", "/index.html");  //should start path with '/'
    
}

app.set('port', 8090);
app.listen(app.get('port'));
app.use(json({limit: '10mb', extended: true}));
app.use(urlencoded({limit: '10mb', extended: true}));
app.post('/workon', (req, res) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    setTimeout(() => { callDaemon(); }, 10);
    res.send("success");
});
app.post('/isprocessworkon', (req, res) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    if (checkTimer) res.send("success");
    else res.send("done");
});