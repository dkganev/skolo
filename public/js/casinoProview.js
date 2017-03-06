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

    newBoxLeft = (ev.pageX - position.left - elPointerX ); //31
    newBoxTop = (ev.pageY - position.top - elPointerY ); //105
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
    if($("#GridColor").is(':checked')){
        $( "#DivColor" ).show();
    }else{
        $( "#DivColor" ).hide();
    }    
});
$( "#GridBingoFeed" ).click(function() {
    if($("#GridBingoFeed").is(':checked')){
        //$( "#DivBingoFeed" ).show();
        //$( "#DivBingoWins" ).show();
    }else{
        //$( "#DivBingoFeed" ).hide();
        //$( "#DivBingoWins" ).hide();
    }    
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
var sortMenuRV = 0;
//start Events scripts
function changeRowsPerPageEvents(rowsPerPage) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = rowsPerPage; // $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    PSID = $('#PSID').val();
    ErrorCode = $('#ErrorCode').val();
    ErrorText = $('#ErrorText').val();
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&PSID=" + PSID + 
            "&ErrorCode=" + ErrorCode + 
            "&ErrorText=" + ErrorText + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "')" 
    window.location.href = pageHref; 
}
function changePageNumEvents(PageNum1) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = PageNum1 //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc = $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    PSID = $('#PSID').val();
    ErrorCode = $('#ErrorCode').val();
    ErrorText = $('#ErrorText').val();
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&PSID=" + PSID + 
            "&ErrorCode=" + ErrorCode + 
            "&ErrorText=" + ErrorText + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortEvents(pageOrderV, pageDescV) {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = pageOrderV; //  $('#pageReload').attr('data-OrderQuery');
    pageDesc =  pageDescV; // $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    PSID = $('#PSID').val();
    ErrorCode = $('#ErrorCode').val();
    ErrorText = $('#ErrorText').val();
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&PSID=" + PSID + 
            "&ErrorCode=" + ErrorCode + 
            "&ErrorText=" + ErrorText + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "')" 
    window.location.href = pageHref; 
}
function changePageSortMenuEvents() {
    pageHref = $('#pageReload').attr('data-URL');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = 1; //$('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    PSID = $('#PSID').val();
    ErrorCode = $('#ErrorCode').val();
    ErrorText = $('#ErrorText').val();
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&PSID=" + PSID + 
            "&ErrorCode=" + ErrorCode + 
            "&ErrorText=" + ErrorText + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs + 
            "')" 
    window.location.href = pageHref; 
}
function cleanSortFunctionEvents() {
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
    $('#ErrorText').val("");
    $('#ErrorCode').val("");
    changePageSortMenuEvents();
    
}
function datetimepicker44() {
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
function sortMenuEvents() {
    if (sortMenuRV == 0) {
        $('.EventsSort').show();
        sortMenuRV = 1;
    }else{
        $('.EventsSort').hide();
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
        $('#ErrorText').val("");
        $('#ErrorCode').val("");
        //changePageSortMenuR();
        
    }
    
}
function export2excelEvents() {
    pageHref = $('#pageReload').attr('data-excel-url');
    pageRowsPerPage = $('#pageReload').attr('data-rowsPerPage');
    pageNum = $('#pageReload').attr('data-page');
    pageOrder = $('#pageReload').attr('data-OrderQuery');
    pageDesc =  $('#pageReload').attr('data-desc');
    
    sortMenuOpen = sortMenuRV;
    PSID = $('#PSID').val();
    ErrorCode = $('#ErrorCode').val();
    ErrorText = $('#ErrorText').val();
    FromGameTs = $('#datetimepicker4I').val();
    ToGameTs = $('#datetimepicker5I').val();
    
    pageHref = pageHref + 
            "?page=" + pageNum + 
            "&rowsPerPage=" + pageRowsPerPage + 
            "&OrderDesc=" + pageDesc + 
            "&OrderQuery=" + pageOrder + 
            "&sortMenuOpen=" + sortMenuOpen + 
            "&PSID=" + PSID + 
            "&ErrorCode=" + ErrorCode + 
            "&ErrorText=" + ErrorText + 
            "&FromGameTs=" + FromGameTs + 
            "&ToGameTs=" + ToGameTs ; 
    window.location.href = pageHref; 
}

function ExportToPNGEventsTable() {
    html2canvas($('#panelEventsContend'), {
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

//End Events scripts
