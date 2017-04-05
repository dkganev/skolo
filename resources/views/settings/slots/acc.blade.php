<form id="registerSubmit">
    <!-- FIRST COLUMN -->
    <div class="col-lg-3">
        @foreach($results as $conf)
        

            <div class="form-group" style="width:300px; display: inline-block;">
                <label>@lang('messages.ID'):</label><br>
                <input disabled class="form-control text-center" type="text" name="id" value="{{ $conf->id }}">
            </div>

            <div class="form-group" style="width:300px; display: inline-block;">
                <label>@lang('messages.Acc IP'):</label><br>
                <input class="form-control text-center" type="text" name="acc_ip" value="{{ $conf->acc_ip }}">
            </div>

            <div class="form-group" style="width:300px; display: inline-block;">
                <label>@lang('messages.Acc Port'):</label><br>
                <input class="form-control text-center" type="text" name="acc_port" value="{{ $conf->acc_port }}">
            </div>
            <div class="form-group" style="width:300px; display: inline-block;">
                <label>@lang('messages.Game ID'):</label><br>
                <input class="form-control text-center" type="text" name="game_port" value="{{ $conf->game_id }}">
            </div>
            <div class="form-group" style="width:300px; display: inline-block;">
                <label>@lang('messages.Game Port'):</label><br>
                <input class="form-control text-center" type="text" name="game_port" value="{{ $conf->game_port }}">
            </div>
            <!--<div class="form-group" style="width:300px; display: inline-block;">
                <label>@lang('messages.generate_dummy_stop_positions'):</label><br>
                <input class="form-control text-center" type="text" name="game_port" value="{{ $conf->generate_dummy_stop_positions }}">
            </div>-->
        @endforeach
        <br /><br /><br />
        <input id="formUdate" name="_token" value="1234" type="hidden" data-table="psconf"    />
        <input id="gameUdate" name="gameid" value="1234" type="hidden" data-table="psconf"    />

        <div class="form-group" style=" display: inline-block;">
            <a  onclick="UpdateAcc();"
                accesskey=""style="width:300px;  " 
                contenteditable=""class="btn btn-danger pull-right ps-config-submit"
            >
                <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                @lang('messages.Update')
            </a>
        </div>    
    </div>
    <!-- End Col -->
</form>
