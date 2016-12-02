var addMenu = 0;
var TimeOut = [1];
var sortTimer;
var ShowHideI = 0;
var GameInfo = 0;
var sortMenuRV = 0;
 
 //start cards scripts
function changeRowsPerPageCards(rowsPerPage) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = rowsPerPage; // $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    //FromGameTs = $('#datetimepicker4I').val();
    //ToGameTs = $('#datetimepicker5I').val();
    //GameSort = $('#GameSortR').val();
    //PSID = $('#PSIDR').val();
    //SeatID = $('#SeatIDR').val();
    //FromGameNum = $('#FromGameNumR').val();
    //ToGameNum = $('#ToGameNumR').val();
    //FromGameBet = $('#FromGameBetR').val();
    //ToGameBet = $('#ToGameBetR').val();
    //FromGameWin = $('#FromGameWinR').val();
    //ToGameWin = $('#ToGameWinR').val();
    //FromGameJack = $('#FromGameJackR').val();
    //ToGameJack = $('#ToGameJackR').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            //"&FromGameTs=" + FromGameTs + 
            //"&ToGameTs=" + ToGameTs + 
            //"&GameSort=" + GameSort + 
            //"&PSID=" + PSID + 
            //"&SeatID=" + SeatID + 
            //"&FromGameNum=" + FromGameNum + 
            //"&ToGameNum=" + ToGameNum + 
            //"&FromGameBet=" + FromGameBet + 
            //"&ToGameBet=" + ToGameBet + 
            //"&FromGameWin=" + FromGameWin + 
            //"&ToGameWin=" + ToGameWin + 
            //"&FromGameJack=" + FromGameJack + 
            //"&ToGameJack=" + ToGameJack + 
            "')" 
    window.location.href = pageHref; 
}
function changePageNumCards(PageNum1) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = PageNum1 //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    //FromGameTs = $('#datetimepicker4I').val();
    //ToGameTs = $('#datetimepicker5I').val();
    //GameSort = $('#GameSortR').val();
    //PSID = $('#PSIDR').val();
    //SeatID = $('#SeatIDR').val();
    //FromGameNum = $('#FromGameNumR').val();
    //ToGameNum = $('#ToGameNumR').val();
    //FromGameBet = $('#FromGameBetR').val();
    //ToGameBet = $('#ToGameBetR').val();
    //FromGameWin = $('#FromGameWinR').val();
    //ToGameWin = $('#ToGameWinR').val();
    //FromGameJack = $('#FromGameJackR').val();
    //ToGameJack = $('#ToGameJackR').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            //"&FromGameTs=" + FromGameTs + 
            //"&ToGameTs=" + ToGameTs + 
            //"&GameSort=" + GameSort + 
            //"&PSID=" + PSID + 
            //"&SeatID=" + SeatID + 
            //"&FromGameNum=" + FromGameNum + 
            //"&ToGameNum=" + ToGameNum + 
            //"&FromGameBet=" + FromGameBet + 
            //"&ToGameBet=" + ToGameBet + 
            //"&FromGameWin=" + FromGameWin + 
            //"&ToGameWin=" + ToGameWin + 
            //"&FromGameJack=" + FromGameJack + 
            //"&ToGameJack=" + ToGameJack + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortR(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    //FromGameTs = $('#datetimepicker4I').val();
    //ToGameTs = $('#datetimepicker5I').val();
    //GameSort = $('#GameSortR').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            //"&FromGameTs=" + FromGameTs + 
            //"&ToGameTs=" + ToGameTs + 
            //"&GameSort=" + GameSort + 
            //"&PSID=" + PSID + 
            //"&SeatID=" + SeatID + 
            //"&FromGameNum=" + FromGameNum + 
            //"&ToGameNum=" + ToGameNum + 
            "')" 
    window.location.href = pageHref; 
}
 
function sortMenuCards() {
    if (sortMenuRV == 0) {
        $('.CardsSort').show();
        sortMenuRV = 1;
    }else{
        $('.CardsSort').hide();
        sortMenuRV = 0;
        //var d = new Date();
        //var month = d.getMonth()+1;
        //var day = d.getDate();
        //var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        //$('#datetimepicker4').datetimepicker('setEndDate', output );
        //$('#datetimepicker5').datetimepicker('setEndDate', output );
        //$('#datetimepicker5').datetimepicker('setStartDate', "");
        //$('#datetimepicker4I').val("");
        //changePageSortMenuR();
        
    }
    
}
 
 
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
