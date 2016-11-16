var currentMousePos = { x: -1, y: -1 };
var elPointerX = 0;
var elPointerY = 0;

$(document).mousemove(function(event) {
    currentMousePos.x = event.pageX;
    currentMousePos.y = event.pageY;
});

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    //alert(ev.pageX);
    targetID = ev.target.id;
    //alert(targetID);
    targetDataID = $( "#" + targetID ).attr("data-id");
    //alert(targetDataID);
    var position2 = $( "#" + targetID ).offset();
    
    elPointerX = ev.pageX - position2.left;
    elPointerY = ev.pageY - position2.top;
    //alert (elPointerX + "---" + elPointerY);
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();

    var position = $( "#casinoPreview" ).offset();
    var data = ev.dataTransfer.getData("text");
    document.getElementById(data).style.position = "absolute";

    newBoxLeft = (ev.pageX - position.left - elPointerX + 31);
    newBoxTop = (ev.pageY - position.top - elPointerY + 105);
    document.getElementById(data).style.left = newBoxLeft + "px";
    document.getElementById(data).style.top = newBoxTop + "px";
    token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:'POST',
        url:'ajax_casinoBox',
        dataType: "json",
        data: {'targetDataID': targetDataID ,'newBoxTop': newBoxTop ,'newBoxLeft': newBoxLeft , _token: token},
        success: function(data) {
            //
        },
        error: function (error) {
            //
        }
    });
}

$( "#GridDrag" ).click(function() {
    alert ("test");
    if($("#GridDrag").is(':checked')){
        $( ".box" ).attr('draggable', "folse"); //bootstrap-modal-form-open
        $( ".box" ).attr("data-target",'#casinoTerminalInfo');
    }else{
        $( ".box" ).attr('draggable', "true");
        $( ".box" ).attr("data-target",'');
    }
});
$( "#GridColor" ).click(function() {
    if($("#GridColor").is(':checked'))
        $( "#DivColor" ).show();
    else
        $( "#DivColor" ).hide();    
});
$( "#GridBingoFeed" ).click(function() {
    if($("#GridBingoFeed").is(':checked'))
        $( "#DivBingoFeed" ).show();
    else
        $( "#DivBingoFeed" ).hide();    
});
function boxModalWindow(bixID) {
    $('#ModalBoxID').text(bixID);
    $('#ModalCredit').text($("#box" + bixID + " .boxCdredit").text());
    $('#ModalStatus').text($("#box" + bixID).attr('data_boxStatus'));
    
    //alert($("#box" + bixID + " #boxCdredit").text()); data_boxStatus
}

function ExportToPNGPreview() {
    html2canvas($('#casinoPreview'), {
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

