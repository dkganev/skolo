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
               //alert(boxID); balsHistory
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });
    
}
$(document).on("click","tr.rowsR td", function(e){
    //alert(e.target.innerHTML);
    //console.log( $(this).parent("tr").attr('data-id'));
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
                
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });

    
});    

$(document).on("click","tr.rowsBJ td", function(e){
    //alert(e.target.innerHTML);
    //console.log( $(this).parent("tr").attr('data-id'));
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
                
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });

    
});    

    




