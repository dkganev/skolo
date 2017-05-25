var firstClick = 0;
var sortTimer;
var ShowHideI = 0;
var GameInfo = 0;
var sortMenuRV = 0;

 //start Bingo scripts
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
function changeRowsPerPageFBingo(rowsPerPage) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = rowsPerPage; // $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    if ($('#checkbox1').is(':checked')){ tableTh1 = 1; } else { tableTh1 = 0; };
    if ($('#checkbox2').is(':checked')){ tableTh2 = 1; } else { tableTh2 = 0; };
    if ($('#checkbox3').is(':checked')){ tableTh3 = 1; } else { tableTh3 = 0; };
    if ($('#checkbox4').is(':checked')){ tableTh4 = 1; } else { tableTh4 = 0; };
    if ($('#checkbox5').is(':checked')){ tableTh5 = 1; } else { tableTh5 = 0; };
    if ($('#checkboxLine').is(':checked')){ tableLine = 1; } else { tableLine = 0; };
    if ($('#checkboxBingo').is(':checked')){ tableBingo = 1; } else { tableBingo = 0; };
    if ($('#checkboxMyBonus').is(':checked')){ tableMyBonus = 1; } else { tableMyBonus = 0; };
    if ($('#checkboxBonusLine').is(':checked')){ tableBonusLine = 1; } else { tableBonusLine = 0; };
    if ($('#checkboxBonusBingo').is(':checked')){ tableBonusBingo = 1; } else { tableBonusBingo = 0; };
    if ($('#checkboxJackpotLine').is(':checked')){ tableJackpotLine = 1; } else { tableJackpotLine = 0; };
    if ($('#checkboxJackpotBingo').is(':checked')){ tableJackpotBingo = 1; } else { tableJackpotBingo = 0; };
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker2I').val();
    ToGameTs = $('#datetimepicker3I').val();
    GameSort = $('#GameSort').val();
    FromTicketCost = $('#FromTicketCost').val();
    ToTicketCost = $('#ToTicketCost').val();
    FromPlayers = $('#FromPlayers').val();
    ToPlayers = $('#ToPlayers').val();
    FromTickets = $('#FromTickets').val();
    ToTickets = $('#ToTickets').val();
    FromLine = $('#FromLine').val();
    ToLine = $('#ToLine').val();
    FromBingo = $('#FromBingo').val();
    ToBingo = $('#ToBingo').val();
    FromMybonus = $('#FromMybonus').val();
    ToMybonus = $('#ToMybonus').val();
    FromBonusLine = $('#FromBonusLine').val();
    ToBonusLine = $('#ToBonusLine').val();
    FromBonusBingo = $('#FromBonusBingo').val();
    ToBonusBingo = $('#ToBonusBingo').val();
    FromJackpotLine = $('#FromJackpotLine').val();
    ToJackpotLine = $('#ToJackpotLine').val();
    FromJackpotBingo = $('#FromJackpotBingo').val();
    ToJackpotBingo = $('#ToJackpotBingo').val();
    FromLineVal = $('#FromLineVal').val();
    ToLineVal = $('#ToLineVal').val();
    FromBingoVal = $('#FromBingoVal').val();
    ToBingoVal = $('#ToBingoVal').val();
    FromMybonusVal = $('#FromMybonusVal').val();
    ToMybonusVal = $('#ToMybonusVal').val();
    FromBonusLineVal = $('#FromBonusLineVal').val();
    ToBonusLineVal = $('#ToBonusLineVal').val();
    FromBonusBingoVal = $('#FromBonusBingoVal').val();
    ToBonusBingoVal = $('#ToBonusBingoVal').val();
    FromJackpotLineVal = $('#FromJackpotLineVal').val();
    ToJackpotLineVal = $('#ToJackpotLineVal').val();
    FromJackpotBingoVal = $('#FromJackpotBingoVal').val();
    ToJackpotBingoVal = $('#ToJackpotBingoVal').val();
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + sortMenuOpen + 
            "," + tableTh1 + 
            "," + tableTh2 + 
            "," + tableTh3 + 
            "," + tableTh4 + 
            "," + tableTh5 + 
            "," + tableLine + 
            "," + tableBingo + 
            "," + tableMyBonus + 
            "," + tableBonusLine + 
            "," + tableBonusBingo + 
            "," + tableJackpotLine + 
            "," + tableJackpotBingo + 
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSort + 
            "," + FromTicketCost + 
            "," + ToTicketCost + 
            "," + FromPlayers + 
            "," + ToPlayers + 
            "," + FromTickets + 
            "," + ToTickets + 
            "," + FromLine + 
            "," + ToLine + 
            "," + FromBingo + 
            "," + ToBingo + 
            "," + FromMybonus + 
            "," + ToMybonus + 
            "," + FromBonusLine + 
            "," + ToBonusLine + 
            "," + FromBonusBingo + 
            "," + ToBonusBingo + 
            "," + FromJackpotLine + 
            "," + ToJackpotLine + 
            "," + FromJackpotBingo + 
            "," + ToJackpotBingo + 
            "," + FromLineVal + 
            "," + ToLineVal + 
            "," + FromBingoVal + 
            "," + ToBingoVal + 
            "," + FromMybonusVal + 
            "," + ToMybonusVal + 
            "," + FromBonusLineVal + 
            "," + ToBonusLineVal + 
            "," + FromBonusBingoVal + 
            "," + ToBonusBingoVal + 
            "," + FromJackpotLineVal + 
            "," + ToJackpotLineVal + 
            "," + FromJackpotBingoVal + 
            "," + ToJackpotBingoVal + 
            //        "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function changePageNumBingo(PageNum1) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = PageNum1 //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    if ($('#checkbox1').is(':checked')){ tableTh1 = 1; } else { tableTh1 = 0; };
    if ($('#checkbox2').is(':checked')){ tableTh2 = 1; } else { tableTh2 = 0; };
    if ($('#checkbox3').is(':checked')){ tableTh3 = 1; } else { tableTh3 = 0; };
    if ($('#checkbox4').is(':checked')){ tableTh4 = 1; } else { tableTh4 = 0; };
    if ($('#checkbox5').is(':checked')){ tableTh5 = 1; } else { tableTh5 = 0; };
    if ($('#checkboxLine').is(':checked')){ tableLine = 1; } else { tableLine = 0; };
    if ($('#checkboxBingo').is(':checked')){ tableBingo = 1; } else { tableBingo = 0; };
    if ($('#checkboxMyBonus').is(':checked')){ tableMyBonus = 1; } else { tableMyBonus = 0; };
    if ($('#checkboxBonusLine').is(':checked')){ tableBonusLine = 1; } else { tableBonusLine = 0; };
    if ($('#checkboxBonusBingo').is(':checked')){ tableBonusBingo = 1; } else { tableBonusBingo = 0; };
    if ($('#checkboxJackpotLine').is(':checked')){ tableJackpotLine = 1; } else { tableJackpotLine = 0; };
    if ($('#checkboxJackpotBingo').is(':checked')){ tableJackpotBingo = 1; } else { tableJackpotBingo = 0; };
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker2I').val();
    ToGameTs = $('#datetimepicker3I').val();
    GameSort = $('#GameSort').val();
    FromTicketCost = $('#FromTicketCost').val();
    ToTicketCost = $('#ToTicketCost').val();
    FromPlayers = $('#FromPlayers').val();
    ToPlayers = $('#ToPlayers').val();
    FromTickets = $('#FromTickets').val();
    ToTickets = $('#ToTickets').val();
    FromLine = $('#FromLine').val();
    ToLine = $('#ToLine').val();
    FromBingo = $('#FromBingo').val();
    ToBingo = $('#ToBingo').val();
    FromMybonus = $('#FromMybonus').val();
    ToMybonus = $('#ToMybonus').val();
    FromBonusLine = $('#FromBonusLine').val();
    ToBonusLine = $('#ToBonusLine').val();
    FromBonusBingo = $('#FromBonusBingo').val();
    ToBonusBingo = $('#ToBonusBingo').val();
    FromJackpotLine = $('#FromJackpotLine').val();
    ToJackpotLine = $('#ToJackpotLine').val();
    FromJackpotBingo = $('#FromJackpotBingo').val();
    ToJackpotBingo = $('#ToJackpotBingo').val();
    FromLineVal = $('#FromLineVal').val();
    ToLineVal = $('#ToLineVal').val();
    FromBingoVal = $('#FromBingoVal').val();
    ToBingoVal = $('#ToBingoVal').val();
    FromMybonusVal = $('#FromMybonusVal').val();
    ToMybonusVal = $('#ToMybonusVal').val();
    FromBonusLineVal = $('#FromBonusLineVal').val();
    ToBonusLineVal = $('#ToBonusLineVal').val();
    FromBonusBingoVal = $('#FromBonusBingoVal').val();
    ToBonusBingoVal = $('#ToBonusBingoVal').val();
    FromJackpotLineVal = $('#FromJackpotLineVal').val();
    ToJackpotLineVal = $('#ToJackpotLineVal').val();
    FromJackpotBingoVal = $('#FromJackpotBingoVal').val();
    ToJackpotBingoVal = $('#ToJackpotBingoVal').val();
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + sortMenuOpen + 
            "," + tableTh1 + 
            "," + tableTh2 + 
            "," + tableTh3 + 
            "," + tableTh4 + 
            "," + tableTh5 + 
            "," + tableLine + 
            "," + tableBingo + 
            "," + tableMyBonus + 
            "," + tableBonusLine + 
            "," + tableBonusBingo + 
            "," + tableJackpotLine + 
            "," + tableJackpotBingo + 
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSort + 
            "," + FromTicketCost + 
            "," + ToTicketCost + 
            "," + FromPlayers + 
            "," + ToPlayers + 
            "," + FromTickets + 
            "," + ToTickets + 
            "," + FromLine + 
            "," + ToLine + 
            "," + FromBingo + 
            "," + ToBingo + 
            "," + FromMybonus + 
            "," + ToMybonus + 
            "," + FromBonusLine + 
            "," + ToBonusLine + 
            "," + FromBonusBingo + 
            "," + ToBonusBingo + 
            "," + FromJackpotLine + 
            "," + ToJackpotLine + 
            "," + FromJackpotBingo + 
            "," + ToJackpotBingo + 
            "," + FromLineVal + 
            "," + ToLineVal + 
            "," + FromBingoVal + 
            "," + ToBingoVal + 
            "," + FromMybonusVal + 
            "," + ToMybonusVal + 
            "," + FromBonusLineVal + 
            "," + ToBonusLineVal + 
            "," + FromBonusBingoVal + 
            "," + ToBonusBingoVal + 
            "," + FromJackpotLineVal + 
            "," + ToJackpotLineVal + 
            "," + FromJackpotBingoVal + 
            "," + ToJackpotBingoVal + 
            //        "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortBingo(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    if ($('#checkbox1').is(':checked')){ tableTh1 = 1; } else { tableTh1 = 0; };
    if ($('#checkbox2').is(':checked')){ tableTh2 = 1; } else { tableTh2 = 0; };
    if ($('#checkbox3').is(':checked')){ tableTh3 = 1; } else { tableTh3 = 0; };
    if ($('#checkbox4').is(':checked')){ tableTh4 = 1; } else { tableTh4 = 0; };
    if ($('#checkbox5').is(':checked')){ tableTh5 = 1; } else { tableTh5 = 0; };
    if ($('#checkboxLine').is(':checked')){ tableLine = 1; } else { tableLine = 0; };
    if ($('#checkboxBingo').is(':checked')){ tableBingo = 1; } else { tableBingo = 0; };
    if ($('#checkboxMyBonus').is(':checked')){ tableMyBonus = 1; } else { tableMyBonus = 0; };
    if ($('#checkboxBonusLine').is(':checked')){ tableBonusLine = 1; } else { tableBonusLine = 0; };
    if ($('#checkboxBonusBingo').is(':checked')){ tableBonusBingo = 1; } else { tableBonusBingo = 0; };
    if ($('#checkboxJackpotLine').is(':checked')){ tableJackpotLine = 1; } else { tableJackpotLine = 0; };
    if ($('#checkboxJackpotBingo').is(':checked')){ tableJackpotBingo = 1; } else { tableJackpotBingo = 0; };
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker2I').val();
    ToGameTs = $('#datetimepicker3I').val();
    GameSort = $('#GameSort').val();
    FromTicketCost = $('#FromTicketCost').val();
    ToTicketCost = $('#ToTicketCost').val();
    FromPlayers = $('#FromPlayers').val();
    ToPlayers = $('#ToPlayers').val();
    FromTickets = $('#FromTickets').val();
    ToTickets = $('#ToTickets').val();
    FromLine = $('#FromLine').val();
    ToLine = $('#ToLine').val();
    FromBingo = $('#FromBingo').val();
    ToBingo = $('#ToBingo').val();
    FromMybonus = $('#FromMybonus').val();
    ToMybonus = $('#ToMybonus').val();
    FromBonusLine = $('#FromBonusLine').val();
    ToBonusLine = $('#ToBonusLine').val();
    FromBonusBingo = $('#FromBonusBingo').val();
    ToBonusBingo = $('#ToBonusBingo').val();
    FromJackpotLine = $('#FromJackpotLine').val();
    ToJackpotLine = $('#ToJackpotLine').val();
    FromJackpotBingo = $('#FromJackpotBingo').val();
    ToJackpotBingo = $('#ToJackpotBingo').val();
    FromLineVal = $('#FromLineVal').val();
    ToLineVal = $('#ToLineVal').val();
    FromBingoVal = $('#FromBingoVal').val();
    ToBingoVal = $('#ToBingoVal').val();
    FromMybonusVal = $('#FromMybonusVal').val();
    ToMybonusVal = $('#ToMybonusVal').val();
    FromBonusLineVal = $('#FromBonusLineVal').val();
    ToBonusLineVal = $('#ToBonusLineVal').val();
    FromBonusBingoVal = $('#FromBonusBingoVal').val();
    ToBonusBingoVal = $('#ToBonusBingoVal').val();
    FromJackpotLineVal = $('#FromJackpotLineVal').val();
    ToJackpotLineVal = $('#ToJackpotLineVal').val();
    FromJackpotBingoVal = $('#FromJackpotBingoVal').val();
    ToJackpotBingoVal = $('#ToJackpotBingoVal').val();
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + sortMenuOpen + 
            "," + tableTh1 + 
            "," + tableTh2 + 
            "," + tableTh3 + 
            "," + tableTh4 + 
            "," + tableTh5 + 
            "," + tableLine + 
            "," + tableBingo + 
            "," + tableMyBonus + 
            "," + tableBonusLine + 
            "," + tableBonusBingo + 
            "," + tableJackpotLine + 
            "," + tableJackpotBingo + 
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSort + 
            "," + FromTicketCost + 
            "," + ToTicketCost + 
            "," + FromPlayers + 
            "," + ToPlayers + 
            "," + FromTickets + 
            "," + ToTickets + 
            "," + FromLine + 
            "," + ToLine + 
            "," + FromBingo + 
            "," + ToBingo + 
            "," + FromMybonus + 
            "," + ToMybonus + 
            "," + FromBonusLine + 
            "," + ToBonusLine + 
            "," + FromBonusBingo + 
            "," + ToBonusBingo + 
            "," + FromJackpotLine + 
            "," + ToJackpotLine + 
            "," + FromJackpotBingo + 
            "," + ToJackpotBingo + 
            "," + FromLineVal + 
            "," + ToLineVal + 
            "," + FromBingoVal + 
            "," + ToBingoVal + 
            "," + FromMybonusVal + 
            "," + ToMybonusVal + 
            "," + FromBonusLineVal + 
            "," + ToBonusLineVal + 
            "," + FromBonusBingoVal + 
            "," + ToBonusBingoVal + 
            "," + FromJackpotLineVal + 
            "," + ToJackpotLineVal + 
            "," + FromJackpotBingoVal + 
            "," + ToJackpotBingoVal + 
            //        "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortMenuBingo() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    if ($('#checkbox1').is(':checked')){ tableTh1 = 1; } else { tableTh1 = 0; };
    if ($('#checkbox2').is(':checked')){ tableTh2 = 1; } else { tableTh2 = 0; };
    if ($('#checkbox3').is(':checked')){ tableTh3 = 1; } else { tableTh3 = 0; };
    if ($('#checkbox4').is(':checked')){ tableTh4 = 1; } else { tableTh4 = 0; };
    if ($('#checkbox5').is(':checked')){ tableTh5 = 1; } else { tableTh5 = 0; };
    if ($('#checkboxLine').is(':checked')){ tableLine = 1; } else { tableLine = 0; };
    if ($('#checkboxBingo').is(':checked')){ tableBingo = 1; } else { tableBingo = 0; };
    if ($('#checkboxMyBonus').is(':checked')){ tableMyBonus = 1; } else { tableMyBonus = 0; };
    if ($('#checkboxBonusLine').is(':checked')){ tableBonusLine = 1; } else { tableBonusLine = 0; };
    if ($('#checkboxBonusBingo').is(':checked')){ tableBonusBingo = 1; } else { tableBonusBingo = 0; };
    if ($('#checkboxJackpotLine').is(':checked')){ tableJackpotLine = 1; } else { tableJackpotLine = 0; };
    if ($('#checkboxJackpotBingo').is(':checked')){ tableJackpotBingo = 1; } else { tableJackpotBingo = 0; };
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker2I').val();
    ToGameTs = $('#datetimepicker3I').val();
    GameSort = $('#GameSort').val();
    FromTicketCost = $('#FromTicketCost').val();
    ToTicketCost = $('#ToTicketCost').val();
    FromPlayers = $('#FromPlayers').val();
    ToPlayers = $('#ToPlayers').val();
    FromTickets = $('#FromTickets').val();
    ToTickets = $('#ToTickets').val();
    FromLine = $('#FromLine').val();
    ToLine = $('#ToLine').val();
    FromBingo = $('#FromBingo').val();
    ToBingo = $('#ToBingo').val();
    FromMybonus = $('#FromMybonus').val();
    ToMybonus = $('#ToMybonus').val();
    FromBonusLine = $('#FromBonusLine').val();
    ToBonusLine = $('#ToBonusLine').val();
    FromBonusBingo = $('#FromBonusBingo').val();
    ToBonusBingo = $('#ToBonusBingo').val();
    FromJackpotLine = $('#FromJackpotLine').val();
    ToJackpotLine = $('#ToJackpotLine').val();
    FromJackpotBingo = $('#FromJackpotBingo').val();
    ToJackpotBingo = $('#ToJackpotBingo').val();
    FromLineVal = $('#FromLineVal').val();
    ToLineVal = $('#ToLineVal').val();
    FromBingoVal = $('#FromBingoVal').val();
    ToBingoVal = $('#ToBingoVal').val();
    FromMybonusVal = $('#FromMybonusVal').val();
    ToMybonusVal = $('#ToMybonusVal').val();
    FromBonusLineVal = $('#FromBonusLineVal').val();
    ToBonusLineVal = $('#ToBonusLineVal').val();
    FromBonusBingoVal = $('#FromBonusBingoVal').val();
    ToBonusBingoVal = $('#ToBonusBingoVal').val();
    FromJackpotLineVal = $('#FromJackpotLineVal').val();
    ToJackpotLineVal = $('#ToJackpotLineVal').val();
    FromJackpotBingoVal = $('#FromJackpotBingoVal').val();
    ToJackpotBingoVal = $('#ToJackpotBingoVal').val();
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + sortMenuOpen + 
            "," + tableTh1 + 
            "," + tableTh2 + 
            "," + tableTh3 + 
            "," + tableTh4 + 
            "," + tableTh5 + 
            "," + tableLine + 
            "," + tableBingo + 
            "," + tableMyBonus + 
            "," + tableBonusLine + 
            "," + tableBonusBingo + 
            "," + tableJackpotLine + 
            "," + tableJackpotBingo + 
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSort + 
            "," + FromTicketCost + 
            "," + ToTicketCost + 
            "," + FromPlayers + 
            "," + ToPlayers + 
            "," + FromTickets + 
            "," + ToTickets + 
            "," + FromLine + 
            "," + ToLine + 
            "," + FromBingo + 
            "," + ToBingo + 
            "," + FromMybonus + 
            "," + ToMybonus + 
            "," + FromBonusLine + 
            "," + ToBonusLine + 
            "," + FromBonusBingo + 
            "," + ToBonusBingo + 
            "," + FromJackpotLine + 
            "," + ToJackpotLine + 
            "," + FromJackpotBingo + 
            "," + ToJackpotBingo + 
            "," + FromLineVal + 
            "," + ToLineVal + 
            "," + FromBingoVal + 
            "," + ToBingoVal + 
            "," + FromMybonusVal + 
            "," + ToMybonusVal + 
            "," + FromBonusLineVal + 
            "," + ToBonusLineVal + 
            "," + FromBonusBingoVal + 
            "," + ToBonusBingoVal + 
            "," + FromJackpotLineVal + 
            "," + ToJackpotLineVal + 
            "," + FromJackpotBingoVal + 
            "," + ToJackpotBingoVal + 
            //        "&TableSort=" + TableSort + 
            "')" 
    window.location.href = pageHref; 
}
function cleanSortFunctionBingo() {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
    $('#datetimepicker2I').val("");
    $('#datetimepicker3I').val("");
    $('#datetimepicker2').datetimepicker('setEndDate', output );
    $('#datetimepicker3').datetimepicker('setEndDate', output );
    $('#datetimepicker2').datetimepicker('setStartDate', "");
    $('#GameSort').val("");
    $('#FromTicketCost').val("");
    $('#ToTicketCost').val("");
    $('#FromPlayers').val("");
    $('#ToPlayers').val("");
    $('#FromTickets').val("");
    $('#ToTickets').val("");
    $('#FromLine').val("");
    $('#ToLine').val("");
    $('#FromBingo').val("");
    $('#ToBingo').val("");
    $('#FromMybonus').val("");
    $('#ToMybonus').val("");
    $('#FromBonusLine').val("");
    $('#ToBonusLine').val("");
    $('#FromBonusBingo').val("");
    $('#ToBonusBingo').val("");
    $('#FromJackpotLine').val("");
    $('#ToJackpotLine').val("");
    $('#FromJackpotBingo').val("");
    $('#ToJackpotBingo').val("");
    $('#FromLineVal').val("");
    $('#ToLineVal').val("");
    $('#FromBingoVal').val("");
    $('#ToBingoVal').val("");
    $('#FromMybonusVal').val("");
    $('#ToMybonusVal').val("");
    $('#FromBonusLineVal').val("");
    $('#ToBonusLineVal').val("");
    $('#FromBonusBingoVal').val("");
    $('#ToBonusBingoVal').val("");
    $('#FromJackpotLineVal').val("");
    $('#ToJackpotLineVal').val("");
    $('#FromJackpotBingoVal').val("");
    $('#ToJackpotBingoVal').val("");
    
    changePageSortMenuBingo()
    //sortFunction();
    
}
function datetimepicker22() {
        setTimeout(function(){ $('th.switch').css('display', "table-cell"); }, 100);
        FromGameTs = $('#datetimepicker2I').val();
        ToGameTs = $('#datetimepicker3I').val();
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker2').datetimepicker('setEndDate', output);
        $('#datetimepicker2').datetimepicker('show');
        if (FromGameTs != ""){
            $('#datetimepicker3').datetimepicker('setStartDate', FromGameTs);
                        }
        if (ToGameTs != ""){
            $('#datetimepicker2').datetimepicker('setEndDate', ToGameTs);
        }
}
function datetimepicker33() {
        setTimeout(function(){ $('th.switch').css('display', "table-cell"); }, 100);
        FromGameTs = $('#datetimepicker2I').val();
        ToGameTs = $('#datetimepicker3I').val();
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
        $('#datetimepicker3').datetimepicker('setEndDate', output);
        $('#datetimepicker3').datetimepicker('show');
        if (FromGameTs != ""){
            $('#datetimepicker3').datetimepicker('setStartDate', FromGameTs);
                        }
        if (ToGameTs != ""){
            $('#datetimepicker2').datetimepicker('setEndDate', ToGameTs);
        }
}
function datetimepicker2Close() {
        $('#datetimepicker2').datetimepicker('hide');
        //sortFunction(1, "datetimepicker6I");
        //$('#datetimepicker7').datetimepicker('setStartDate', '2016-11-08');
}
function datetimepicker3Close() {
        $('#datetimepicker3').datetimepicker('hide');
        //sortFunction(1, "datetimepicker7I");
        //$('#datetimepicker').datetimepicker('setStartDate', '2012-01-01');
}
$("#datetimepicker2").datetimepicker({
        //format: "dd MM yyyy - hh:ii",
        //autoclose: true,
        //todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
});
$('#datetimepicker3').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        //format: "dd MM yyyy - hh:ii",
        //autoclose: true,
        //todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
});
function sortMenuBingo() {
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
        $('#datetimepicker2I').val("");
        $('#datetimepicker3I').val("");
        $('#datetimepicker2').datetimepicker('setEndDate', output );
        $('#datetimepicker3').datetimepicker('setEndDate', output );
        $('#datetimepicker2').datetimepicker('setStartDate', "");
        $('#GameSort').val("");
        $('#FromTicketCost').val("");
        $('#ToTicketCost').val("");
        $('#FromPlayers').val("");
        $('#ToPlayers').val("");
        $('#FromTickets').val("");
        $('#ToTickets').val("");
        $('#FromLine').val("");
        $('#ToLine').val("");
        $('#FromBingo').val("");
        $('#ToBingo').val("");
        $('#FromMybonus').val("");
        $('#ToMybonus').val("");
        $('#FromBonusLine').val("");
        $('#ToBonusLine').val("");
        $('#FromBonusBingo').val("");
        $('#ToBonusBingo').val("");
        $('#FromJackpotLine').val("");
        $('#ToJackpotLine').val("");
        $('#FromJackpotBingo').val("");
        $('#ToJackpotBingo').val("");
        $('#FromLineVal').val("");
        $('#ToLineVal').val("");
        $('#FromBingoVal').val("");
        $('#ToBingoVal').val("");
        $('#FromMybonusVal').val("");
        $('#ToMybonusVal').val("");
        $('#FromBonusLineVal').val("");
        $('#ToBonusLineVal').val("");
        $('#FromBonusBingoVal').val("");
        $('#ToBonusBingoVal').val("");
        $('#FromJackpotLineVal').val("");
        $('#ToJackpotLineVal').val("");
        $('#FromJackpotBingoVal').val("");
        $('#ToJackpotBingoVal').val("");
    
    }
    
}
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

