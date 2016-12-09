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
        $("#socketConect").attr('style', 'background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(76, 76, 76, 1) 0%, rgba(89, 89, 89, 1) 12%, rgba(102, 102, 102, 1) 25%, rgba(71, 71, 71, 1) 39%, rgba(44, 44, 44, 1) 46%, rgba(0, 0, 0, 1) 51%, rgba(44, 44, 44, 1) 55%, rgba(17, 17, 17, 1) 60%, rgba(43, 43, 43, 1) 76%, rgba(28, 28, 28, 1) 91%, rgba(19, 19, 19, 1) 100%) repeat scroll 0 0 !important;'); 
        ////style.setProperty('background', '#fff', 'important');  //style.setProperty( 'height', '0px', 'important' )
        //$("#socketConect").css({'background-image': 'linear-gradient(to bottom,#f5f5f5 0%,#e8e8e8 100%)'});
        //background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(76, 76, 76, 1) 0%, rgba(89, 89, 89, 1) 12%, rgba(102, 102, 102, 1) 25%, rgba(71, 71, 71, 1) 39%, rgba(44, 44, 44, 1) 46%, rgba(0, 0, 0, 1) 51%, rgba(44, 44, 44, 1) 55%, rgba(17, 17, 17, 1) 60%, rgba(43, 43, 43, 1) 76%, rgba(28, 28, 28, 1) 91%, rgba(19, 19, 19, 1) 100%) repeat scroll 0 0 !important;
        $("#socketConectRealtime").text('Start Real Time');
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
        TotalIn = parseInt($('#TotalIn').attr("data-total"));
        TotalOut = parseInt($('#TotalOut').attr("data-total"));
        TotalBet = parseInt($('#TotalBet').attr("data-total"));
        TotalWin = parseInt($('#TotalWin').attr("data-total"));
        TotalCredit = parseInt($('#TotalCredit').attr("data-total"));
        TotalInOld  = obj.dataOld.counter[11] + obj.dataOld.counter[23] + obj.dataOld.counter[121]; //parseInt($('#TotalIn' + obj.dataNew.psid).text());
        TotalOutOld = obj.dataOld.counter[2] + obj.dataOld.counter[3] + obj.dataOld.counter[22] + obj.dataOld.counter[24]; //parseInt($('#TotalOut' + obj.dataNew.psid).text());
        TotalBetOld = obj.dataOld.counter[0]; //parseInt($('#TotalBet' + obj.dataNew.psid).text());
        TotalWinOld = obj.dataOld.counter[34]; //parseInt($('#TotalWin' + obj.dataNew.psid).text());
        TotalCreditOld = obj.dataOld.counter[12]; //parseInt($('#TotalCredit' + obj.dataNew.psid).text());
        TotalInNew = obj.dataNew.counter[11] + obj.dataNew.counter[23] + obj.dataNew.counter[21];
        TotalOutNew = obj.dataNew.counter[2] + obj.dataNew.counter[3] + obj.dataNew.counter[22] + obj.dataNew.counter[24];
        TotalBetNew = obj.dataNew.counter[0];
        TotalWinNew = obj.dataNew.counter[34]; // + obj.dataNew.counter[28] + obj.dataNew.counter[29];
        TotalCreditNew = obj.dataNew.counter[12]; //TotalInNew + TotalWinNew - TotalBetNew - TotalOutNew;
        
        if (TotalInOld != TotalInNew){
            $('#TotalIn' + obj.dataNew.psid).text((TotalInNew/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            $('#TotalIn' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalInTimeOut[obj.dataNew.psid]);
            TotalInTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalIn' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalIn1 = TotalIn - TotalInOld + TotalInNew ;
            $('#TotalIn').attr("data-total", TotalIn1);
            $('#TotalIn').text((TotalIn1/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            //$('#TotalIn').text(TotalInNew);
        }
        if (TotalOutOld != TotalOutNew){
            $('#TotalOut' + obj.dataNew.psid).text((TotalOutNew/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            $('#TotalOut' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalOutTimeOut[obj.dataNew.psid]);
            TotalOutTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalOut' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalOut = TotalOut - TotalOutOld + TotalOutNew ;
            $('#TotalOut').attr("data-total", TotalOut);
            $('#TotalOut').text((TotalOut/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        }
        if (TotalBetOld != TotalBetNew){
            $('#TotalBet' + obj.dataNew.psid).text((TotalBetNew/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            $('#TotalBet' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalBetTimeOut[obj.dataNew.psid]);
            TotalBetTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalBet' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalBet = TotalBet - TotalBetOld + TotalBetNew ;
            $('#TotalBet').attr("data-total", TotalBet);
            $('#TotalBet').text((TotalBet/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        }
        if (TotalWinOld != TotalWinNew){
            $('#TotalWin' + obj.dataNew.psid).text((TotalWinNew/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            $('#TotalWin' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalWinTimeOut[obj.dataNew.psid]);
            TotalWinTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalWin' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalWin = TotalWin - TotalWinOld + TotalWinNew ;
            $('#TotalWin').attr("data-total", TotalWin);
            $('#TotalWin').text((TotalWin/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        }
        if (TotalCreditOld != TotalCreditNew){
            $('#TotalCredit' + obj.dataNew.psid).text((TotalCreditNew/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            $('#TotalCredit' + obj.dataNew.psid).css({'color': 'red'});
            clearTimeout(TotalCreditTimeOut[obj.dataNew.psid]);
            TotalCreditTimeOut[obj.dataNew.psid] = setTimeout(function(){ $('#TotalCredit' + obj.dataNew.psid).css({'color': '#333'}); }, 20000);
            TotalCredit = TotalCredit - TotalCreditOld + TotalCreditNew ;
            $('#TotalCredit').attr("data-total", TotalCredit);
            $('#TotalCredit').text((TotalCredit/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        }
        //$("#tr" + obj.dataNew.psid).css({'background-color': 'red'}); 
       
    } else if (obj.query == "DELETE") {
        //
    } else if (obj.query == "INSERT") {
        //
    }  
    
 });    