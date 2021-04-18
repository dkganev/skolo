var $messages = $('#inpMassage');
var pageHrefSocket = $('#TerminalsSettings').attr('data-url') + ":3000";
//console.log (pageHrefSocket);
var socket = io(pageHrefSocket);
//var socket = io('http://10.0.0.199:3000');

socket.on('new message', function (data) {
    //console.log ("test3");
    //$el = data.username + "--" + data.message;
    //console.log (data.message);
    var jsonObj = data.message;
    var obj = $.parseJSON(jsonObj);
    console.log (obj);
    //console.log (obj.dataNew.psid);
    if (obj.query == "UPDATE") {
        if (obj.dataNew.bonline == false) {
            $("#Status" + obj.dataNew.psid).css("color", "red");
            $("#Status" + obj.dataNew.psid).html('Offline');
        }
        else {
            $("#Status" + obj.dataNew.psid).css("color", "green");
            $("#Status" + obj.dataNew.psid).html('Online');
        }
    } else if (obj.query == "DELETE") {
        //
    } else if (obj.query == "INSERT") {
        //
    }  
    
 });    

