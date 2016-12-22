<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div style="padding-top:2px; margin-top: 0px;">
                <ul class="breadcrumb" style="margin-bottom: 10px;">

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">@lang('messages.Roulette') 1</a></li>

                    <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">@lang('messages.Roulette') 2</a></li>

                </ul>
            </div>
        </div>
    </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div style="padding-top:2px; margin-top: 0px; background-color: none;">
                <ul class="breadcrumb" style="margin-bottom: 10px;">

                    <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">@lang('messages.Wheel Settings')</a></li>

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelconfig')}}')">@lang('messages.Wheel Config')</a></li>

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/psconfig')}}')">@lang('messages.Terminals Config')</a></li>
  
                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
                </ul>
            </div>
  	</div>
    </div><!-- End Row -->
</div><!-- End Container-->

<!-- Wheel Settings -->
<div class="container">
<div class="row">
<div class="col-lg-8">
  <div class="panel panel-default" id="wheel-settings-panel-rlt-2">

    <div class="panel-heading">
        <h2 class='text-center' style="display: inline; color: white; font-family: 'italic';  padding-left: 37%;">
           @lang('messages.Wheel Settings')
        </h2>

        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
        <a class="btn btn-warning btn-sm pull-right" onclick="ExportToPNGBJWheelSettings2();">
            @lang('messages.Export to PNG')
        </a>
    </div>


    <div class="panel-body">
    <form action="/settings/roulette2/wheelconfig/edit" method="POST" role="form" id="weel-settings-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-4">
      
          <div class="form-group">
              <label style="color: #474747">@lang('messages.Game ID'):</label><br>
              <input name="game_id" value="{{ $main_config->game_id }}" type="text" class="form-control text-center">
          </div>

          <div class="form-group">
              <label style="color: #474747">@lang('messages.Wheel Label'):</label><br>
              <input name="wheel_label" value="{{ $wheel_settings->wheel_label }}" type="text" class="form-control text-center">
          </div>

          <div class="form-group">
              <label style="color: #474747">@lang('messages.Interface'):</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">#</span>
              <input name="interface" value="{{ $wheel_settings->interface }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
              <label style="color: #474747">@lang('messages.Current IP Address'):</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
              <input name="current_ip_address" value="{{ long2ip($wheel_settings->current_ip_address) }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
              <label style="color: #474747">@lang('messages.New IP Address'):</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
              <input name="new_ip_addres" value="{{ long2ip($wheel_settings->new_ip_addres) }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
              <label style="color: #474747">@lang('messages.Subnet Mask'):</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
              <input name="subnet_mask" value="{{ long2ip($wheel_settings->subnet_mask) }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
            <label style="color: #474747">@lang('messages.Default Gateway'):</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">#</span>
              <input name="default_gateway" value="{{ long2ip($wheel_settings->default_gateway) }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
            </div>
          </div>

      </div><!-- End Col -->

      <!-- SECOND COLUMN -->
      <div class="col-lg-4">
        <div class="form-group">
            <label style="color: #474747">@lang('messages.Volume Center'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="volume_center" value="{{ $wheel_settings->volume_center }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Stream URL'):</label><br>
            <input name="stream_url" value="{{ $wheel_settings->stream_url }}" type="text" class="form-control text-center">
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Heartbeat'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="heartbeat" value="{{ $wheel_settings->heartbeat }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Bet Time') (@lang('messages.seconds')):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="bet_time" value="{{ $wheel_settings->bet_time }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
          <label style="color: #474747">@lang('messages.Idle Launch'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="idle_launch" value="{{ $wheel_settings->idle_launch }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Games'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="games" value="{{ $wheel_settings->games }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

      </div><!-- End Col -->

      <!-- THIRD COLUMN -->
      <div class="col-lg-4">

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Statistics Orientation'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="statistics_orientation" value="{{ $wheel_settings->statistics_orientation }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Blow Speed'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="blow_speed" value="{{ $wheel_settings->blow_speed }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Rotor Speed'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="rotor_speed" value="{{ $wheel_settings->rotor_speed }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group" >
          <label for="rlt_type">@lang('messages.Roulette')Roulette Type:</label><br>
          <select name="rlt_type" id="rlt_type" class="selectpicker" data-actions-box="true">
            <option value="0" {{ $wheel_settings->rlt_type  == 0 ? ' selected="true"' : '' }} >
                    @lang('messages.Single Zero')
            </option>

            <option value="1" {{ $wheel_settings->rlt_type  == 1 ? ' selected="true"' : '' }} >
                    @lang('messages.Double Zero')
            </option>
          </select>
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Auto Max Video'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="auto_max_video" value="{{ $wheel_settings->auto_max_video }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">@lang('messages.Video on Statistic'):</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="video_on_statistic" value="{{ $wheel_settings->video_on_statistic }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
          </div>
        </div>
       
      </div><!-- End Col -->

      <div class="col-lg-12">
        <hr style="margin: 15px 0 15px 0">
        <strong>DB: roulette_sas1</strong>
        <div class="pull-right" style="width: 400px;">
          {{ csrf_field() }}
          <button id="main-config-rlt" type="submit" class="btn btn-danger btn-sm btn-block">@lang('messages.Update')</button>
        </div>

      </div>

    </form>
   </div><!-- End Panel Body--> 

  </div><!-- End Panel -->  
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->

<script>
$('button#main-config-rlt').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        method: 'POST',
        url: '/settings/roulette2/wheelsettings/edit',
        data: $('form#weel-settings-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings/')}}');
    });
});
</script>
<script>
    function ExportToPNGBJWheelSettings2() {
    html2canvas($('#wheel-settings-panel-rlt-2'), {
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