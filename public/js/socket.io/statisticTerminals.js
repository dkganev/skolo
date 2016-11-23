var $messages = $('#inpMassage');
var pageHrefSocket = $('#MachineStatistics').attr('data-url') + ":3000/counters";
//console.log (pageHrefSocket);
var socket = io.connect(pageHrefSocket);
//var socket = io.connect('http://10.0.0.199:3000/counters');
//var socket = io('/my-namespace');
socket.disconnect();
var sockStatus = 0;

function socketConect() {
    if (sockStatus == 0) {
        //pageHref ='javascript:ajaxLoad("http://10.0.0.156:8020/statistics/terminals")';
        pageHref = $('#MachineStatistics').attr('href');
        //socket.connect();
        sockStatus = 1;
        //console.log ("Conect"); //socketConect  background-color: #f5f5f5;
        //$("#socketConect").css({'background-image': 'linear-gradient(to bottom,#5cb85c 0%,#419641 100%)'});
        window.location.href = pageHref;
    }else{
        socket.disconnect();
        sockStatus = 0;
        console.log ("Disconect");
        $("#socketConect").css({'background-image': 'linear-gradient(to bottom,#f5f5f5 0%,#e8e8e8 100%)'});
    }
}

var TotalInTimeOut = [1];
var TotalOutTimeOut = [1];
var TotalBetTimeOut = [1];
var TotalWinTimeOut = [1];
var TotalCreditTimeOut = [1];

socket.on('new message', function (data) {
    //console.log ("test3");
    //$el = data.username + "--" + data.message;
    //console.log (data.message);
    var jsonObj = data.message;
    var obj = $.parseJSON(jsonObj);
    console.log (obj);
    if (obj.query == "UPDATE") {
        TotalIn = parseInt($('#TotalIn').text());
        TotalOut = parseInt($('#TotalOut').text());
        TotalBet = parseInt($('#TotalBet').text());
        TotalWin = parseInt($('#TotalWin').text());
        TotalCredit = parseInt($('#TotalCredit').text());
        TotalInOld  = parseInt($('#TotalIn' + obj.dataNew.psid).text());
        TotalOutOld = parseInt($('#TotalOut' + obj.dataNew.psid).text());
        TotalBetOld = parseInt($('#TotalBet' + obj.dataNew.psid).text());
        TotalWinOld = parseInt($('#TotalWin' + obj.dataNew.psid).text());
        TotalCreditOld = parseInt($('#TotalCredit' + obj.dataNew.psid).text());
        TotalInNew = obj.dataNew.counter[199] + obj.dataNew.counter[20] + obj.dataNew.counter[12];
        TotalOutNew = obj.dataNew.counter[202] + obj.dataNew.counter[21] + obj.dataNew.counter[23];
        TotalBetNew = obj.dataNew.counter[0];
        TotalWinNew = obj.dataNew.counter[27] + obj.dataNew.counter[28] + obj.dataNew.counter[29];
        TotalCreditNew = TotalInNew + TotalWinNew - TotalBetNew - TotalOutNew;
        
        if (TotalInOld != TotalInNew){
            $('#TotalIn' + obj.dataNew.psid).text(TotalInNew);
            $('#TotalIn' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalInTimeOut[obj.dataNew.psid]);
            TotalInTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalIn' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalIn1 = TotalIn - TotalInOld + TotalInNew ;
            $('#TotalIn').text(TotalIn1);
        }
        if (TotalOutOld != TotalOutNew){
            $('#TotalOut' + obj.dataNew.psid).text(TotalOutNew);
            $('#TotalOut' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalOutTimeOut[obj.dataNew.psid]);
            TotalOutTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalOut' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalOut = TotalOut - TotalOutOld + TotalOutNew ;
            $('#TotalOut').text(TotalOut);
        }
        if (TotalBetOld != TotalBetNew){
            $('#TotalBet' + obj.dataNew.psid).text(TotalBetNew);
            $('#TotalBet' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalBetTimeOut[obj.dataNew.psid]);
            TotalBetTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalBet' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalBet = TotalBet - TotalBetOld + TotalBetNew ;
            $('#TotalBet').text(TotalBet);
        }
        if (TotalWinOld != TotalWinNew){
            $('#TotalWin' + obj.dataNew.psid).text(TotalWinNew);
            $('#TotalWin' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalWinTimeOut[obj.dataNew.psid]);
            TotalWinTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalWin' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalWin = TotalWin - TotalWinOld + TotalWinNew ;
            $('#TotalWin').text(TotalWin);
        }
        if (TotalCreditOld != TotalCreditNew){
            $('#TotalCredit' + obj.dataNew.psid).text(TotalCreditNew);
            $('#TotalCredit' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalCreditTimeOut[obj.dataNew.psid]);
            TotalCreditTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalCredit' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalCredit = TotalCredit - TotalCreditOld + TotalCreditNew ;
            $('#TotalCredit').text(TotalCredit);
        }
        //$("#tr" + obj.dataNew.psid).css({'background-color': 'red'});
       
    } else if (obj.query == "DELETE") {
        //
    } else if (obj.query == "INSERT") {
        //
    }  
    
 });    