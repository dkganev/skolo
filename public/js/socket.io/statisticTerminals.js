var $messages = $('#inpMassage');
var socket = io.connect('http://10.0.0.199:3000');
socket.disconnect();
var sockStatus = 0;

function socketConect() {
    if (sockStatus == 0) {
        socket.connect();
        sockStatus = 1;
        console.log ("Conect"); //socketConect  background-color: #f5f5f5;
        $("#socketConect").css({'background-image': 'linear-gradient(to bottom,#5cb85c 0%,#419641 100%)'});
    }else{
        socket.disconnect();
        sockStatus = 0;
        console.log ("Disconect");
        $("#socketConect").css({'background-image': 'linear-gradient(to bottom,#f5f5f5 0%,#e8e8e8 100%)'});
    }
}
function socketDisconect() {
    //var socket = io('http://10.0.0.199:3000');
}



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