const express = require('express');
const app = express();
const fs = require('fs');
const bodyParser = require('body-parser');
const rp = require('request-promise');
const mysql      = require('mysql');
const { fstat } = require('fs');
var pool = mysql.createPool({
    connectionLimit : 100,
    host     : '127.0.0.1',
    user     : 'root',
    password : '',
    database: 'nongmao'
});

var filesInProgress, checkTimer;
function scrapeFile(url, filename) {
  rp("http://gggyyy.cn/" + url).then(function(html){ 
    fs.writeFile(filename, html);
    console.log("[Success]", url, filename)
  }).catch(function(err){
    console.log("[Error, ", new Date().toLocaleString(), "]: ", url, filename, err);
  });
}

function callDaemon() {
  filesInProgress = 0;
  if (checkTimer) {
    console.log("-------- Daemon restarted", new Date().toLocaleString(), "--------");
    clearInterval(checkTimer);
    checkTimer = 0;      
  }
  console.log("-------- Daemon started --------");
  console.log("---", new Date().toLocaleString(), "---");

  checkTimer = setInterval(function() {
    if (filesInProgress == 0) {
      console.log("-------- Daemon ended", new Date().toLocaleString(), "--------");
      clearInterval(checkTimer);
      checkTimer = 0;      
    }
  }, 5000);
}

app.set('port', 8090);
app.listen(app.get('port'));
app.use(bodyParser.json({limit: '10mb', extended: true}));
app.use(bodyParser.urlencoded({limit: '10mb', extended: true}));
app.post('/workon', (req, res) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    setTimeout(() => { callDaemon(); }, 10);
    res.send("success");
});