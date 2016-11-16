var firstClick = 0;
$(document).on("click","tr.rows td", function(e){
    //console.log( $(this).parent("tr").attr('data-id'));
    boxID = parseInt($(this).parent("tr").attr('data-id'));
    rowUnique = $(this).parent("tr").attr('data-unique');
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
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
        
    });

    
});
function boxModalWindow2(bingo_seq, unique_game_seq, psid) {
    $(".faSpinnerBingo").show(); //BJHistory_modal opacity: 0.5;
    //$('#bingoHistory2_modal').hide();
    //$('#bingoHistory_modal').hide();
    $('#bingoTickets_History').hide();
    $('#balsHistory').hide();
    $('#psTicketsArchive').hide();
    $('#bingoHistory2_modal').css('opacity', 0.3);
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_statBingoHistoryTickets',
        dataType: "json",
        data:{'bingo_seq': bingo_seq, 'unique_game_seq': unique_game_seq, "psid": psid, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#ticketNumber').html(data.server_ps_seatid);
                $('#gameNumber').html(bingo_seq);
                $('#balsHistory').html(data.BingoBallsHTML);
                $('#psTicketsArchive').html(data.psTicketsArchiveHTML);
                
                $('#bingoTickets_History').html(data.html);
                $(".faSpinnerBingo").hide();
                $('#bingoTickets_History').show();
                $('#balsHistory').show();
                $('#psTicketsArchive').show();
                $('#bingoHistory2_modal').css('opacity', 1);
                //$('#bingoHistory2_modal').show();
                //$('#bingoHistory_modal').show();
                //alert(boxID); balsHistory
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $(".faSpinnerBingo").hide();
        }
        
    });
    
}
$(document).on("click","tr.rowsR td", function(e){
    wTop = $(window).height() / 2;
    wLeft = $(window).width() / 2;
    $(".faSpinner").css('top', wTop );
    $(".faSpinner").css("left", wLeft);
    $(".faSpinner").show();
    rowID = parseInt($(this).parent("tr").attr('data-id'));
    rowTS = $(this).parent("tr").attr('data-ts');
    rowIds = $(this).parent("tr").attr('data-Ids');
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_statRouletteHistory',
        dataType: "json",
        data:{'rowID': rowID, 'rowTS': rowTS, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#roulettePic').html(data.html); //seatid
                $('#rouletteHead').html(data.seatid);
                $('#winNumber').html(data.winNumber);
                $('#totalBet').html(data.totalBet);
                $('#totalWin').html(data.totalWin);
                $('#gameIDArrowR').html(data.gameIDArrow);
                $('#jackpotWon').html(data.jackpotWon);
                $('#next-prevR').attr("data-Id", rowIds);
                $('#next-prevR').attr("data-ts", rowTS);
                
                $(".faSpinner").hide();
                
            }
            $(".faSpinner").hide();
        },
        error: function (error) {
            alert ("Unexpected wrong.");
             $(".faSpinner").hide();
        }
        
    });

    
});    

$(document).on("click","tr.rowsBJ td", function(e){
    //wTop = $(window).height() / 2;
    //wLeft = $(window).width() / 2;
    //$(".faSpinner").css('top', wTop );
    //$(".faSpinner").css("left", wLeft);data-table
    $(".faSpinnerBJ").show();
    $('#BJcards').hide();
    rowID = parseInt($(this).parent("tr").attr('data-id'));
    rowTS = $(this).parent("tr").attr('data-ts');
    rowTable = $(this).parent("tr").attr('data-table');
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_statBJHistory',
        dataType: "json",
        data:{'rowID': rowID, 'rowTS': rowTS, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#BJcards').html(data.html); //seatid
                $('#BJHead').html(data.seatid);
                $('#totalBet').html(data.totalBet);
                $('#totalWin').html(data.totalWin);
                $('#gameIDArrow').html(data.gameIDArrow);
                $('#next-prev').attr("data-table", rowTable);
                $('#next-prev').attr("data-ts", rowTS);
                $(".faSpinnerBJ").hide();
                $('#BJcards').show();
                
            }
            $(".faSpinnerBJ").hide();
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $(".faSpinnerBJ").hide();
            
        }
        
    });

    
}); 


