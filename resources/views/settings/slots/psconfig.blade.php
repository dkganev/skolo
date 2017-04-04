<style>
    @media screen and (max-width: 1400px) {
        #bingoHistory_modal {
            overflow: scroll;
        }
        #bingoHistory2_modal {
            overflow: scroll;
        }
    }
</style>

<div class="container-fluid">
    <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default" id="panelSlotsContend">
                <div class="panel-heading">
                    <div>
                        <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 35%;">
                            @lang('messages.Slots')
                        </h2>
                    
                    </div>
                </div>
                <div class="panel-body" >
                    <?PHP $discard = array (1,33,69,70); $varF = 0; $varF1 = 0;?>
                    
                    <div  class="col-lg-2" >
                        <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Slots'):<br/>&nbsp;</h3>
                        <hr style="margin: 7px 0 12px 0;">
                        <div class="row" style="overflow-y: scroll; height: 850px;  position: absolute;">
                            <div  class="col-lg-12" >
                                
                                @foreach($games as $val)
                                    @if (!in_array($val->gameid, $discard) )
                                        <div class="form-group form-group-sm">
                                            <div class="input-group">
                                                <span id="yelow-span{{$val->gameid}}" class="input-group-addon yelow-color" onclick="ChaneGame( {{$val->gameid}}, '{{$val->description}}' );" style="background: darkgray;">{{ $val->gameid }}</span>
                                                <input id="yelow-input{{$val->gameid}}" class="form-control text-center yelow-color" name="game_min_bet" readonly no  onclick="ChaneGame( {{$val->gameid}}, '{{$val->description}}' );" style=" background: darkgray; " value="{{ $val->description }}" type="text"  placeholder="Game Min Bet" aria-describedby="sizing-addon2">
                                            </div>
                                        </div>
                                        <?PHP if ($varF == 0) {$varF = 1;$varFval = $val; } ?>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3"  >    
                        <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Terminals'):<br/>&nbsp;</h3>
                        <hr style="margin: 7px 0 12px 0;">
                        <table class="table" style=" margin-left: 10px; ">
                            <thead class="w3-blue-grey">
                                <tr>
                                    <th>@lang('messages.PS ID')</th>
                                    <th>@lang('messages.Seat ID')</th>
                                    <th>@lang('messages.Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($server_ps as $val)
                                    <tr >
                                        <td id="yelow-psid{{$val->psid}}" class="yelow-color" >{{ $val->psid }}</td>
                                        <td id="yelow-seatid{{$val->psid}}" class="yelow-color" >{{ $val->seatid }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs ps-config-toggle"
                                                onclick="ChanePS( {{$val->psid}} );"    
                                                autofocus="" accesskey="" type="submit"
                                                contenteditable=""data-id="{{ $val->psid }}"
                                                style="{{$varF1 == 0 ? 'color: #ffe630' : ''  }}"
                                            >
                                                @lang('messages.Edit')
                                            </button>
                                        </td>
                                    </tr>
                                    <?PHP if ($varF1 == 0) {$varF1 = 1;} ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <input id="pageReload" type="hidden" data-table="psconf" data-gameid="{{$varFval->gameid}}" data-description="{{$varFval->description}}" data-psid="{{$server_ps->first()->psid}}"  />
                    <div class="col-lg-7">
                        <div class=" "> 
                            <div class="" style="">
                                <!-- Secondary Navigation -->
                                
                                <ul class="breadcrumb">
                                  <li id="psconf" class="active"><a onclick="ChaneMenu( 'psconf' );">@lang('messages.Wheel Config')</a></li>
                                  <!--<li><a >@lang('messages.Gamble')</a></li>
                                  <li><a >@lang('messages.Denominations')</a></li>
                                  <li><a >@lang('messages.betschemes')</a></li> -->
                                  <li id="acc_config"><a onclick="ChaneMenu( 'acc_config' );">@lang('messages.Accounting Config')</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <div>
                                    <h2 id="subPageHeader" style="display: inline; color:#fff; font-family: 'italic';  padding-left: 0%;">
                                        @lang('messages.Game'): {{$varFval->description}}   @lang('messages.PS ID'): {{$server_ps->first()->psid}}
                                    </h2>

                                    <!--<a class="btn btn-warning  pull-right" onclick="export2excelBingo();"> 
                                        <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                                        @lang('messages.Export')
                                    </a>
                                    <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>-->
                                    <a  class="btn btn-warning  pull-right" onclick="ExportToPNG();">
                                        @lang('messages.Export to PNG')
                                    </a>
                                </div>
                            </div>
                            <div id='subPageBody' class="panel-body" >
                                <form></form>
                            </div>

                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
tr {
width: 100%;
display: inline-table;
table-layout: fixed;
}

table{
 height:850px;    
 display: -moz-groupbox;    
}
tbody{
  overflow-y: scroll;      
  height: 810px;            
    
  position: absolute;
}
</style>
<script>
    Timer123 = setTimeout(function(){ ChaneGame( {{$varFval->gameid}}, '{{$varFval->description}}'); }, 200);
    
    
    
    function ChaneGame(gameid, description) {
        //pageHref = $('#pageReload').attr('data-URL');
        //gameid = $('#pageReload').attr('data-gameid');
        //description = $('#pageReload').attr('data-description');
        psid = $('#pageReload').attr('data-psid');
        table = $('#pageReload').attr('data-table');
        token = $('meta[name="csrf-token"]').attr('content');
        pageHref = "SlotsChaneGame";
        //console.log("test" + $('form').serialize());
        $.ajax({
            type:'POST',
            url:pageHref,
            dataType: "json",
            data:{'gameid': gameid, 'description': description, 'psid': psid, 'table': table,  _token: token},
            success:function(data){
                if (data.success == "success"){
                    //alert ("Success");
                    $('#subPageHeader').text("@lang('messages.Game'): " + data.description + "  @lang('messages.PS ID'): " + data.psid );
                    $('#subPageBody').html(data.html);
                    $('#pageReload').attr('data-gameid', gameid);
                    $('#pageReload').attr('data-description', description);
                    $('#formUdate').val(token);
                    $('#gameUdate').val(gameid);
                    $('.yelow-color').css('color', '#555');
                    $('#yelow-span' + gameid ).css('color', '#ffe630');
                    $('#yelow-input' + gameid ).css('color', '#ffe630');
                    $('#yelow-psid' + psid ).css('color', '#ffe630');
                    $('#yelow-seatid' + psid ).css('color', '#ffe630');
                    
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
            }

        });

    };

    function ChanePS(psid) {
        //pageHref = $('#pageReload').attr('data-URL');
        gameid = $('#pageReload').attr('data-gameid');
        description = $('#pageReload').attr('data-description');
        //psid = $('#pageReload').attr('data-psid');
        table = $('#pageReload').attr('data-table');
        token = $('meta[name="csrf-token"]').attr('content');
        pageHref = "SlotsChaneGame";
        //console.log("test" + $('form').serialize());
        $.ajax({
            type:'POST',
            url:pageHref,
            dataType: "json",
            data:{'gameid': gameid, 'description': description, 'psid': psid, 'table': table,  _token: token},
            success:function(data){
                if (data.success == "success"){
                    //alert ("Success");
                    $('#subPageHeader').text("@lang('messages.Game'): " + data.description + "  @lang('messages.PS ID'): " + data.psid );
                    $('#subPageBody').html(data.html);
                    $('.yelow-color').css('color', '#555');
                    $('#yelow-span' + gameid ).css('color', '#ffe630');
                    $('#yelow-input' + gameid ).css('color', '#ffe630');
                    $('#yelow-psid' + psid ).css('color', '#ffe630');
                    $('#yelow-seatid' + psid ).css('color', '#ffe630');
                    $('#pageReload').attr('data-psid', psid);
                    $('#formUdate').val(token);
                    $('#gameUdate').val(gameid);
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
            }

        });

    };
    
    function ChaneMenu(table) {
        //pageHref = $('#pageReload').attr('data-URL');
        gameid = $('#pageReload').attr('data-gameid');
        description = $('#pageReload').attr('data-description');
        psid = $('#pageReload').attr('data-psid');
        //table = $('#pageReload').attr('data-table');
        token = $('meta[name="csrf-token"]').attr('content');
        pageHref = "SlotsChaneGame";
        //console.log("test" + $('form').serialize());
        $.ajax({
            type:'POST',
            url:pageHref,
            dataType: "json",
            data:{'gameid': gameid, 'description': description, 'psid': psid, 'table': table,  _token: token},
            success:function(data){
                if (data.success == "success"){
                    //alert ("Success");
                    $('#subPageHeader').text("@lang('messages.Accounting Config')" );
                    $('#subPageBody').html(data.html);
                    //$('#pageReload').attr('data-table', table);
                    $('#formUdate').val(token);
                    $('#gameUdate').val(gameid);
                    $('.active').removeClass('active');
                    $('#' + table).addClass('active');
                    
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
            }

        });

    };
    //$('#UpdateGame').on('click', function(event) {
    function UpdateGame() {
        pageHref = "/statistics/psconfUpdate";
        $.ajax({
            type:'POST',
            url:pageHref,
            dataType: "json",
            data: $("#registerSubmit").serialize(),
            success:function(data){
                if (data.success == "success"){
                    $('#OK').show();
                    UpdateTimer123 = setTimeout(function(){ $('#OK').hide(); }, 10000);
                    //alert ("Success");
                    //$('#subPageHeader').text("@lang('messages.Game'): " + data.description + "  @lang('messages.PS ID'): " + data.psid );
                // $('#subPageBody').html(data.html);
            
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                console.log("Error " + error);
                $('#remove').show();
                UpdateTimer123 = setTimeout(function(){ $('#remove').hide(); }, 10000);
            }
    
        
        });


    }
   // });
   function UpdateAcc() {
        pageHref = "/statistics/accUpdate";
        $.ajax({
            type:'POST',
            url:pageHref,
            dataType: "json",
            data: $("#registerSubmit").serialize(),
            success:function(data){
                if (data.success == "success"){
                    $('#OK').show();
                    UpdateTimer123 = setTimeout(function(){ $('#OK').hide(); }, 10000);
                    //alert ("Success");
                    //$('#subPageHeader').text("@lang('messages.Game'): " + data.description + "  @lang('messages.PS ID'): " + data.psid );
                // $('#subPageBody').html(data.html);
            
                }
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                console.log("Error " + error);
                $('#remove').show();
                UpdateTimer123 = setTimeout(function(){ $('#remove').hide(); }, 10000);
            }
    
        
        });


    }
    
    function ExportToPNG() {
    html2canvas($('#panelSlotsContend'), {
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
   
</script>
