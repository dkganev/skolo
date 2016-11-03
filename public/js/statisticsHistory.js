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
    //alert(e.target.innerHTML);
    //console.log( $(this).parent("tr").attr('data-id'));
    
    wTop = $(window).height() / 2;
    wLeft = $(window).width() / 2;
    $(".faSpinner").css('top', wTop );
    $(".faSpinner").css("left", wLeft);
    $(".faSpinner").show();
    rowID = parseInt($(this).parent("tr").attr('data-id'));
    rowTS = $(this).parent("tr").attr('data-ts');
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
                $('#jackpotWon').html(data.jackpotWon);
                //$(".faSpinner").hide();
                
            }
            //$(".faSpinner").hide();
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
    //$(".faSpinner").css("left", wLeft);
    $(".faSpinnerBJ").show();
    $('#BJcards').hide();
    rowID = parseInt($(this).parent("tr").attr('data-id'));
    rowTS = $(this).parent("tr").attr('data-ts');
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
                $(".faSpinnerBJ").hide();
                $('#BJcards').show()
            }
            $(".faSpinnerBJ").hide();
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $(".faSpinnerBJ").hide();
            
        }
        
    });

    
});    

    