var sortTimer;

           
//ModalEx clickModalWindow
//$("#ModalEx").click(function(){
//    alert("The paragraph was clicked.");
//});


function ExportToPNGBingoT() {
    html2canvas($('#bingoHistory2_modal'), {
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
function ExportToPNGBingo() {
    html2canvas($('#bingoHistory_modal'), {
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
//$("#ShowHide").click(function(){
//    alert("The paragraph was clicked.");
//});

var ShowHideI = 0;
var GameInfo = 0;
var sortMenuRV = 0;
function ShowHide() {
    if (ShowHideI == 0) {
        $('#ShowHideUl').show();
        ShowHideI = 1;
        //$('#example').bootstrapTable("hideColumn", 'id');
        //$('.GameInfo').attr("colspan", 4);
        //$('.tbleGame').hide();
        //ShowHideBingo()
        //if ($('#checkbox1').is(':checked')){
            //alert('test');
        //}
        
    }else{
        $('#ShowHideUl').hide();
        ShowHideI = 0;
        //$('#example').bootstrapTable("showColumn", 'id');
        //$('.GameInfo').attr("colspan", 5);
        //$('.tbleGame').show();
        //ShowHideBingo()
        
    }
};

function ShowHideBingo() {
    GameInfo = 0;
    if ($('#checkbox1').is(':checked')){
        $('#example').bootstrapTable("showColumn", 'id1');
        $('#example').bootstrapTable("showColumn", 'id1');
        $('.tbleGame').show();
        GameInfo += 1;
    }else{
        $('#example').bootstrapTable("hideColumn", 'id1');
        $('#example').bootstrapTable("hideColumn", 'id22');
        
        $('.tableTh2').hide();
        $('.tableTh2').attr("colspan", 0);
    };
    if ($('#checkbox2').is(':checked')){ $('#example').bootstrapTable("showColumn", 'id2'); $('.tableTh2').show(); GameInfo += 1; } else { $('.tableTh2').hide();  $('#example').bootstrapTable("hideColumn", 'id2'); $('.tableTh2').hide(); };
    if ($('#checkbox3').is(':checked')){ $('#example').bootstrapTable("showColumn", 'id3'); $('.tableTh3').show(); GameInfo += 1; } else { $('#example').bootstrapTable("hideColumn", 'id3'); $('.tableTh3').hide(); };
    if ($('#checkbox4').is(':checked')){ $('#example').bootstrapTable("showColumn", 'id4'); $('.tableTh4').show(); GameInfo += 1; } else { $('#example').bootstrapTable("hideColumn", 'id4'); $('.tableTh4').hide(); };
    if ($('#checkbox5').is(':checked')){ $('#example').bootstrapTable("showColumn", 'id5'); $('.tableTh5').show(); GameInfo += 1; } else { $('#example').bootstrapTable("hideColumn", 'id5'); $('.tableTh5').hide(); };
    if (GameInfo == 0){
        $('.GameInfo').hide();
    }else{
        $('.GameInfo').show();
        $('.GameInfo').attr("colspan", GameInfo);
    }
    
    
    
    //Line  Bingo  MyBonus  BonusLine  BonusBingo  JackpotLine JackpotBingo
    //GameInfo += $('#checkbox1').is(':checked') ? 1 : 0;
    //alert(GameInfo);
}
 //start Bingo scripts



 //end Bingo scripts  
 //start BlackJack scripts
function changeRowsPerPageF(rowsPerPage) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = rowsPerPage; // $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker6I').val();
    ToGameTs = $('#datetimepicker7I').val();
    GameSort = $('#GameSort').val();
    TableSort = $('#TableSort').val();
        PSID = $('#PSID').val();
        FromGameBet = $('#FromGameBet').val();
        ToGameBet = $('#ToGameBet').val();
        FromGameWin = $('#FromGameWin').val();
        ToGameWin = $('#ToGameWin').val();
    
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function changePageNum(PageNum1) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = PageNum1 //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker6I').val();
    ToGameTs = $('#datetimepicker7I').val();
    GameSort = $('#GameSort').val();
    TableSort = $('#TableSort').val();
        PSID = $('#PSID').val();
        FromGameBet = $('#FromGameBet').val();
        ToGameBet = $('#ToGameBet').val();
        FromGameWin = $('#FromGameWin').val();
        ToGameWin = $('#ToGameWin').val();
    
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSort(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker6I').val();
    ToGameTs = $('#datetimepicker7I').val();
    GameSort = $('#GameSort').val();
    TableSort = $('#TableSort').val();
        PSID = $('#PSID').val();
        FromGameBet = $('#FromGameBet').val();
        ToGameBet = $('#ToGameBet').val();
        FromGameWin = $('#FromGameWin').val();
        ToGameWin = $('#ToGameWin').val();
    
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortMenu() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker6I').val();
    ToGameTs = $('#datetimepicker7I').val();
    GameSort = $('#GameSort').val();
    TableSort = $('#TableSort').val();
        PSID = $('#PSID').val();
        FromGameBet = $('#FromGameBet').val();
        ToGameBet = $('#ToGameBet').val();
        FromGameWin = $('#FromGameWin').val();
        ToGameWin = $('#ToGameWin').val();
    
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function cleanSortFunction() {
    $('#datetimepicker6I').val("");
    $('#datetimepicker7I').val("");
    //$('#datetimepicker6').datetimepicker('update');
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
    $('#datetimepicker6').datetimepicker('setEndDate', output );
    $('#datetimepicker7').datetimepicker('setEndDate', output );
    $('#datetimepicker6').datetimepicker('setStartDate', "");
    //$('#datetimepicker7').datetimepicker('update');
   $('#GameSort').val("");
    $('#TableSort').val("");
    $('#PSID').val("");
    $('#FromGameBet').val("");
    $('#ToGameBet').val("");
    $('#FromGameWin').val("");
    $('#ToGameWin').val("");
    changePageSortMenu()
    //sortFunction();
    
}
function sortFunction() {
    //clearTimeout(sortTimer);
    //sortTimer = setTimeout(function(){ 
        $(".faSpinnerBJ").show();
        $('#BJcards').hide();
        FromGameTs = $('#datetimepicker6I').val();
        ToGameTs = $('#datetimepicker7I').val();
        GameSort = $('#GameSort').val();
        TableSort = $('#TableSort').val();
        PSID = $('#PSID').val();
        FromGameBet = $('#FromGameBet').val();
        ToGameBet = $('#ToGameBet').val();
        FromGameWin = $('#FromGameWin').val();
        ToGameWin = $('#ToGameWin').val();
        token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url:'ajax_sortBJHistory',
            dataType: "json",
            data:{'FromGameTs': FromGameTs, 'ToGameTs': ToGameTs, 'GameSort':  GameSort, 'TableSort':  TableSort, 'PSID':  PSID, 'FromGameBet': FromGameBet, 'ToGameBet': ToGameBet, 'FromGameWin': FromGameWin, 'ToGameWin': ToGameWin, _token: token},
            success:function(data){
                if (data.success == "success"){
                    $('#tableBJ').html(data.html);
                    setTimeout(function(){
                        $('#datetimepicker6I').val(FromGameTs);
                        $('#datetimepicker7I').val(ToGameTs);
                        //$('#datetimepicker6').datetimepicker('setStartDate', FromGameTs);
                        $('#GameSort').val(GameSort);
                        $('#TableSort').val(TableSort);
                        $('#PSID').val(PSID);
                        $('#FromGameBet').val(FromGameBet);
                        $('#ToGameBet').val(ToGameBet);
                        $('#FromGameWin').val(FromGameWin);
                        $('#ToGameWin').val(ToGameWin);
                        var d = new Date();
                        var month = d.getMonth()+1;
                        var day = d.getDate();
                        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
                        $('#datetimepicker6').datetimepicker('setEndDate', output );
                        $('#datetimepicker7').datetimepicker('setEndDate', output );
                        if (FromGameTs != ""){
                            $('#datetimepicker7').datetimepicker('setStartDate', FromGameTs);
                        }
                        if (ToGameTs != ""){
                            $('#datetimepicker6').datetimepicker('setEndDate', ToGameTs);
                        }
                    }, 300);
                    
                }
                $(".faSpinnerBJ").hide();
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                $(".faSpinnerBJ").hide();
            
            }
        
        });
    //}, 500);
}
function datetimepicker66() {
        $('.switch').attr('colspan', 5);
        FromGameTs = $('#datetimepicker6I').val();
        ToGameTs = $('#datetimepicker7I').val();
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker6').datetimepicker('setEndDate', output);
        $('#datetimepicker6').datetimepicker('show');
        if (FromGameTs != ""){
            $('#datetimepicker7').datetimepicker('setStartDate', FromGameTs);
                        }
        if (ToGameTs != ""){
            $('#datetimepicker6').datetimepicker('setEndDate', ToGameTs);
        }
}
function datetimepicker77() {
        $('.switch').attr('colspan', 5);
        FromGameTs = $('#datetimepicker6I').val();
        ToGameTs = $('#datetimepicker7I').val();
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker7').datetimepicker('setEndDate', output);
        $('#datetimepicker7').datetimepicker('show');
        if (FromGameTs != ""){
            $('#datetimepicker7').datetimepicker('setStartDate', FromGameTs);
                        }
        if (ToGameTs != ""){
            $('#datetimepicker6').datetimepicker('setEndDate', ToGameTs);
        }
}
function datetimepicker6Close() {
        $('#datetimepicker6').datetimepicker('hide');
        //sortFunction(1, "datetimepicker6I");
        //$('#datetimepicker7').datetimepicker('setStartDate', '2016-11-08');
}
function datetimepicker7Close() {
        $('#datetimepicker7').datetimepicker('hide');
        //sortFunction(1, "datetimepicker7I");
        //$('#datetimepicker').datetimepicker('setStartDate', '2012-01-01');
}
$("#datetimepicker6").datetimepicker({
        //format: "dd MM yyyy - hh:ii",
        //autoclose: true,
        //todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
});
$('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        //format: "dd MM yyyy - hh:ii",
        //autoclose: true,
        //todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
});
function sortMenuBJ() {
    if (sortMenuRV == 0) {
        $('.RouletteSort').show();
        sortMenuRV = 1;
    }else{
        $('.RouletteSort').hide();
        sortMenuRV = 0;
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker4').datetimepicker('setEndDate', output );
        $('#datetimepicker5').datetimepicker('setEndDate', output );
        $('#datetimepicker5').datetimepicker('setStartDate', "");
        $('#datetimepicker4I').val("");
        $('#datetimepicker5I').val("");
        $('#GameSortR').val("");
        $('#PSIDR').val("");
        $('#FromGameNumR').val("");
        $('#ToGameNumR').val("");
        $('#FromGameBetR').val("");
        $('#ToGameBetR').val("");
        $('#FromGameWinR').val("");
        $('#ToGameWinR').val("");
        $('#FromGameJackR').val("");
        $('#ToGameJackR').val("");
        
    }
    
}
function ExportToPNGBJ() {
    html2canvas($('#BJHistory_modal'), {
        onrendered: function(canvas) {
            theCanvas = canvas;
            document.body.appendChild(canvas);
            $(".faSpinnerBJ").show();
            // Convert and download as image 
            Canvas2Image.saveAsPNG(canvas); 
            //document.body.append(canvas);
            // Clean up 
            document.body.removeChild(canvas);
            $(".faSpinnerBJ").hide();
        }
    });
}
function changeModalWindow(boxAttr) {
    $(".faSpinnerBJ").show();
    $('#BJcards').hide();
    rowTS =  $('#next-prev').attr("data-ts");
    rowTable = $('#next-prev').attr("data-table");
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_nextPrevBJHistory',
        dataType: "json",
        data:{'rowTS': rowTS, 'rowTable': rowTable, 'boxAttr': boxAttr, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#BJcards').html(data.html); //seatid
                $('#BJHead').html(data.seatid);
                $('#totalBet').html(data.totalBet);
                $('#totalWin').html(data.totalWin);
                $('#gameIDArrow').html(data.gameIDArrow);
                $(".faSpinnerBJ").hide();
                //$('#next-prev').attr("data-table", rowTable);
                $('#next-prev').attr("data-ts", data.dataRowTS);
                if (data.nextArrow == 0){
                    $('#nextArrow').hide();
                } else {
                    $('#nextArrow').show();
                }
                if (data.prevArrow == 0){
                    $('#prevArrow').hide();
                } else {
                    $('#prevArrow').show();
                }
                $('#BJcards').show();
            }
            $('#BJcards').show();
            $(".faSpinnerBJ").hide();
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $(".faSpinnerBJ").hide();
        }
    });
}
 //end BlackJack scripts
 //start Roulete scripts
function changeRowsPerPageFR(rowsPerPage) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = rowsPerPage; // $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSort = $('#GameSortR').val();
    PSID = $('#PSIDR').val();
    FromGameNum = $('#FromGameNumR').val();
    ToGameNum = $('#ToGameNumR').val();
    FromGameBet = $('#FromGameBetR').val();
    ToGameBet = $('#ToGameBetR').val();
    FromGameWin = $('#FromGameWinR').val();
    ToGameWin = $('#ToGameWinR').val();
    FromGameJack = $('#FromGameJackR').val();
    ToGameJack = $('#ToGameJackR').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&PSID=" + PSID + 
            "&FromGameNum=" + FromGameNum + 
            "&ToGameNum=" + ToGameNum + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
            "&FromGameJack=" + FromGameJack + 
            "&ToGameJack=" + ToGameJack + 
            "')" 
    window.location.href = pageHref; 
}
function changePageNumR(PageNum1) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = PageNum1 //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSort = $('#GameSortR').val();
    PSID = $('#PSIDR').val();
    FromGameNum = $('#FromGameNumR').val();
    ToGameNum = $('#ToGameNumR').val();
    FromGameBet = $('#FromGameBetR').val();
    ToGameBet = $('#ToGameBetR').val();
    FromGameWin = $('#FromGameWinR').val();
    ToGameWin = $('#ToGameWinR').val();
    FromGameJack = $('#FromGameJackR').val();
    ToGameJack = $('#ToGameJackR').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&PSID=" + PSID + 
            "&FromGameNum=" + FromGameNum + 
            "&ToGameNum=" + ToGameNum + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
            "&FromGameJack=" + FromGameJack + 
            "&ToGameJack=" + ToGameJack + 
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
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSort = $('#GameSortR').val();
    PSID = $('#PSIDR').val();
    FromGameNum = $('#FromGameNumR').val();
    ToGameNum = $('#ToGameNumR').val();
    FromGameBet = $('#FromGameBetR').val();
    ToGameBet = $('#ToGameBetR').val();
    FromGameWin = $('#FromGameWinR').val();
    ToGameWin = $('#ToGameWinR').val();
    FromGameJack = $('#FromGameJackR').val();
    ToGameJack = $('#ToGameJackR').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&PSID=" + PSID + 
            "&FromGameNum=" + FromGameNum + 
            "&ToGameNum=" + ToGameNum + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
            "&FromGameJack=" + FromGameJack + 
            "&ToGameJack=" + ToGameJack + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortMenuR() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSort = $('#GameSortR').val();
    PSID = $('#PSIDR').val();
    FromGameNum = $('#FromGameNumR').val();
    ToGameNum = $('#ToGameNumR').val();
    FromGameBet = $('#FromGameBetR').val();
    ToGameBet = $('#ToGameBetR').val();
    FromGameWin = $('#FromGameWinR').val();
    ToGameWin = $('#ToGameWinR').val();
    FromGameJack = $('#FromGameJackR').val();
    ToGameJack = $('#ToGameJackR').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&GameSort=" + GameSort + 
            "&PSID=" + PSID + 
            "&FromGameNum=" + FromGameNum + 
            "&ToGameNum=" + ToGameNum + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
            "&FromGameJack=" + FromGameJack + 
            "&ToGameJack=" + ToGameJack + 
            "')" 
    window.location.href = pageHref; 
}
function cleanSortFunctionR() {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
    $('#datetimepicker4').datetimepicker('setEndDate', output );
    $('#datetimepicker5').datetimepicker('setEndDate', output );
    $('#datetimepicker5').datetimepicker('setStartDate', "");
    $('#datetimepicker4I').val("");
    $('#datetimepicker5I').val("");
    $('#GameSortR').val("");
    $('#PSIDR').val("");
    $('#FromGameNumR').val("");
    $('#ToGameNumR').val("");
    $('#FromGameBetR').val("");
    $('#ToGameBetR').val("");
    $('#FromGameWinR').val("");
    $('#ToGameWinR').val("");
    $('#FromGameJackR').val("");
    $('#ToGameJackR').val("");
    changePageSortMenuR();
    
}
function sortFunctionR() {
    //clearTimeout(sortTimer);
    //sortTimer = setTimeout(function(){ 
        $(".faSpinnerBJ").show();
        $('#BJcards').hide();
        FromGameTs = $('#datetimepicker4I').val();
        ToGameTs = $('#datetimepicker5I').val();
        GameSort = $('#GameSortR').val();
        PSID = $('#PSIDR').val();
        FromGameNum = $('#FromGameNumR').val();
        ToGameNum = $('#ToGameNumR').val();
        FromGameBet = $('#FromGameBetR').val();
        ToGameBet = $('#ToGameBetR').val();
        FromGameWin = $('#FromGameWinR').val();
        ToGameWin = $('#ToGameWinR').val();
        FromGameJack = $('#FromGameJackR').val();
        ToGameJack = $('#ToGameJackR').val();
        token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url:'ajax_sortRouletteHistory',
            dataType: "json",
            data:{'FromGameTs': FromGameTs, 'ToGameTs': ToGameTs, 'GameSort':  GameSort, 'PSID':  PSID, 'FromGameNum': FromGameNum, 'ToGameNum': ToGameNum, 'FromGameBet': FromGameBet, 'ToGameBet': ToGameBet, 'FromGameWin': FromGameWin, 'ToGameWin': ToGameWin, 'FromGameJack': FromGameJack, 'ToGameJack': ToGameJack, _token: token},
            success:function(data){
                if (data.success == "success"){
                    $('#tableRoulette').html(data.html);
                    setTimeout(function(){
                        $('#datetimepicker4I').val(FromGameTs);
                        $('#datetimepicker5I').val(ToGameTs);
                        $('#GameSortR').val(GameSort);
                        $('#PSIDR').val(PSID);
                        $('#FromGameNumR').val(FromGameNum);
                        $('#ToGameNumR').val(ToGameNum);
                        $('#FromGameBetR').val(FromGameBet);
                        $('#ToGameBetR').val(ToGameBet);
                        $('#FromGameWinR').val(FromGameWin);
                        $('#ToGameWinR').val(ToGameWin);
                        $('#FromGameJackR').val(FromGameJack);
                        $('#ToGameJackR').val(ToGameJack);
                        var d = new Date();
                        var month = d.getMonth()+1;
                        var day = d.getDate();
                        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
                        $('#datetimepicker4').datetimepicker('setEndDate', output );
                        $('#datetimepicker5').datetimepicker('setEndDate', output );
                        if (FromGameTs != ""){
                            $('#datetimepicker5').datetimepicker('setStartDate', FromGameTs);
                        }
                        if (ToGameTs != ""){
                            $('#datetimepicker4').datetimepicker('setEndDate', ToGameTs);
                        }
                    }, 300);
                    
                }
                $(".faSpinnerBJ").hide();
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                $(".faSpinnerBJ").hide();
            
            }
        
        });
    //}, 500);
}
function datetimepicker44() {
        $('.switch').attr('colspan', 5);
        FromGameTs = $('#datetimepicker4I').val();
        ToGameTs = $('#datetimepicker5I').val();
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker4').datetimepicker('setEndDate', output);
        $('#datetimepicker4').datetimepicker('show');
        if (FromGameTs != ""){
            $('#datetimepicker5').datetimepicker('setStartDate', FromGameTs);
                        }
        if (ToGameTs != ""){
            $('#datetimepicker4').datetimepicker('setEndDate', ToGameTs);
        }
}
function datetimepicker55() {
        $('.switch').attr('colspan', 5);
        FromGameTs = $('#datetimepicker4I').val();
        ToGameTs = $('#datetimepicker5I').val();
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker5').datetimepicker('setEndDate', output);
        $('#datetimepicker5').datetimepicker('show');
        if (FromGameTs != ""){
            $('#datetimepicker5').datetimepicker('setStartDate', FromGameTs);
                        }
        if (ToGameTs != ""){
            $('#datetimepicker4').datetimepicker('setEndDate', ToGameTs);
        }
}
function datetimepicker4Close() {
        $('#datetimepicker4').datetimepicker('hide');
        //sortFunctionR(1, "datetimepicker4I");
        //$('#datetimepicker7').datetimepicker('setStartDate', '2016-11-08');
}
function datetimepicker5Close() {
        $('#datetimepicker5').datetimepicker('hide');
        //sortFunctionR(1, "datetimepicker5I");
        //$('#datetimepicker').datetimepicker('setStartDate', '2012-01-01');
}
$("#datetimepicker4").datetimepicker({
        //format: "dd MM yyyy - hh:ii",
        //autoclose: true,
        //todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
});
$('#datetimepicker5').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        //format: "dd MM yyyy - hh:ii",
        //autoclose: true,
        //todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
});
function sortMenuR() {
    if (sortMenuRV == 0) {
        $('.RouletteSort').show();
        sortMenuRV = 1;
    }else{
        $('.RouletteSort').hide();
        sortMenuRV = 0;
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker4').datetimepicker('setEndDate', output );
        $('#datetimepicker5').datetimepicker('setEndDate', output );
        $('#datetimepicker5').datetimepicker('setStartDate', "");
        $('#datetimepicker4I').val("");
        $('#datetimepicker5I').val("");
        $('#GameSortR').val("");
        $('#PSIDR').val("");
        $('#FromGameNumR').val("");
        $('#ToGameNumR').val("");
        $('#FromGameBetR').val("");
        $('#ToGameBetR').val("");
        $('#FromGameWinR').val("");
        $('#ToGameWinR').val("");
        $('#FromGameJackR').val("");
        $('#ToGameJackR').val("");
        //changePageSortMenuR();
        
    }
    
}
function ExportToPNGR() {
    html2canvas($('#rouletteHistory_modal'), {
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
function changeModalWindowR(NextPrev) {
    wTop = $(window).height() / 2;
    wLeft = $(window).width() / 2;
    $(".faSpinner").css('top', wTop );
    $(".faSpinner").css("left", wLeft);
    $(".faSpinner").show();
    rowTS = $('#next-prevR').attr('data-ts');
    rowId = $('#next-prevR').attr("data-Id");
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_nextPrevRouletteHistory',
        dataType: "json",
        data:{'rowTS': rowTS, 'rowId': rowId, 'NextPrev': NextPrev, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#roulettePic').html(data.html); //seatid
                $('#rouletteHead').html(data.seatid);
                $('#winNumber').html(data.winNumber);
                $('#totalBet').html(data.totalBet);
                $('#totalWin').html(data.totalWin);
                $('#jackpotWon').html(data.jackpotWon);
                $('#gameIDArrowR').html(data.gameIDArrow);
                $('#next-prevR').attr("data-ts", data.dataRowTS);
                if (data.nextArrow == 0){
                    $('#nextArrowR').hide();
                } else {
                    $('#nextArrowR').show();
                }
                if (data.prevArrow == 0){
                    $('#prevArrowR').hide();
                } else {
                    $('#prevArrowR').show();
                }
                
                $(".faSpinner").hide();
                
            }
            //$(".faSpinner").hide();
        },
        error: function (error) {
            alert ("Unexpected wrong.");
             $(".faSpinner").hide();
        }
        
    });
}    
//end Roulete scripts



