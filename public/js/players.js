var addMenu = 0;
var addMenu2 = 0;
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
    CardID = $('#CardID').val();
    Name = $('#Name').val();
    Level = $('#Level').val();
    FromDeposit = $('#FromDeposit').val();
    ToDeposit = $('#ToDeposit').val();
    FromBankCredit = $('#FromBankCredit').val();
    ToBankCredit = $('#ToBankCredit').val();
    FromBonusPoints = $('#FromBonusPoints').val();
    ToBonusPoints = $('#ToBonusPoints').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&CardID=" + CardID + 
            "&Name=" + Name + 
            "&Level=" + Level + 
            "&FromDeposit=" +FromDeposit + 
            "&ToDeposit=" + ToDeposit + 
            "&FromBankCredit=" +FromBankCredit + 
            "&ToBankCredit=" + ToBankCredit + 
            "&FromBonusPoints=" +FromBonusPoints + 
            "&ToBonusPoints=" + ToBonusPoints + 
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
    CardID = $('#CardID').val();
    Name = $('#Name').val();
    Level = $('#Level').val();
    FromDeposit = $('#FromDeposit').val();
    ToDeposit = $('#ToDeposit').val();
    FromBankCredit = $('#FromBankCredit').val();
    ToBankCredit = $('#ToBankCredit').val();
    FromBonusPoints = $('#FromBonusPoints').val();
    ToBonusPoints = $('#ToBonusPoints').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&CardID=" + CardID + 
            "&Name=" + Name + 
            "&Level=" + Level + 
            "&FromDeposit=" +FromDeposit + 
            "&ToDeposit=" + ToDeposit + 
            "&FromBankCredit=" +FromBankCredit + 
            "&ToBankCredit=" + ToBankCredit + 
            "&FromBonusPoints=" +FromBonusPoints + 
            "&ToBonusPoints=" + ToBonusPoints + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortCards(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    CardID = $('#CardID').val();
    Name = $('#Name').val();
    Level = $('#Level').val();
    FromDeposit = $('#FromDeposit').val();
    ToDeposit = $('#ToDeposit').val();
    FromBankCredit = $('#FromBankCredit').val();
    ToBankCredit = $('#ToBankCredit').val();
    FromBonusPoints = $('#FromBonusPoints').val();
    ToBonusPoints = $('#ToBonusPoints').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&CardID=" + CardID + 
            "&Name=" + Name + 
            "&Level=" + Level + 
            "&FromDeposit=" +FromDeposit + 
            "&ToDeposit=" + ToDeposit + 
            "&FromBankCredit=" +FromBankCredit + 
            "&ToBankCredit=" + ToBankCredit + 
            "&FromBonusPoints=" +FromBonusPoints + 
            "&ToBonusPoints=" + ToBonusPoints + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortMenuCards() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    CardID = $('#CardID').val();
    Name = $('#Name').val();
    Level = $('#Level').val();
    FromDeposit = $('#FromDeposit').val();
    ToDeposit = $('#ToDeposit').val();
    FromBankCredit = $('#FromBankCredit').val();
    ToBankCredit = $('#ToBankCredit').val();
    FromBonusPoints = $('#FromBonusPoints').val();
    ToBonusPoints = $('#ToBonusPoints').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&CardID=" + CardID + 
            "&Name=" + Name + 
            "&Level=" + Level + 
            "&FromDeposit=" +FromDeposit + 
            "&ToDeposit=" + ToDeposit + 
            "&FromBankCredit=" +FromBankCredit + 
            "&ToBankCredit=" + ToBankCredit + 
            "&FromBonusPoints=" +FromBonusPoints + 
            "&ToBonusPoints=" + ToBonusPoints + 
            "')" 
    window.location.href = pageHref; 
}
function cleanSortFunctionCards() {
    $('#CardID').val("");
    $('#Name').val("");
    $('#Level').val("");
    $('#FromDeposit').val("");
    $('#ToDeposit').val("");
    $('#FromBankCredit').val("");
    $('#ToBankCredit').val("");
    $('#FromBonusPoints').val("");
    $('#ToBonusPoints').val("");
    changePageSortMenuCards();
    
}
function sortMenuCards() {
    if (sortMenuRV == 0) {
        $('.CardsSort').show();
        sortMenuRV = 1;
    }else{
        $('.CardsSort').hide();
        sortMenuRV = 0;
        $('#CardID').val("");
        $('#Name').val("");
        $('#Level').val("");
        $('#FromDeposit').val("");
        $('#ToDeposit').val("");
        $('#FromBankCredit').val("");
        $('#ToBankCredit').val("");
        $('#FromBonusPoints').val("");
        $('#ToBonusPoints').val("");
        //changePageSortMenuR();
    }
    
}
function export2excelCards() {
    pageHref = $('#pageReload').attr('data-excel-url');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = $('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    CardID = $('#CardID').val();
    Name = $('#Name').val();
    Level = $('#Level').val();
    FromDeposit = $('#FromDeposit').val();
    ToDeposit = $('#ToDeposit').val();
    FromBankCredit = $('#FromBankCredit').val();
    ToBankCredit = $('#ToBankCredit').val();
    FromBonusPoints = $('#FromBonusPoints').val();
    ToBonusPoints = $('#ToBonusPoints').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&CardID=" + CardID + 
            "&Name=" + Name + 
            "&Level=" + Level + 
            "&FromDeposit=" +FromDeposit + 
            "&ToDeposit=" + ToDeposit + 
            "&FromBankCredit=" +FromBankCredit + 
            "&ToBankCredit=" + ToBankCredit + 
            "&FromBonusPoints=" +FromBonusPoints + 
            "&ToBonusPoints=" + ToBonusPoints ; 
    window.location.href = pageHref; 
}
function ExportToPNGCardsTable() {
    html2canvas($('#panelCardsContend'), {
        onrendered: function(canvas) {
            theCanvas = canvas;
            //document.body.appendChild(canvas);
            $(".faSpinner").show();
            // Convert and download as image 
            Canvas2Image.saveAsPNG(canvas); 
            //document.body.append(canvas);
            // Clean up 
            //document.body.removeChild(canvas);
            $(".faSpinner").hide();
        }
    });
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
                token = $('meta[name="csrf-token"]').attr('content');
                //alert("test");
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
                            $("#CartIDAdd").val("");
                            $("#userName").val("");
                            $("#userAddress").val("");
                            $("#userPhone").val("");
                            $("#cashIn").val("");
                            
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

function AddWithdrawCart() {
    if (addMenu2 == 0){
        $(".rowInputAddWithdraw").show();
        $("#addWithdrawCard").text('Close Add/Withdraw Credit');
        addMenu2 = 1;
    }else{
        $(".rowInputAddWithdraw").hide();
        $("#addWithdrawCard").text('Add/Withdraw Credit');
        addMenu2 = 0;
    }
}
function ReadWithdrawCard() {
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
                        //$("#refreshRNC").hide();
                        //$("#OKRNC").show();
                        //$("#removeRNC").hide();
                        //$("#errorAddWithdrawT").hide();
                        //$("#errorAddWithdraw").hide();
                        //$("#errorAddWithdrawI").hide();
                        //$("#CartIDAddWithdraw").val(data.CartInfo.card_id);
                        //$("#CartIDAddWithdraw").css('color', '#555');
                        //clearTimeout(TimeOut['Add']);
                        //TimeOut['Add'] = setTimeout(function(){ $("#OKRNC").hide(); }, 5000);
                        $("#errorAddWithdrawI").show();
                        $("#errorAddWithdrawT").hide();
                        $("#errorAddWithdraw").hide();
                        $("#refreshRNC").hide();
                        $("#OKRNC").hide();
                        $("#removeRNC").show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC").hide(); }, 5000);
                    }else{
                        $("#errorAddWithdrawI").show();
                        $("#errorAddWithdrawT").hide();
                        $("#errorAddWithdraw").hide();
                        $("#refreshRNC").hide();
                        $("#OKRNC").hide();
                        $("#removeRNC").show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC").hide(); }, 5000);
                    }    
                }else{
                    if (data.error == 1){
                        $("#errorAddWithdrawT").hide();
                        $("#errorAddWithdraw").hide();
                        $("#errorAddWithdrawI").hide();
                        $("#refreshRNC").hide();
                        $("#OKRNC").hide();
                        $("#removeRNC").show();
                        $("#CartIDAddWithdraw").val(data.CartInfo.card_id);
                        $("#userWithdrawName").text(data.userInfo.name);
                        $("#cashInWithdraw").text(data.userInfo.deposit);
                        $("#BankCreditText").text(data.userInfo.bank_credit);
                        $("#BonusPointsText").text(data.userInfo.bonus_points);
                     ///   $("#CartID2Exist").text(data.CartInfo.card_id);
                        //$("#CartIDAddWithdraw").css('color', '#d9534f');
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#OKRNC").hide(); }, 5000);
                    }else{
                        alert (data.error);
                        $("#errorAddWithdrawT").hide();
                        $("#errorAddWithdraw").hide();
                        $("#errorAddWithdrawI").hide();
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
                $("#errorAddWithdrawT").hide();
                $("#errorAddWithdraw").hide();
                $("#errorAddWithdrawI").hide();
                $("#refreshRNC").hide();
                $("#OKRNC").hide();
                $("#removeRNC").show();
                clearTimeout(TimeOut['Add']);
                TimeOut['Add'] = setTimeout(function(){ $("#removeRNC").hide(); }, 5000);
            }
        });
}
function SaveAddWithdrawCard() {
    $("#refreshAddWithdraw").show();
    $("#OKAddWithdraw").hide();
    $("#removeAddWithdraw").hide();
    CartID = $("#CartIDAddWithdraw").val();
    if (CartID != ""){
        $("#errorAddTWithdraw").hide();
        $("#errorAddWithdraw").hide();
        $("#errorAddIWithdraw").hide();
                BankCreditWithdraw = $("#BankCreditWithdraw").val();
                token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'ajax_AddBankCreditCard',
                    dataType: "json",
                    data:{'CartID': CartID, 'AddWithdraw': 1, 'BankCreditWithdraw': BankCreditWithdraw, _token: token},
                    success:function(data){
                        if (data.success == "success"){
                            $("#refreshAddWithdraw").hide();
                            $("#OKAddWithdraw").show();
                            $("#removeAddWithdraw").hide();
                            $(".rowInputAddWithdraw").hide();
                            $("#addWithdrawCard").text('Add/Withdraw Credit');
                            addMenu2 = 0;
                            
                            $("#CartIDAddWithdraw").val("");
                            $("#userWithdrawName").text("");
                            $("#cashInWithdraw").text("");
                            $("#BankCreditText").text("");
                            $("#BonusPointsText").text("");
                            $("#BankCreditWithdraw").val("");
                            $("#BankCredit"  + data.CartInfo.id).text(data.CartInfo.bank_credit);
                            
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#OKAddWithdraw").hide(); }, 5000);
                        }else{
                            alert (data.error);
                            $("#refreshAddWithdraw").hide();
                            $("#OKAddWithdraw").hide();
                            $("#removeAddWithdraw").show();
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#removeAddWithdraw").hide(); }, 5000);
                        }
                    },
                    error: function (error) {
                        alert ("Unexpected wrong.");
                        $("#refreshAddWithdraw").hide();
                        $("#OKAddWithdraw").hide();
                        $("#removeAddWithdraw").show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeAddWithdraw").hide(); }, 5000);
                    }    
                });        
    }else{
        $("#refreshAddWithdraw").hide();
        $("#OKAddWithdraw").hide();
        $("#removeAddWithdraw").show();
        $("#errorAddWithdraw").show();
        $("#errorAddWithdrawT").hide();
        $("#errorAddWithdrawI").hide();
        clearTimeout(TimeOut['AddSave']);
        TimeOut['AddSave'] = setTimeout(function(){ $("#removeAddWithdraw").hide(); }, 5000);
            
    }
}
function SaveWithdrawCard() {
    $("#refreshWithdraw").show();
    $("#OKWithdraw").hide();
    $("#removeWithdraw").hide();
    CartID = $("#CartIDAddWithdraw").val();
    if (CartID != ""){
        $("#errorTWithdraw").hide();
        $("#errorWithdraw").hide();
        $("#errorIWithdraw").hide();
            BankCreditWithdraw = $("#BankCreditWithdraw").val();
            BankCreditText = parseInt($("#BankCreditText").text());
            if (BankCreditText >= BankCreditWithdraw){
                token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'ajax_AddBankCreditCard',
                    dataType: "json",
                    data:{'CartID': CartID, 'AddWithdraw': 2, 'BankCreditWithdraw': BankCreditWithdraw, _token: token},
                    success:function(data){
                        if (data.success == "success"){
                            $("#refreshWithdraw").hide();
                            $("#OKWithdraw").show();
                            $("#removeWithdraw").hide();
                            $("#errorBankCredit").hide();
                            $(".rowInputAddWithdraw").hide();
                            $("#addWithdrawCard").text('Add/Withdraw Credit');
                            addMenu2 = 0;
                            
                            $("#CartIDAddWithdraw").val("");
                            $("#userWithdrawName").text("");
                            $("#cashInWithdraw").text("");
                            $("#BankCreditText").text("");
                            $("#BonusPointsText").text("");
                            $("#BankCreditWithdraw").val("");
                            $("#BankCredit"  + data.CartInfo.id).text(data.CartInfo.bank_credit);
                            
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#OKWithdraw").hide(); }, 5000);
                        }else{
                            alert (data.error);
                            $("#refreshWithdraw").hide();
                            $("#OKWithdraw").hide();
                            $("#removeWithdraw").show();
                            $("#errorBankCredit").hide();
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#removeWithdraw").hide(); }, 5000);
                        }
                    },
                    error: function (error) {
                        alert ("Unexpected wrong.");
                        $("#refreshWithdraw").hide();
                        $("#OKWithdraw").hide();
                        $("#removeWithdraw").show();
                        $("#errorBankCredit").hide();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeWithdraw").hide(); }, 5000);
                    }    
                });
            }else{
                $("#refreshWithdraw").hide();
                $("#OKWithdraw").hide();
                $("#removeWithdraw").show();
                $("#errorBankCredit").show();
                clearTimeout(TimeOut['AddSave']);
                TimeOut['AddSave'] = setTimeout(function(){ $("#removeWithdraw").hide(); }, 5000);
            }    
    }else{
        $("#refreshWithdraw").hide();
        $("#OKWithdraw").hide();
        $("#removeWithdraw").show();
        $("#errorAddWithdraw").show();
        $("#errorAddWithdrawT").hide();
        $("#errorAddWithdrawI").hide();
        clearTimeout(TimeOut['AddSave']);
        TimeOut['AddSave'] = setTimeout(function(){ $("#removeWithdraw").hide(); }, 5000);
            
    }
}

