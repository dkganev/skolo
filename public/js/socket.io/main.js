var $messages = $('#inpMassage');
var pageHrefSocket = $('#CasinoCasino').attr('data-url') + ":3000";
//console.log (pageHrefSocket);
var socket = io(pageHrefSocket);

var pageHrefBingoGameStateSocket = $('#CasinoCasino').attr('data-url') + ":3000/game_state";
//console.log (pageHrefSocket);
var socketBingoGameState = io.connect(pageHrefBingoGameStateSocket);
/*
var pageHrefBingoMeinconfSocket = $('#CasinoCasino').attr('data-url') + ":3000/bingoMainconf";
//console.log (pageHrefSocket);
var socketBingoMeinconf = io.connect(pageHrefBingoMeinconfSocket);

var pageHrefbingoPsTicketsSocket = $('#CasinoCasino').attr('data-url') + ":3000/bingoPsTickets";
//console.log (pageHrefSocket);
var socketbingoPsTickets = io.connect(pageHrefbingoPsTicketsSocket);
//var socket = io('http://10.0.0.199:3000');
*/
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
socketBingoGameState.on('new message', function (data) {
    var jsonObj = data.message;
    var obj = $.parseJSON(jsonObj);
    console.log (obj);
    
    if (obj.query == "UPDATE" || obj.query == "INSERT")
    {   
        unique_game_seq = $("#ticket_price").attr('data-unique_game_seq');
        if (unique_game_seq != obj.dataNew.unique_game_seq ){
            $("#ticket_price").attr('data-unique_game_seq', obj.dataNew.unique_game_seq);
            
            $("#jackpot_bingo_max_ball").text(obj.mainconf[0].jackpot_bingo_max_ball);
            $("#jackpot_line_max_ball").text(obj.mainconf[0].jackpot_line_max_ball);
            $("#bonus_bingo_max_ball").text(obj.mainconf[0].bonus_bingo_max_ball);
            $("#bonus_line_max_ball").text(obj.mainconf[0].bonus_line_max_ball);
            
            
            
        }
            
            $("#ticket_price").text(obj.dataNew.ticket_price);
            $("#tickets").text(obj.dataNew.tickets);
            $("#players").text(obj.dataNew.players);
            $("#bingo_value").text(obj.dataNew.bingo_value);
            $("#line_value").text(obj.dataNew.line_value);
            $("#jackpot_bingo").text(obj.dataNew.jackpot_bingo);
            $("#jackpot_line").text(obj.dataNew.jackpot_line);
            $("#my_bonus").text(obj.dataNew.my_bonus);
            $("#bonus_bingo").text(obj.dataNew.bonus_bingo);
            $("#bonus_line").text(obj.dataNew.bonus_line);
    
    
    }else if (obj.query == "DELETE"){
          
    //}else if (obj.query == "INSERT"){
          
    }
});
// Whenever the server emits 'new message', update the chat body
socket.on('new message', function (data) {
      //console.log ("test3");
      //$el = data.username + "--" + data.message;
      //console.log (data.message);
      var jsonObj = data.message;
      var obj = $.parseJSON(jsonObj);
      console.log (obj);
      //console.log (obj.dataNew.psid);
      if (obj.query == "UPDATE")
      {
        //if  (obj.dataNew.bonline == obj.dataOld.bonline){
        //console.log (obj.dataNew.active_errors);
        if (obj.dataNew.active_errors == ""){
            //console.log (obj.dataNew.active_errors);
            if (obj.dataNew.bonline == false)
            {
                if  (obj.dataNew.bonline != obj.dataOld.bonline || obj.dataNew.active_errors != obj.dataOld.active_errors)
                {
                    //valueBtnOffline = parseInt($("#BtnOffline").text()) + 1;
                    //$("#BtnOffline").text(valueBtnOffline);
                    $("#box" + obj.dataNew.psid).css("background-color", "#9c9c9c");
                    valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                    if(valueboxStatus == 'Free' ){
                        valueBtnFree = parseInt($("#BtnFree").text()) - 1;
                        $("#BtnFree").text(valueBtnFree);  
                    }else if(valueboxStatus == 'Active' ){
                        valueBtnActive = parseInt($("#BtnActive").text()) - 1 ;
                        $("#BtnActive").text(valueBtnActive); 
                    }else if(valueboxStatus == 'Call Attend' ){
                        valueCallAttend = parseInt($("#BtnCallAttend").text()) - 1 ;
                        $("#BtnCallAttend").text(valueCallAttend); 
                    }else if(valueboxStatus == 'Error' ){
                        valueErrors = parseInt($("#BtnErrors").text()) - 1 ;
                        $("#BtnErrors").text(valueErrors); 
                    }
                    if(valueboxStatus != 'Offline' ){
                        valueBtnOffline = parseInt($("#BtnOffline").text()) + 1;
                        $("#BtnOffline").text(valueBtnOffline);
                    }
                    $("#box" + obj.dataNew.psid).attr('data_boxStatus','Offline');
                }
            }else 
            {
                if (obj.dataNew.attendant == false)
                {
                    if (obj.dataNew.current_credit == 0)
                    {
                        if  (obj.dataNew.bonline != obj.dataOld.bonline || obj.dataNew.active_errors != obj.dataOld.active_errors || obj.dataNew.attendant != obj.dataOld.attendant || (obj.dataNew.current_credit != obj.dataOld.current_credit && obj.dataNew.current_credit == 0))
                        {
                            $("#box" + obj.dataNew.psid).css("background-color", "#5bc0de");
                            //valueBtnFree = parseInt($("#BtnFree").text()) + 1;
                            //$("#BtnFree").text(valueBtnFree);
                            valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                            if(valueboxStatus == 'Offline' ){
                                valueBtnOffline = parseInt($("#BtnOffline").text()) - 1;
                                $("#BtnOffline").text(valueBtnOffline);  
                            }else if(valueboxStatus == 'Active' ){
                                valueBtnActive = parseInt($("#BtnActive").text()) - 1 ;
                                $("#BtnActive").text(valueBtnActive); 
                            }else if(valueboxStatus == 'Call Attend' ){
                                valueCallAttend = parseInt($("#BtnCallAttend").text()) - 1 ;
                                $("#BtnCallAttend").text(valueCallAttend); 
                            }else if(valueboxStatus == 'Error' ){
                                valueErrors = parseInt($("#BtnErrors").text()) - 1 ;
                                $("#BtnErrors").text(valueErrors); 
                            }
                            
                            if(valueboxStatus != 'Free' ){
                                valueBtnFree = parseInt($("#BtnFree").text()) + 1;
                                $("#BtnFree").text(valueBtnFree);
                            }
                      
                            $("#box" + obj.dataNew.psid).attr('data_boxStatus','Free');
                        
                        }
                    }else
                    {
                        if  (obj.dataNew.bonline != obj.dataOld.bonline || obj.dataNew.active_errors != obj.dataOld.active_errors  || obj.dataNew.attendant != obj.dataOld.attendant || (obj.dataNew.current_credit != obj.dataOld.current_credit && obj.dataOld.current_credit == 0))
                        {
                            $("#box" + obj.dataNew.psid).css("BingoMeinconfbackground-color", "#5cb85c");
                            //valueBtnActive = parseInt($("#BtnActive").text()) + 1 ;
                            //$("#BtnActive").text(valueBtnActive); 
                            valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                            if(valueboxStatus == 'Offline' ){
                                valueBtnOffline = parseInt($("#BtnOffline").text()) - 1;
                                $("#BtnOffline").text(valueBtnOffline);  
                            }else if(valueboxStatus == 'Free' ){
                                valueBtnFree = parseInt($("#BtnFree").text()) - 1 ;
                                $("#BtnFree").text(valueBtnFree); 
                            }else if(valueboxStatus == 'Call Attend' ){
                                valueCallAttend = parseInt($("#BtnCallAttend").text()) - 1 ;
                                $("#BtnCallAttend").text(valueCallAttend); 
                            }else if(valueboxStatus == 'Error' ){
                                valueErrors = parseInt($("#BtnErrors").text()) - 1 ;
                                $("#BtnErrors").text(valueErrors); 
                            }
                            
                            if(valueboxStatus != 'Active' ){
                                valueBtnActive = parseInt($("#BtnActive").text()) + 1 ;
                                $("#BtnActive").text(valueBtnActive); 
                            }
                            $("#box" + obj.dataNew.psid).attr('data_boxStatus','Active');
                        }
                    }
                }else 
                {
                    if  (obj.dataNew.bonline != obj.dataOld.bonline || obj.dataNew.active_errors != obj.dataOld.active_errors || obj.dataNew.attendant != obj.dataOld.attendant ){
                        $("#box" + obj.dataNew.psid).css("background-color", "#ccb2ff");
                        //valueBtnCallAttend = parseInt($("#BtnCallAttend").text()) + 1;
                        //$("#BtnCallAttend").text(valueBtnCallAttend);
                        valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                        if(valueboxStatus == 'Offline' ){
                            valueBtnOffline = parseInt($("#BtnOffline").text()) - 1;
                            $("#BtnOffline").text(valueBtnOffline);  
                        }else if(valueboxStatus == 'Free' ){
                            valueBtnFree = parseInt($("#BtnFree").text()) - 1 ;
                            $("#BtnFree").text(valueBtnFree); 
                        }else if(valueboxStatus == 'Active' ){
                            valueBtnActive = parseInt($("#BtnActive").text()) - 1 ;
                            $("#BtnActive").text(valueBtnActive); 
                        }else if(valueboxStatus == 'Error' ){
                            valueErrors = parseInt($("#BtnErrors").text()) - 1 ;
                            $("#BtnErrors").text(valueErrors); 
                        }
                        
                        if(valueboxStatus != 'Call Attend' ){
                            valueBtnCallAttend = parseInt($("#BtnCallAttend").text()) + 1;
                            $("#BtnCallAttend").text(valueBtnCallAttend);
                        }
                        $("#box" + obj.dataNew.psid).attr('data_boxStatus','Call Attend');
                    }        
                }
          
            };
        }else
        {
            if  (obj.dataNew.active_errors != obj.dataOld.active_errors  && obj.dataOld.active_errors == "" ){
                //valueBtnErrors = parseInt($("#BtnErrors").text()) + 1;
                //$("#BtnErrors").text(valueBtnErrors);
                $("#box" + obj.dataNew.psid).css("background-color", "#d9534f");
                valueboxStatus = $("#box" + obj.dataNew.psid).attr('data_boxStatus');
                if(valueboxStatus == 'Free' ){
                    valueBtnFree = parseInt($("#BtnFree").text()) - 1;
                    $("#BtnFree").text(valueBtnFree);  
                }else if(valueboxStatus == 'Active' ){
                    valueBtnActive = parseInt($("#BtnActive").text()) - 1 ;
                    $("#BtnActive").text(valueBtnActive); 
                }else if(valueboxStatus == 'Call Attend' ){
                    valueCallAttend = parseInt($("#BtnCallAttend").text()) - 1 ;
                    $("#BtnCallAttend").text(valueCallAttend); 
                }else if(valueboxStatus == 'Offline' ){
                    valueOffline = parseInt($("#BtnOffline").text()) - 1 ;
                    $("#BtnOffline").text(valueOffline); 
                } 
                
                if(valueboxStatus != 'Error' ){
                    valueBtnErrors = parseInt($("#BtnErrors").text()) + 1;
                    $("#BtnErrors").text(valueBtnErrors);
                }
                $("#box" + obj.dataNew.psid).attr('data_boxStatus','Error');
            } 
        };
        
        if  (obj.dataNew.current_credit != obj.dataOld.current_credit){
            //boxCdreditNum = parseInt(obj.dataNew.current_credit)/100;
            //console.log(boxCdreditNum);
            //console.log((parseInt(obj.dataNew.current_credit)/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            $("#box" + obj.dataNew.psid + " .boxCdredit").text((parseInt(obj.dataNew.current_credit)/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
           
            //$("#box" + obj.dataNew.psid + " #boxCdredit").text(100);
        }
        if  (obj.dataNew.current_bet != obj.dataOld.current_bet){
            //$("#box" + obj.dataNew.psid + " .boxBet").text(( parseInt(obj.dataNew.current_bet)/100).toFixed(2));
            $("#box" + obj.dataNew.psid + " .boxBet").text((parseInt(obj.dataNew.current_bet)/100).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        }
        if  (obj.dataNew.current_game_i != obj.dataOld.current_game_i){
            idGame = obj.dataNew.current_game_i;
            if (idGame == 0){
                //$server_ps[$key]['current_game'] = "";
                //$server_ps[$key]['current_game_color'] ="transperant";
                $("#box" + obj.dataNew.psid + " .shortName").text("");
                $("#box" + obj.dataNew.psid + " .shortNameColor").css("background-color",'inherit');
            }else{
                token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'ajax_NewGame',
                    dataType: "json",
                    data:{'idGame': idGame , _token: token},
                    success:function(data){
                        if (data.success == "success"){
                            //short_name shortName
                            $("#box" + obj.dataNew.psid + " .shortName").text(data.short_name);
                            $("#box" + obj.dataNew.psid + " .shortNameColor").css("background-color",data.color);
                        }
                    },
                    error: function (error) {
                        //alert ("Unexpected wrong.");
                    }
        
                });
            }
            //$("#box" + obj.dataNew.psid + " .boxBet").text(( parseInt(obj.dataNew.current_bet)/100).toFixed(2));
        }
        
          
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