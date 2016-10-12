/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//alert ("test");
var $messages = $('#inpMassage');
var socket = io('http://localhost:3000');

  socket.on('news', function (data) {
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
      console.log (obj.id);
      if (obj.bonline == "false"){
          $("#box" + obj.id).css("background-color", "#ff0000")
          
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