function EditCart(id) {
  $(".row" + id).hide();
  $(".rowInput" + id).show();
}
function ReadNewCard2(id) {
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
                        $("#refreshRNC" + id).hide();
                        $("#OKRNC" + id).show();
                        $("#removeRNC" + id).hide();
                        $("#errorAddT" + id).hide();
                        $("#errorAdd" + id).hide();
                        $("#errorAddI" + id).hide();
                        $("#CartID" + id).val(data.CartInfo.card_id);
                        //$("#CartIDAdd").css('color', '#555');
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#OKRNC" + id).hide(); }, 5000);
                    }else{
                        $("#errorAddI" + id).show();
                        $("#errorAddT" + id).hide();
                        $("#errorAdd" + id).hide();
                        $("#refreshRNC" + id).hide();
                        $("#OKRNC" + id).hide();
                        $("#removeRNC" + id).show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC" + id).hide(); }, 5000);
                    }    
                }else{
                    if (data.error == 1){
                        $("#errorAddT" + id).show();
                        $("#errorAdd" + id).hide();
                        $("#errorAddI" + id).hide();
                        $("#refreshRNC" + id).hide();
                        $("#OKRNC" + id).hide();
                        $("#removeRNC" + id).show();
                        $("#CartIDExist" + id).text(data.CartInfo.card_id);
                        //$("#CartIDAdd").css('color', '#d9534f');
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC" + id).hide(); }, 5000);
                    }else{
                        alert (data.error);
                        $("#errorAddT" + id).hide();
                        $("#errorAdd" + id).hide();
                        $("#errorAddI" + id).hide();
                        $("#refreshRNC" + id).hide();
                        $("#OKRNC" + id).hide();
                        $("#removeRNC" + id).show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeRNC" + id).hide(); }, 5000);        
                    }
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                $("#errorAddT" + id).hide();
                $("#errorAdd" + id).hide();
                $("#errorAddI" + id).hide();
                $("#refreshRNC" + id).hide();
                $("#OKRNC" + id).hide();
                $("#removeRNC" + id).show();
                clearTimeout(TimeOut['Add']);
                TimeOut['Add'] = setTimeout(function(){ $("#removeRNC" + id).hide(); }, 5000);
            }
        });
}
function SaveEditCart(id) {
    $("#refreshEdit"  + id).show();
    $("#OKEdit"  + id).hide();
    $("#removeEdit"  + id).hide();
    CartID = $("#CartID" + id).val();
    userName = $("#name" + id).val();
    
    
    if (CartID != "" ){
        $("#errorAddT" + id).hide();
        $("#errorAdd" + id).hide();
        $("#errorAddI" + id).hide();
            if (userName != ""){
                $("#errorAddUser").hide();
                userAddress = $("#userAddress"  + id).val();
                userPhone = $("#userPhone"  + id).val();
                deposit = $("#cashIn"  + id).val();
                token = $('meta[name="csrf-token"]').attr('content');
                //alert("test");
                $.ajax({
                    type:'POST',
                    url:'ajax_SaveEditCart',
                    dataType: "json",
                    data:{'ID': id, 'CartID': CartID, 'userName': userName, 'userAddress': userAddress, 'userPhone': userPhone, 'deposit': deposit, _token: token},
                    success:function(data){
                        if (data.success == "success"){
                            $("#errorAddUser" + id).hide();
                            $("#refreshEdit" + id).hide();
                            $("#OKEdit" + id).show();
                            $("#removeEdit" + id).hide();
                            $("#CartIDText" + id).text(data.CartInfo.card_id);
                            $("#nameText" + id).text(data.CartInfo.name);
                            $("#cashInText"  + id).text(data.CartInfo.deposit);
                            //$("#example tbody").prepend(data.html);
                            $(".row" + id).show();
                            $(".rowInput" + id).hide();
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#OKEdit" + id).hide(); }, 5000);
                        }else{
                            alert (data.error);
                            $("#errorAddUser"  + id).hide();
                            $("#refreshEdit"   + id).hide();
                            $("#OKEdit"   + id).hide();
                            $("#removeEdit"   + id).show();
                            clearTimeout(TimeOut['Add']);
                            TimeOut['Add'] = setTimeout(function(){ $("#removeEdit"  + id).hide(); }, 5000);
                        }
                    },
                    error: function (error) {
                        alert ("Unexpected wrong.");
                        $("#errorAddUser").hide();
                        $("#refreshEdit").hide();
                        $("#OKEdit").hide();
                        $("#removeEdit").show();
                        clearTimeout(TimeOut['Add']);
                        TimeOut['Add'] = setTimeout(function(){ $("#removeEdit").hide(); }, 5000);
                    }    
                });        

                
                
            }else{
                $("#refreshEdit" + id).hide();
                $("#OKEdit" + id).hide();
                $("#removeEdit" + id).show();
                $("#errorAddUser" + id).show();
                clearTimeout(TimeOut['AddSave']);
                TimeOut['AddSave'] = setTimeout(function(){ $("#removeEdit" + id).hide(); }, 5000);
         
            }
        
        
        
    }else{
        $("#refreshEdit"  + id).hide();
        $("#OKEdit"  + id).hide();
        $("#removeEdit"  + id).show();
        $("#errorAdd"  + id).show();
        $("#errorAddT"  + id).hide();
        $("#errorAddI"  + id).hide();
        clearTimeout(TimeOut['AddSave']);
        TimeOut['AddSave'] = setTimeout(function(){ $("#removeEdit"  + id).hide(); }, 5000);
            
    }
    
   
}

function TransactionsCart(id){
    alert (id);
} 




$(document).on("click","tr.rows2 td", function(e){
    //console.log( $(this).parent("tr").attr('data-id'));
    //boxID = parseInt($(this).parent("tr").attr('data-id'));
    //rowUnique = $(this).parent("tr").attr('data-unique');
    token = $('meta[name="csrf-token"]').attr('content');
    alert ("test");
    /*$.ajax({
        type:'POST',
        url:'ajax_statBingoHistory',
        dataType: "json",
        data:{'boxID': boxID, 'rowUnique': rowUnique, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#bingoPurchase_History').html(data.html);
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });*/

    
});


//end cards scripts