function boxModalWindow2(bingo_seq, unique_game_seq, psid) {
    $(".faSpinnerBingo").show(); //BJHistory_modal opacity: 0.5;
    //$('bingoHistory_modal').hide();//$('#bingoHistory2_modal').hide();
    $('#ModalClose').click();
    //$('#bingoHistory_modal').hide();
    $('#bingoTickets_History').hide();
    $('#balsHistory').hide();
    $('#psTicketsArchive').hide();
    $('#bingoHistory2_modal').css('opacity', 0);
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
function ShowHideBingo() {
    GameInfo = 0;
    if ($('#checkbox1').is(':checked')){
        //$('#example').bootstrapTable("showColumn", 'id1');
        $('.tableTh1').show();
        GameInfo += 1;
    }else{
        //$('#example').bootstrapTable("hideColumn", 'id1');
        $('.tableTh1').hide();
    };
    if ($('#checkbox2').is(':checked')){ $('.tableTh2').show(); GameInfo += 1; } else { $('.tableTh2').hide(); };
    if ($('#checkbox3').is(':checked')){ $('.tableTh3').show(); GameInfo += 1; } else { $('.tableTh3').hide(); };
    if ($('#checkbox4').is(':checked')){ $('.tableTh4').show(); GameInfo += 1; } else { $('.tableTh4').hide(); };
    if ($('#checkbox5').is(':checked')){ $('.tableTh5').show(); GameInfo += 1; } else { $('.tableTh5').hide(); };
    if (GameInfo == 0){
        $('.GameInfo').hide();
    }else{
        $('.GameInfo').show();
        $('.GameInfo').attr("colspan", GameInfo);
    }
    if ($('#checkboxLine').is(':checked')){ $('.Line').show(); GameInfo += 1; } else { $('.Line').hide(); };
    if ($('#checkboxBingo').is(':checked')){ $('.Bingo').show(); GameInfo += 1; } else { $('.Bingo').hide(); };
    if ($('#checkboxMyBonus').is(':checked')){ $('.MyBonus').show(); GameInfo += 1; } else { $('.MyBonus').hide(); };
    if ($('#checkboxBonusLine').is(':checked')){ $('.BonusLine').show(); GameInfo += 1; } else { $('.BonusLine').hide(); };
    if ($('#checkboxBonusBingo').is(':checked')){ $('.BonusBingo').show(); GameInfo += 1; } else { $('.BonusBingo').hide(); };
    if ($('#checkboxJackpotLine').is(':checked')){ $('.JackpotLine').show(); GameInfo += 1; } else { $('.JackpotLine').hide(); };
    if ($('#checkboxJackpotBingo').is(':checked')){ $('.JackpotBingo').show(); GameInfo += 1; } else { $('.JackpotBingo').hide(); };
    //Line  Bingo  MyBonus  BonusLine  BonusBingo  JackpotLine JackpotBingo
    //GameInfo += $('#checkbox1').is(':checked') ? 1 : 0;
    //alert(GameInfo);
}
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
function export2excelBingo() {
    pageHref = $('#pageReload').attr('data-excel-url');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = $('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    if ($('#checkbox1').is(':checked')){ tableTh1 = 1; } else { tableTh1 = 0; };
    if ($('#checkbox2').is(':checked')){ tableTh2 = 1; } else { tableTh2 = 0; };
    if ($('#checkbox3').is(':checked')){ tableTh3 = 1; } else { tableTh3 = 0; };
    if ($('#checkbox4').is(':checked')){ tableTh4 = 1; } else { tableTh4 = 0; };
    if ($('#checkbox5').is(':checked')){ tableTh5 = 1; } else { tableTh5 = 0; };
    if ($('#checkboxLine').is(':checked')){ tableLine = 1; } else { tableLine = 0; };
    if ($('#checkboxBingo').is(':checked')){ tableBingo = 1; } else { tableBingo = 0; };
    if ($('#checkboxMyBonus').is(':checked')){ tableMyBonus = 1; } else { tableMyBonus = 0; };
    if ($('#checkboxBonusLine').is(':checked')){ tableBonusLine = 1; } else { tableBonusLine = 0; };
    if ($('#checkboxBonusBingo').is(':checked')){ tableBonusBingo = 1; } else { tableBonusBingo = 0; };
    if ($('#checkboxJackpotLine').is(':checked')){ tableJackpotLine = 1; } else { tableJackpotLine = 0; };
    if ($('#checkboxJackpotBingo').is(':checked')){ tableJackpotBingo = 1; } else { tableJackpotBingo = 0; };
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker2I').val();
    ToGameTs = $('#datetimepicker3I').val();
    GameSort = $('#GameSort').val();
    FromTicketCost = $('#FromTicketCost').val();
    ToTicketCost = $('#ToTicketCost').val();
    FromPlayers = $('#FromPlayers').val();
    ToPlayers = $('#ToPlayers').val();
    FromTickets = $('#FromTickets').val();
    ToTickets = $('#ToTickets').val();
    FromLine = $('#FromLine').val();
    ToLine = $('#ToLine').val();
    FromBingo = $('#FromBingo').val();
    ToBingo = $('#ToBingo').val();
    FromMybonus = $('#FromMybonus').val();
    ToMybonus = $('#ToMybonus').val();
    FromBonusLine = $('#FromBonusLine').val();
    ToBonusLine = $('#ToBonusLine').val();
    FromBonusBingo = $('#FromBonusBingo').val();
    ToBonusBingo = $('#ToBonusBingo').val();
    FromJackpotLine = $('#FromJackpotLine').val();
    ToJackpotLine = $('#ToJackpotLine').val();
    FromJackpotBingo = $('#FromJackpotBingo').val();
    ToJackpotBingo = $('#ToJackpotBingo').val();
    FromLineVal = $('#FromLineVal').val();
    ToLineVal = $('#ToLineVal').val();
    FromBingoVal = $('#FromBingoVal').val();
    ToBingoVal = $('#ToBingoVal').val();
    FromMybonusVal = $('#FromMybonusVal').val();
    ToMybonusVal = $('#ToMybonusVal').val();
    FromBonusLineVal = $('#FromBonusLineVal').val();
    ToBonusLineVal = $('#ToBonusLineVal').val();
    FromBonusBingoVal = $('#FromBonusBingoVal').val();
    ToBonusBingoVal = $('#ToBonusBingoVal').val();
    FromJackpotLineVal = $('#FromJackpotLineVal').val();
    ToJackpotLineVal = $('#ToJackpotLineVal').val();
    FromJackpotBingoVal = $('#FromJackpotBingoVal').val();
    ToJackpotBingoVal = $('#ToJackpotBingoVal').val();
    
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + sortMenuOpen + 
            "," + tableTh1 + 
            "," + tableTh2 + 
            "," + tableTh3 + 
            "," + tableTh4 + 
            "," + tableTh5 + 
            "," + tableLine + 
            "," + tableBingo + 
            "," + tableMyBonus + 
            "," + tableBonusLine + 
            "," + tableBonusBingo + 
            "," + tableJackpotLine + 
            "," + tableJackpotBingo + 
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSort + 
            "," + FromTicketCost + 
            "," + ToTicketCost + 
            "," + FromPlayers + 
            "," + ToPlayers + 
            "," + FromTickets + 
            "," + ToTickets + 
            "," + FromLine + 
            "," + ToLine + 
            "," + FromBingo + 
            "," + ToBingo + 
            "," + FromMybonus + 
            "," + ToMybonus + 
            "," + FromBonusLine + 
            "," + ToBonusLine + 
            "," + FromBonusBingo + 
            "," + ToBonusBingo + 
            "," + FromJackpotLine + 
            "," + ToJackpotLine + 
            "," + FromJackpotBingo + 
            "," + ToJackpotBingo + 
            "," + FromLineVal + 
            "," + ToLineVal + 
            "," + FromBingoVal + 
            "," + ToBingoVal + 
            "," + FromMybonusVal + 
            "," + ToMybonusVal + 
            "," + FromBonusLineVal + 
            "," + ToBonusLineVal + 
            "," + FromBonusBingoVal + 
            "," + ToBonusBingoVal + 
            "," + FromJackpotLineVal + 
            "," + ToJackpotLineVal + 
            "," + FromJackpotBingoVal + 
            "," + ToJackpotBingoVal ; 
            //        "&TableSort=" + TableSort + 
            //"&ToJackpotLineVal=" + ToJackpotLineVal + 
            //"&FromJackpotBingoVal=" + FromJackpotBingoVal ;
    window.location.href = pageHref; 
}
function ExportToPNGBingoTable() {
    html2canvas($('#panelBingoContend'), {
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

 //end Bingo scripts  
 //start BlackJack scripts
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
                $('#BJcards').html(data.html); 
                $('#BJHead').html(data.seatid);
                $('#BJHead1').html(data.tableidTime);
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
    SeatID = $('#SeatID').val();
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
            "&PSID=" + PSID + 
            "&SeatID=" + SeatID + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
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
    SeatID = $('#SeatID').val();
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
            "&PSID=" + PSID + 
            "&SeatID=" + SeatID + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
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
    SeatID = $('#SeatID').val();
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
            "&PSID=" + PSID + 
            "&SeatID=" + SeatID + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
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
    SeatID = $('#SeatID').val();
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
            "&PSID=" + PSID + 
            "&SeatID=" + SeatID + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
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
    $('#SeatID').val("");
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
        setTimeout(function(){ $('th.switch').css('display', "table-cell"); }, 100);
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
        setTimeout(function(){ $('th.switch').css('display', "table-cell"); }, 100);
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
    $('#SeatID').val("");
    $('#FromGameBet').val("");
    $('#ToGameBet').val("");
    $('#FromGameWin').val("");
    $('#ToGameWin').val("");
        
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
                $('#BJHead1').html(data.tableidTime);
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
function export2excelBJ() {
    pageHref = $('#pageReload').attr('data-excel-url');
    
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = $('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker6I').val();
    ToGameTs = $('#datetimepicker7I').val();
    GameSort = $('#GameSort').val();
    TableSort = $('#TableSort').val();
    PSID = $('#PSID').val();
    SeatID = $('#SeatID').val();
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
            "&PSID=" + PSID + 
            "&SeatID=" + SeatID + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin ;
    //console.log(pageHref);
    window.location.href = pageHref; 
}
function ExportToPNGBJTable() {
    html2canvas($('#panelBJContend'), {
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

 //end BlackJack scripts
 //start Roulete scripts
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
                $('#roulettePic').html(data.html); 
                $('#rouletteHead').html(data.seatid); 
                $('#rouletteHead1').html(data.seatTime); 
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
    SeatID = $('#SeatIDR').val();
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
            "&SeatID=" + SeatID + 
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
    SeatID = $('#SeatIDR').val();
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
            "&SeatID=" + SeatID + 
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
    SeatID = $('#SeatIDR').val();
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
            "&SeatID=" + SeatID + 
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
    SeatID = $('#SeatIDR').val();
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
            "&SeatID=" + SeatID + 
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
    $('#SeatIDR').val("");
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
        //$('.switch').attr('colspan', 5);
        //setTimeout(function(){ $('th.switch').removeClass('switch'); }, 100);
        setTimeout(function(){ $('th.switch').css('display', "table-cell"); }, 100);
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
        setTimeout(function(){ $('th.switch').css('display', "table-cell"); }, 100);
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
        $('#SeatIDR').val("");
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
                $('#roulettePic').html(data.html); 
                $('#rouletteHead').html(data.seatid);
                $('#rouletteHead1').html(data.seatTime);
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
function export2excelR() {
    pageHref = $('#pageReload').attr('data-excel-url');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = $('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSort = $('#GameSortR').val();
    PSID = $('#PSIDR').val();
    SeatID = $('#SeatIDR').val();
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
            "&SeatID=" + SeatID + 
            "&FromGameNum=" + FromGameNum + 
            "&ToGameNum=" + ToGameNum + 
            "&FromGameBet=" + FromGameBet + 
            "&ToGameBet=" + ToGameBet + 
            "&FromGameWin=" + FromGameWin + 
            "&ToGameWin=" + ToGameWin + 
            "&FromGameJack=" + FromGameJack + 
            "&ToGameJack=" + ToGameJack ;
    window.location.href = pageHref; 
}
function ExportToPNGRTable() {
    html2canvas($('#panelRContend'), {
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

//end Roulete scripts
//start Roulete2 scripts
function changeModalWindowR2(NextPrev) {
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
        url:'ajax_nextPrevRoulette2History',
        dataType: "json",
        data:{'rowTS': rowTS, 'rowId': rowId, 'NextPrev': NextPrev, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#roulettePic').html(data.html); //seatid
                $('#rouletteHead').html(data.seatid);
                $('#rouletteHead1').html(data.seatTime);
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
$(document).on("click","tr.rowsR2 td", function(e){
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
        url:'ajax_statRoulette2History',
        dataType: "json",
        data:{'rowID': rowID, 'rowTS': rowTS, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#roulettePic').html(data.html); //seatid
                $('#rouletteHead').html(data.seatid);
                $('#rouletteHead1').html(data.seatTime);
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

//end Roulete scripts
//start Slots scripts
$(document).on("click","tr.rowsSlot td", function(e){
    wTop = $(window).height() / 2;
    wLeft = $(window).width() / 2;
    $(".faSpinner").css('top', wTop );
    $(".faSpinner").css("left", wLeft);
    $(".faSpinner").show();
    rowID = parseInt($(this).parent("tr").attr('data-psid'));
    rowTS = $(this).parent("tr").attr('data-timestamp');
    rowGS = $(this).parent("tr").attr('data-game_sequence');
    rowBet = $(this).parent("tr").attr('data-bet');
    rowWin = $(this).parent("tr").attr('data-paytable-win');     
    SlotID = $('#pageReload').attr('data-slotId');
    token = $('meta[name="csrf-token"]').attr('content');
    //alert (rowTS);
    //alert (rowGS);
    //alert (rowID);
    $.ajax({
        type:'POST',
        url:'ajax_SlotModalHistory',
        dataType: "json",
        data:{'rowID': rowID, 'rowTS': rowTS, 'rowGS': rowGS, 'SlotID': SlotID, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#SlotHead1').html(rowID); 
                $('#SlotHead2').html(rowTS);
                $('#totalBet').html(rowBet); 
                $('#totalWin').html(rowWin); 
                $('#Lines').html(data.gameHistoryRes.lines_of_play);
                size = 15;
                for (i = 1; i <= size; i++){
                   if (data.game_id[i] == 100){
                       $('#SlotWin' + i).hide();
                   } else {
                       $('#SlotWin' + i).show();
                   }
                   $('#SlotWin' + i).css('background-image', 'url("images/Slots/'+ SlotID +'_115.png")');
                   $('#SlotWin' + i).css('width', data.historylogRes.GameProperty.width  + 'px');
                   $('#SlotWin' + i).css('background-position', -1 * data.historylogRes.GameProperty.width * data.game_id[i] + 'px 0');
                   //$('#SlotWin' + i).css('width', data.GameProperty.width  + 'px');
                   console.log(data.game_id[i]);
                }
                $('#totalLinesPlayed').html(data.gameHistoryRes.lines_of_play);
                //$('#totalLinesPlayed').html(data.gameHistoryRes.win);
                $('#totalBetPerLine').html(data.gameHistoryRes.bet);
                $('#totalDenomination').html(data.gameHistoryRes.denomination);
                //$('#jackpotWon').html(data.jackpotWon);
                //$('#next-prevR').attr("data-Id", rowIds);
                //$('#next-prevR').attr("data-ts", rowTS);
                
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
function changeRowsPerPageSlot(rowsPerPage) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = rowsPerPage; // $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    pageSlotID = $('#pageReload').attr('data-slotId');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSeq = $('#GameSeq').val();
    PSID = $('#PSID').val();
    FromGameBet = $('#FromGameBet').val();
    ToGameBet = $('#ToGameBet').val();
    FromGameWin = $('#FromGameWin').val();
    ToGameWin = $('#ToGameWin').val();
    FromGameJackpot = $('#FromGameJackpot').val();
    ToGameJackpot = $('#ToGameJackpot').val();
    FromGameGamble = $('#FromGameGamble').val();
    ToGameGamble = $('#ToGameGamble').val();
    FromGameGambleWin = $('#FromGameGambleWin').val();
    ToGameGambleWin = $('#ToGameGambleWin').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + pageSlotID + 
            "," + sortMenuOpen +
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSeq + 
            "," + PSID +
            "," + FromGameBet +
            "," + ToGameBet +
            "," + FromGameWin +
            "," + ToGameWin +
            "," + FromGameJackpot +
            "," + ToGameJackpot +
            "," + FromGameGamble +
            "," + ToGameGamble +
            "," + FromGameGambleWin +
            "," + ToGameGambleWin +
            "')" 
    window.location.href = pageHref; 
}
function changePageNumSlot(PageNum1) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = PageNum1 //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    pageSlotID = $('#pageReload').attr('data-slotId');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSeq = $('#GameSeq').val();
    PSID = $('#PSID').val();
    FromGameBet = $('#FromGameBet').val();
    ToGameBet = $('#ToGameBet').val();
    FromGameWin = $('#FromGameWin').val();
    ToGameWin = $('#ToGameWin').val();
    FromGameJackpot = $('#FromGameJackpot').val();
    ToGameJackpot = $('#ToGameJackpot').val();
    FromGameGamble = $('#FromGameGamble').val();
    ToGameGamble = $('#ToGameGamble').val();
    FromGameGambleWin = $('#FromGameGambleWin').val();
    ToGameGambleWin = $('#ToGameGambleWin').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + pageSlotID + 
            "," + sortMenuOpen +
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSeq + 
            "," + PSID +
            "," + FromGameBet +
            "," + ToGameBet +
            "," + FromGameWin +
            "," + ToGameWin +
            "," + FromGameJackpot +
            "," + ToGameJackpot +
            "," + FromGameGamble +
            "," + ToGameGamble +
            "," + FromGameGambleWin +
            "," + ToGameGambleWin +
            "')" 
    window.location.href = pageHref; 
}
function changePageSortSlot(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    pageSlotID = $('#pageReload').attr('data-slotId');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSeq = $('#GameSeq').val();
    PSID = $('#PSID').val();
    FromGameBet = $('#FromGameBet').val();
    ToGameBet = $('#ToGameBet').val();
    FromGameWin = $('#FromGameWin').val();
    ToGameWin = $('#ToGameWin').val();
    FromGameJackpot = $('#FromGameJackpot').val();
    ToGameJackpot = $('#ToGameJackpot').val();
    FromGameGamble = $('#FromGameGamble').val();
    ToGameGamble = $('#ToGameGamble').val();
    FromGameGambleWin = $('#FromGameGambleWin').val();
    ToGameGambleWin = $('#ToGameGambleWin').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + pageSlotID + 
            "," + sortMenuOpen +
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSeq + 
            "," + PSID +
            "," + FromGameBet +
            "," + ToGameBet +
            "," + FromGameWin +
            "," + ToGameWin +
            "," + FromGameJackpot +
            "," + ToGameJackpot +
            "," + FromGameGamble +
            "," + ToGameGamble +
            "," + FromGameGambleWin +
            "," + ToGameGambleWin +
            "')" 
    window.location.href = pageHref; 
}
function changePageSortMenuSlot() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    pageSlotID = $('#pageReload').attr('data-slotId');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSeq = $('#GameSeq').val();
    PSID = $('#PSID').val();
    FromGameBet = $('#FromGameBet').val();
    ToGameBet = $('#ToGameBet').val();
    FromGameWin = $('#FromGameWin').val();
    ToGameWin = $('#ToGameWin').val();
    FromGameJackpot = $('#FromGameJackpot').val();
    ToGameJackpot = $('#ToGameJackpot').val();
    FromGameGamble = $('#FromGameGamble').val();
    ToGameGamble = $('#ToGameGamble').val();
    FromGameGambleWin = $('#FromGameGambleWin').val();
    ToGameGambleWin = $('#ToGameGambleWin').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + pageSlotID + 
            "," + sortMenuOpen +
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSeq + 
            "," + PSID +
            "," + FromGameBet +
            "," + ToGameBet +
            "," + FromGameWin +
            "," + ToGameWin +
            "," + FromGameJackpot +
            "," + ToGameJackpot +
            "," + FromGameGamble +
            "," + ToGameGamble +
            "," + FromGameGambleWin +
            "," + ToGameGambleWin +
            "')" 
    window.location.href = pageHref; 
}
function cleanSortFunctionSlot() {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
    $('#datetimepicker4').datetimepicker('setEndDate', output );
    $('#datetimepicker5').datetimepicker('setEndDate', output );
    $('#datetimepicker5').datetimepicker('setStartDate', "");
    $('#datetimepicker4I').val("");
    $('#datetimepicker5I').val("");
    $('#GameSeq').val("");
    $('#PSID').val("");
    $('#FromGameBet').val("");
    $('#ToGameBet').val("");
    $('#FromGameWin').val("");
    $('#ToGameWin').val("");
    $('#FromGameJackpot').val("");
    $('#ToGameJackpot').val("");
    $('#FromGameGamble').val("");
    $('#ToGameGamble').val("");
    $('#FromGameGambleWin').val("");
    $('#ToGameGambleWin').val("");
    changePageSortMenuSlot();
    
}
function sortMenuSlot() {
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
        $('#GameSeq').val("");
        $('#PSID').val("");
        $('#FromGameBet').val("");
        $('#ToGameBet').val("");
        $('#FromGameWin').val("");
        $('#ToGameWin').val("");
        $('#FromGameJackpot').val("");
        $('#ToGameJackpot').val("");
        $('#FromGameGamble').val("");
        $('#ToGameGamble').val("");
        $('#FromGameGambleWin').val("");
        $('#ToGameGambleWin').val("");

        //changePageSortMenuR();
        
    }
    
}
function changeSlotGame() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    pageSlotID = $('#SlotGame').val(); //$('#pageReload').attr('data-slotId');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSeq = $('#GameSeq').val();
    PSID = $('#PSID').val();
    FromGameBet = $('#FromGameBet').val();
    ToGameBet = $('#ToGameBet').val();
    FromGameWin = $('#FromGameWin').val();
    ToGameWin = $('#ToGameWin').val();
    FromGameJackpot = $('#FromGameJackpot').val();
    ToGameJackpot = $('#ToGameJackpot').val();
    FromGameGamble = $('#FromGameGamble').val();
    ToGameGamble = $('#ToGameGamble').val();
    FromGameGambleWin = $('#FromGameGambleWin').val();
    ToGameGambleWin = $('#ToGameGambleWin').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + pageSlotID + 
            "," + sortMenuOpen +
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSeq + 
            "," + PSID +
            "," + FromGameBet +
            "," + ToGameBet +
            "," + FromGameWin +
            "," + ToGameWin +
            "," + FromGameJackpot +
            "," + ToGameJackpot +
            "," + FromGameGamble +
            "," + ToGameGamble +
            "," + FromGameGambleWin +
            "," + ToGameGambleWin +
            "')" 
    window.location.href = pageHref; 
}
function changeSlotGame2(SlotID) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    pageSlotID = SlotID; //$('#SlotGame').val(); //$('#pageReload').attr('data-slotId');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    GameSeq = $('#GameSeq').val();
    PSID = $('#PSID').val();
    FromGameBet = $('#FromGameBet').val();
    ToGameBet = $('#ToGameBet').val();
    FromGameWin = $('#FromGameWin').val();
    ToGameWin = $('#ToGameWin').val();
    FromGameJackpot = $('#FromGameJackpot').val();
    ToGameJackpot = $('#ToGameJackpot').val();
    FromGameGamble = $('#FromGameGamble').val();
    ToGameGamble = $('#ToGameGamble').val();
    FromGameGambleWin = $('#FromGameGambleWin').val();
    ToGameGambleWin = $('#ToGameGambleWin').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&arr=" + pageRowsPerPage + 
            "," + pageOrder + 
            "," + pageDesc + 
            "," + pageSlotID + 
            "," + sortMenuOpen +
            "&array=" + FromGameTs + 
            "," + ToGameTs + 
            "," + GameSeq + 
            "," + PSID +
            "," + FromGameBet +
            "," + ToGameBet +
            "," + FromGameWin +
            "," + ToGameWin +
            "," + FromGameJackpot +
            "," + ToGameJackpot +
            "," + FromGameGamble +
            "," + ToGameGamble +
            "," + FromGameGambleWin +
            "," + ToGameGambleWin +
            "')" 
    window.location.href = pageHref; 
}
function ExportToPNGSlot() {
    html2canvas($('#SlotHistory_modal'), {
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


function ExportToPNGSlotTable() {
    html2canvas($('#SlotBody'), {
        onrendered: function(canvas) {
            theCanvas = canvas;
            //document.body.appendChild(canvas);
            //$(".faSpinner").show();
            // Convert and download as image 
            Canvas2Image.saveAsPNG(canvas); 
            //document.body.append(canvas);
            // Clean up 
            //document.body.removeChild(canvas);
            //$(".faSpinner").hide();
        }
    });
}
//end Slots scripts
//start Statistics scripts 
function ExportToPNGGameTable() {
    html2canvas($('#panelGameContend'), {
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


function changePageSortTerminal(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    pageHref = pageHref + 
            "?OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "')" 
    window.location.href = pageHref; 
}
function export2excelTerminal() {
    pageHref = $('#pageReload').attr('data-excel-url');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    
    pageHref = pageHref + 
            "?OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder ; 
    window.location.href = pageHref; 
}
function ExportToPNGTerminatsTable() {
    html2canvas($('#panelTerminatsContend'), {
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

//end Statistics scripts
//start psAccounting scripts 
function searchPsAccounting() {
    pageHref = $('#pageReload').attr('data-URL');
    
    startDate = $('#datetimepicker2I').val();
    endDate = $('#datetimepicker3I').val();
    
    pageHref = pageHref + 
            "?startDate=" + startDate + 
            "&endDate=" + endDate + 
            "')" 
    window.location.href = pageHref; 
    
    
}    
function export2excelPsAccounting() {
    pageHref = $('#pageReload').attr('data-excel-url');
    
    startDate = $('#datetimepicker2I').val();
    endDate = $('#datetimepicker3I').val();
    
    pageHref = pageHref + 
            "?startDate=" + startDate + 
            "&endDate=" + endDate ; 
    window.location.href = pageHref; 
}
function ExportToPNGpsAccounting() {
    html2canvas($('#panelPsAccounting'), {
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

//end psAccounting scripts
//start User-log-all scripts 
function changeRowsPerPageAll(rowsPerPage) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = rowsPerPage; // $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    PSID = $('#PSID').val();
    Message = $('#Message').val();
    UserName = $('#UserName').val();
    ip = $('#ip').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&PSID=" + PSID + 
            "&Message=" + Message + 
            "&UserName=" + UserName + 
            "&ip=" + ip + 
            "')" 
    window.location.href = pageHref; 
}
function changePageNumAll(PageNum1) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = PageNum1 //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    PSID = $('#PSID').val();
    Message = $('#Message').val();
    UserName = $('#UserName').val();
    ip = $('#ip').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&PSID=" + PSID + 
            "&Message=" + Message + 
            "&UserName=" + UserName + 
            "&ip=" + ip + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortAll(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    PSID = $('#PSID').val();
    Message = $('#Message').val();
    UserName = $('#UserName').val();
    ip = $('#ip').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&PSID=" + PSID + 
            "&Message=" + Message + 
            "&UserName=" + UserName + 
            "&ip=" + ip + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortMenuAll() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    PSID = $('#PSID').val();
    Message = $('#Message').val();
    UserName = $('#UserName').val();
    ip = $('#ip').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&PSID=" + PSID + 
            "&Message=" + Message + 
            "&UserName=" + UserName + 
            "&ip=" + ip + 
            "')" 
    window.location.href = pageHref; 
}
function cleanSortFunctionAll() {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day + " 23:55";
    $('#datetimepicker4').datetimepicker('setEndDate', output );
    $('#datetimepicker5').datetimepicker('setEndDate', output );
    $('#datetimepicker5').datetimepicker('setStartDate', "");
    $('#datetimepicker4I').val("");
    $('#datetimepicker5I').val("");
    $('#PSID').val("");
    $('#Message').val("");
    $('#UserName').val("");
    $('#ip').val("");
    changePageSortMenuAll();
    
}

//use datetimepicker4 and datetimepicker5
function sortMenuAll() {
    if (sortMenuRV == 0) {
        $('.MenuSort').show();
        sortMenuRV = 1;
    }else{
        $('.MenuSort').hide();
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
        $('#PSID').val("");
        $('#Message').val("");
        $('#UserName').val("");
        $('#ip').val("");
        //changePageSortMenuAll();
        
    }
    
}
function export2excelAll() {
    pageHref = $('#pageReload').attr('data-excel-url');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = $('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    PSID = $('#PSID').val();
    Message = $('#Message').val();
    UserName = $('#UserName').val();
    ip = $('#ip').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "&PSID=" + PSID + 
            "&Message=" + Message + 
            "&UserName=" + UserName + 
            "&ip=" + ip ;
    window.location.href = pageHref; 
}
function ExportToPNGAllTable() {
    html2canvas($('#panelGameContend'), {
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

//end User-log-all scripts
//start Game Statistics scripts 
function changePageSortGameBJ(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    pageHref = pageHref + 
            "?OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "')" 
    window.location.href = pageHref; 
}
function export2excelGameBJ() {
    pageHref = $('#pageReload').attr('data-excel-url');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    
    pageHref = pageHref + 
            "?OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder ; 
    window.location.href = pageHref; 
}

//end Game Statistics scripts
