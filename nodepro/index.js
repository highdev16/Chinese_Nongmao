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
var processTimer, processingText;

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
        if (!isProgressing) return;
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
    processingText = "Getting domain...";
    if (checkTimer) {
        writeFile(logFile,"-------- Daemon restarted " + new Date().toLocaleString() + "--------\n", {flag: 'a'}, ()=>{});          
        clearInterval(checkTimer);
        checkTimer = 0;            
    }   
    clearInterval(processTimer);  

    filesInProgress = 0;
    isProgressing = 1;    
    CheckLocalhost(function(domain) {
        processingText = "Starting in 10 seconds...";
        setTimeout(() => {
            if (!isProgressing) return;
            processingText = "Just started. Processing now...";
            logFile = "Log_" + new Date().getFullYear() + "-" + make2(new Date().getMonth() + 1) + "-" + make2(new Date().getDate()) + "-" + make2(new Date().getHours()) + "-"
                + make2(new Date().getMinutes()) + "-" + make2(new Date().getSeconds()) + ".txt";
            writeFile(logFile,"-------- Daemon started --------\n--- " + new Date().toLocaleString() + " ---\n",{flag: 'a'}, ()=>{});    
            processFiles(domain);
        }, 10000);    
    })  
}
var urlIndex = 0;
var urlList = [];
function processFiles(domain) {
    urlList = [];
    urlList.push(["/N1/p1.php", "/index.html"]); //should start path with '/'
    urlList.push(["/N1/p5.php", "/sj/sjhz.html"]);
    urlList.push(["/N1/p6.php", "/sj/zfhz.html"]);
    urlList.push(["/N5/p37.php", "/sj/nmscdw.html"]);
    urlList.push(["/N2/p10.php", "/yyms.html"]);
    urlList.push(["/N2/p11.php", "/nmyy/nmzs.html"]);
    urlList.push(["/N2/p12.php", "/nmyy/nmds.html"]);
    urlList.push(["/N3/p13.php", "/nmyy/nmzht.html"]);
    urlList.push(["/N3/p14.php", "/nmyy/cyjj.html"]);
    urlList.push(["/N3/p17.php", "/zn/znsb.html"]);
    urlList.push(["/N3/p18.php", "/zn/znrj.html"]);
    urlList.push(["/N3/p19.php", "/zn/csyy.html"]);
    urlList.push(["/N4/p21.php", "/tz.html"]);
    urlList.push(["/N4/p22.php", "/rz.html"]);
    urlList.push(["/N4/p23.php", "/zhengfu.html"]);
    urlList.push(["/N4/p24.php", "/gyzy.html"]);
    urlList.push(["/N4/p34.php", "/about/certify.html"]);
    urlList.push(["/N5/p35.php", "/about/contact.html"]);
    urlList.push(["/N5/p36.php", "/about/index.html"]);
    urlList.push(["/N1/p2.php?category=1", "/zxsj/index.html"]);
    urlList.push(["/N1/p2.php?category=2", "/jzsj/index.html"]);
    urlList.push(["/N1/p2.php?category=3", "/znsj/index.html"]);
    urlList.push(["/N1/p20.php?category=4", "/nmyy/index.html"]);


    urlIndex = 0;
    processTimer = setInterval(function() {
        if (!isProgressing) return;
        scrapeFile(domain, urlList[urlIndex][0], urlList[urlIndex][1]);
        if (++urlIndex == urlList.length) {
            clearInterval(processTimer);
            setTimeout(function() {
                writeFile(logFile,"\n\n-------- Daemon ended --------\n--- " + new Date().toLocaleString() + " ---\n\n\n\n",{flag: 'a'}, ()=>{});        
                processingText = "Ended...";
            });            
            clearInterval(checkTimer);
            checkTimer = 0;      
            isProgressing = 0;
            processTimer = 0;
            processingText = "Ending...";
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
    if (checkTimer || isProgressing) 
        res.send(JSON.stringify({ 
            result: 'success', 
            totalCount: urlList.length, 
            currentIndex: urlIndex, 
            filesInProgress, 
            processingText
        }));
    else res.send("done");
});

app.all('/cancelworkon', (req, res) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    clearInterval(processTimer);
    clearInterval(checkTimer);
    isProgressing = 0;
    checkTimer = 0;
    processTimer = 0;
    urlIndex = 0;
    urlList = [];
    filesInProgress = 0;
    processingText = "";
    writeFile(logFile,"\n\n-------- Daemon escaped by admin --------\n--- " + new Date().toLocaleString() + " ---\n\n\n\n",{flag: 'a'}, ()=>{});        
    res.send("OK");    
});