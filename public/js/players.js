 var addMenu = 0;
 var TimeOut = [1];
 
function AddNewCart() {
    if (addMenu == 0){
        $(".rowInputAdd").show();
        $("#addCard").text('Close Add');
        addMenu = 1;
    }else{
        $(".rowInputAdd").hide();
        $("#addCard").text('Add Card');
        addMenu = 0;
    }
}

function ReadNewCard() {
    CasinoID = $("#currenCasino").attr("data-casino");
    token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url:'ajax_ReadNewCard',
            dataType: "json",
            data:{'CasinoID': CasinoID, _token: token},
            success:function(data){
                if (data.success == "success"){
                    if (data.CartInfo.reader_status == 1){
                        $("#refreshRNC").hide();
                        $("#OKRNC").show();
                        $("#removeRNC").hide();
                        $("#errorAddT").hide();
                        $("#errorAdd").hide();
                        $("#errorAddI").hide();
                        $("#CartIDAdd").val(data.CartInfo.card_id);
                        //$("#CartIDAdd").css('color', '#555');
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#OKRNC").hide(); }, 5000);
                    }else{
                        $("#errorAddI").show();
                        $("#errorAddT").hide();
                        $("#errorAdd").hide();
                        $("#refreshRNC").hide();
                        $("#OKRNC").hide();
                        $("#removeRNC").show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC").hide(); }, 5000);
                    }    
                }else{
                    if (data.error == 1){
                        $("#errorAddT").show();
                        $("#errorAdd").hide();
                        $("#errorAddI").hide();
                        $("#refreshRNC").hide();
                        $("#OKRNC").hide();
                        $("#removeRNC").show();
                        $("#CartIDExist").text(data.CartInfo.card_id);
                        //$("#CartIDAdd").css('color', '#d9534f');
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC").hide(); }, 5000);
                    }else{
                        alert (data.error);
                        $("#errorAddT").hide();
                        $("#errorAdd").hide();
                        $("#errorAddI").hide();
                        $("#refreshRNC").hide();
                        $("#OKRNC").hide();
                        $("#removeRNC").show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC").hide(); }, 5000);        
                    }
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                $("#errorAddT").hide();
                $("#errorAdd").hide();
                $("#errorAddI").hide();
                $("#refreshRNC").hide();
                $("#OKRNC").hide();
                $("#removeRNC").show();
                clearTimeout(TimeOut['Add']);
                TimeOut['Add'] = setTimeout(function(){ $("#removeRNC").hide(); }, 5000);
            }
        });
}


function SaveAddCard() {
    CartIDAdd
    $("#refresh").show();
    $("#OK").hide();
    $("#remove").hide();
    CartID = $("#CartIDAdd").val();
    userName = $("#userName").val();
    
    
    if (CartID != ""){
        $("#errorAddT").hide();
        $("#errorAdd").hide();
        $("#errorAddI").hide();
            if (userName != ""){
                $("#errorAddUser").hide();
                userAddress = $("#userAddress").val();
                userPhone = $("#userPhone").val();
                deposit = $("#cashIn").val();
                alert("test");
                $.ajax({
                    type:'POST',
                    url:'ajax_SaveAddCard',
                    dataType: "json",
                    data:{'CartID': CartID, 'userName': userName, 'userAddress': userAddress, 'userPhone': userPhone, 'deposit': deposit, _token: token},
                    success:function(data){
                        if (data.success == "success"){
                            $("#errorAddUser").hide();
                            $("#refresh").hide();
                            $("#OK").show();
                            $("#remove").hide();
                            $("#example tbody").prepend(data.html);
                            $(".rowInputAdd").hide();
                            $("#addCard").text('Add Card');
                            addMenu = 0;
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#OK").hide(); }, 5000);
                        }else{
                            alert (data.error);
                            $("#errorAddUser").hide();
                            $("#refresh").hide();
                            $("#OK").hide();
                            $("#remove").show();
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#remove").hide(); }, 5000);
                        }
                    },
                    error: function (error) {
                        alert ("Unexpected wrong.");
                        $("#errorAddUser").hide();
                        $("#refresh").hide();
                        $("#OK").hide();
                        $("#remove").show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#remove").hide(); }, 5000);
                    }    
                });        

                
                
            }else{
                $("#refresh").hide();
                $("#OK").hide();
                $("#remove").show();
                $("#errorAddUser").show();
                clearTimeout(TimeOut['AddSave']);
                TimeOut['AddSave'] = setTimeout(function(){ $("#remove").hide(); }, 5000);
         
            }
        
        
        
    }else{
        $("#refresh").hide();
        $("#OK").hide();
        $("#remove").show();
        $("#errorAdd").show();
        $("#errorAddT").hide();
        $("#errorAddI").hide();
        clearTimeout(TimeOut['AddSave']);
        TimeOut['AddSave'] = setTimeout(function(){ $("#remove").hide(); }, 5000);
            
    }
}
