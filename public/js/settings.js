var TimeOut = [1];
var addMenu = 0;

function BonusPoints2Money() {
    $("#refresh").show();
    $("#OK").hide();
    $("#remove").hide();
    BonusPoints2Money1 = $("#BonusPoints2Money").val();
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_BonusPoints2Money',
        dataType: "json",
        data:{'BonusPoints2Money': BonusPoints2Money1, _token: token},
        success:function(data){
            if (data.success == "success"){
                $("#refresh").hide();
                $("#OK").show();
                $("#remove").hide();    
            }else{
                alert ("Unexpected wrong.");
                $("#refresh").hide();
                $("#OK").hide();
                $("#remove").show();
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $("#refresh").hide();
            $("#OK").hide();
            $("#remove").show();
        }
    });
}
function ExportToPNGBonusPoints2MoneyTable() {
    html2canvas($('#panelBonusPoints2Money'), {
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

function CardTypeBonusPeriod() {
    $("#refresh").show();
    $("#OK").hide();
    $("#remove").hide();
    bonus_period = $("#bonus_period").val();
    bronze_gold_boundery = $("#bronze_gold_boundery").val();
    gold_platinum_boundery = $("#gold_platinum_boundery").val();
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_CardTypeBonusPeriod',
        dataType: "json",
        data:{'bonus_period': bonus_period, 'bronze_gold_boundery': bronze_gold_boundery, 'gold_platinum_boundery': gold_platinum_boundery, _token: token},
        success:function(data){
            if (data.success == "success"){
                $("#refresh").hide();
                $("#OK").show();
                $("#remove").hide();    
            }else{
                alert ("Unexpected wrong.");
                $("#refresh").hide();
                $("#OK").hide();
                $("#remove").show();
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $("#refresh").hide();
            $("#OK").hide();
            $("#remove").show();
        }
    });
}

function EditBet2BonusPoints(id) {
  $(".row" + id).hide();
  $(".rowInput" + id).show();
}
function SaveBet2BonusPoints(id) {
    $("#refreshEdit" + id).show();
    $("#OKEdit"  + id).hide();
    $("#removeEdit"  + id).hide();
    name = $("#name"  + id).val();
    bronze_money_for_bonus_point = $("#bronze_money_for_bonus_point"  + id).val();
    gold_money_for_bonus_point = $("#gold_money_for_bonus_point"  + id).val();
    platinum_money_for_bonus_point = $("#platinum_money_for_bonus_point"  + id).val();
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_EditBet2BonusPoints',
        dataType: "json",
        data:{'RowID': id, 'name': name, 'bronze_money_for_bonus_point': bronze_money_for_bonus_point, 'gold_money_for_bonus_point': gold_money_for_bonus_point, 'platinum_money_for_bonus_point': platinum_money_for_bonus_point, _token: token},
        success:function(data){
            if (data.success == "success"){
                $("#refreshEdit"  + id).hide();
                $("#OKEdit"  + id).show();
                $("#removeEdit"  + id).hide(); 
                $(".row" + id).show();
                $(".rowInput" + id).hide();
                $("#td1" + id).text(name);
                $("#td2" + id).text(bronze_money_for_bonus_point);
                $("#td3" + id).text(gold_money_for_bonus_point);
                $("#td4" + id).text(platinum_money_for_bonus_point);
                clearTimeout(TimeOut[id]);
                TimeOut[id] = setTimeout(function(){ $("#OKEdit"  + id).hide(); }, 20000);
            
            }else{
                alert ("Unexpected wrong.");
                $("#refreshEdit"  + id).hide();
                $("#OKEdit"  + id).hide();
                $("#removeEdit"  + id).show();
                TimeOut[id] = setTimeout(function(){ $("#removeEdit"  + id).hide(); }, 20000);
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $("#refreshEdit").hide();
            $("#OKEdit").hide();
            $("#removeEdit").show();
            TimeOut[id] = setTimeout(function(){ $("#removeEdit"  + id).hide(); }, 20000);
        }
    });
}
function RemoveBet2BonusPoints(id) {
    $("#refreshEdit" + id).show();
    $("#OKEdit"  + id).hide();
    $("#removeEdit"  + id).hide();
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_RemoveBet2BonusPoints',
        dataType: "json",
        data:{'RowID': id, _token: token},
        success:function(data){
            if (data.success == "success"){
                $("#refreshEdit"  + id).hide();
                $("#OKEdit"  + id).show();
                $("#removeEdit"  + id).hide();
                $("#row" + id).hide();
                clearTimeout(TimeOut[id]);
                TimeOut[id] = setTimeout(function(){ $("#OKEdit"  + id).hide(); }, 20000);
            
            }else{
                alert ("Unexpected wrong.");
                $("#refreshEdit"  + id).hide();
                $("#OKEdit"  + id).hide();
                $("#removeEdit"  + id).show();
                TimeOut[id] = setTimeout(function(){ $("#removeEdit"  + id).hide(); }, 20000);
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
            $("#refreshEdit").hide();
            $("#OKEdit").hide();
            $("#removeEdit").show();
            TimeOut[id] = setTimeout(function(){ $("#removeEdit"  + id).hide(); }, 20000);
        }
    });
}
function AddBet2BonusPoints(id) {
    if (addMenu == 0){
        $(".rowInputAdd").show();
        $("#addGame").text('Close Add');
        addMenu = 1;
    }else{
        $(".rowInputAdd").hide();
        $("#addGame").text('Add Game');
        addMenu = 0;
    }
}
function SaveAddBet2BonusPoints() {
    $("#refresh").show();
    $("#OK").hide();
    $("#remove").hide();
    id = $("#nameAdd").val();
    if (id == 0){
       $("#errorAdd").show();
    }else {
        $("#errorAdd").hide();
        //alert($("#nameAdd option:selected").text());
        name = $("#nameAdd option:selected").text();
        bronze_money_for_bonus_point = $("#bronze_money_for_bonus_pointAdd").val();
        gold_money_for_bonus_point = $("#gold_money_for_bonus_pointAdd").val();
        platinum_money_for_bonus_point = $("#platinum_money_for_bonus_pointAdd").val();
        token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url:'ajax_SaveAddBet2BonusPoints',
            dataType: "json",
            data:{'id': id, 'name': name, 'bronze_money_for_bonus_point': bronze_money_for_bonus_point, 'gold_money_for_bonus_point': gold_money_for_bonus_point, 'platinum_money_for_bonus_point': platinum_money_for_bonus_point, _token: token},
            success:function(data){
                if (data.success == "success"){
                    $("#refresh").hide();
                    $("#OK").show();
                    $("#remove").hide();
                    $("#example tbody").prepend(data.html);
                    clearTimeout(TimeOut['Add']);
                    TimeOut['Add'] = setTimeout(function(){ $("#OK").hide(); }, 20000);
                    $(".rowInputAdd").hide();
                    $("#addGame").text('Add Game');
                    addMenu = 0;

                }else{
                    alert (data.error);
                    $("#refresh").hide();
                    $("#OK").hide();
                    $("#remove").show();
                    TimeOut['Add'] = setTimeout(function(){ $("#remove").hide(); }, 20000);
                    $(".rowInputAdd").hide();
                    $("#addGame").text('Add Game');
                    addMenu = 0;
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                $("#refresh").hide();
                $("#OK").hide();
                $("#remove").show();
                TimeOut['Add'] = setTimeout(function(){ $("#remove").hide(); }, 20000);
                $(".rowInputAdd").hide();
                $("#addGame").text('Add Game');
                addMenu = 0;
            }
        });
    }
}
