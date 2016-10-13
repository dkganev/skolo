/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//alert ("test");
var $messages = $('#inpMassage');
var socket = io('http://10.0.0.156:3000');

  socket.on('news', function (data) {
    console.log ("test222");
    console.log(data);
    socket.emit('my other event', { my: 'data' });
  });
   // Whenever the server emits 'user joined', log it in the chat body
  socket.on('user joined', function (data) {
        console.log ("test1");
        data.usermane = "CMS"
        log(data.username + ' joined');
        addParticipantsMessage(data);
  });
  // Whenever the server emits 'typing', show the typing message
  socket.on('typing', function (data) {
    console.log ("test2");
      addChatTyping(data);
  });
  // Whenever the server emits 'new message', update the chat body
  socket.on('new message', function (data) {
      //console.log ("test3");
      //$el = data.username + "--" + data.message;
      //console.log (data.message);
      var jsonObj = data.message;
      var obj = $.parseJSON(jsonObj);
      console.log (obj);
      console.log (obj.dataNew.psid);
      if (obj.query == "UPDATE"){
        //if  (obj.dataNew.bonline == obj.dataOld.bonline){
            if (obj.dataNew.bonline == false){
                if  (obj.dataNew.bonline != obj.dataOld.bonline){
                    valueBtnOffline = parseInt($("#BtnOffline").text()) + 1;
                    $("#BtnOffline").text(valueBtnOffline);
                    $("#box" + obj.dataNew.psid).css("background-color", "#9c9c9c");
                    valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                    if(valueboxStatus == 'Free' ){
                        valueBtnFree = parseInt($("#BtnFree").text()) - 1;
                        $("#BtnFree").text(valueBtnFree);  
                    }else if(valueboxStatus == 'Active' ){
                        valueBtnActive = parseInt($("#BtnActive").text()) - 1 ;
                        $("#BtnActive").text(valueBtnActive); 
                    }
                    $("#box" + obj.dataNew.psid).attr('data_boxStatus','Offline');
                }
            }else {
                if (obj.dataNew.current_credit == 0){
                    if  (obj.dataNew.bonline != obj.dataOld.bonline){
                        $("#box" + obj.dataNew.psid).css("background-color", "#5bc0de");
                        valueBtnFree = parseInt($("#BtnFree").text()) + 1;
                        $("#BtnFree").text(valueBtnFree);
                        valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                        if(valueboxStatus == 'Offline' ){
                            valueBtnOffline = parseInt($("#BtnOffline").text()) - 1;
                            $("#BtnOffline").text(valueBtnOffline);  
                        }else if(valueboxStatus == 'Active' ){
                            valueBtnActive = parseInt($("#BtnActive").text()) - 1 ;
                            $("#BtnActive").text(valueBtnActive); 
                        }
                      
                        $("#box" + obj.dataNew.psid).attr('data_boxStatus','Free');
                        
                    }
                }else{
                    if  (obj.dataNew.bonline != obj.dataOld.bonline){
                        $("#box" + obj.dataNew.psid).css("background-color", "#5cb85c");
                        valueBtnActive = parseInt($("#BtnActive").text()) + 1 ;
                        $("#BtnActive").text(valueBtnActive); 
                        valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                        if(valueboxStatus == 'Offline' ){
                            valueBtnOffline = parseInt($("#BtnOffline").text()) - 1;
                            $("#BtnOffline").text(valueBtnOffline);  
                        }else if(valueboxStatus == 'Free' ){
                            valueBtnFree = parseInt($("#BtnFree").text()) - 1 ;
                            $("#BtnFree").text(valueBtnFree); 
                        }
                        $("#box" + obj.dataNew.psid).attr('data_boxStatus','Active');
                    }
                }
          
            };
        //};
          
      }else if (obj.query == "DELETE"){
          
      }else if (obj.query == "INSERT"){
          
      }
      //$messages.val($el);
      //socket.disconnect();
    //addChatMessage(data);data.username
    
  });
  function addChatTyping (data) {
    data.typing = true;
    data.message = 'is typing';
    //addChatMessage(data);
    $messages.val(data.message);
    
  }
  function addParticipantsMessage (data) {
    var message = '';
    if (data.numUsers === 1) {
      message += "there's 1 participant";
    } else {
      message += "there are " + data.numUsers + " participants";
    }
    log(message);
  }
  function log (message, options) {
    //var $el = $('<li>').addClass('log').text(message);
    $el = message;
    $messages.val($el);
    //addMessageElement($el, options);
  }