<div class="container">
  <div class="row">
      <div class="col-lg-6">
        <h1 style="margin-top: 0px;" class="page-header">Roulette - Wheel Settings</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette/wheelsettings')}}')">Wheel Settings</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette/wheelconfig')}}')">Wheel Config</a></li>

            </ul>
        </div>
  	</div>
  </div><!-- End Row -->
</div><!-- End Container-->

<!-- Wheel Settings -->
<div class="container">
<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary">

    <div class="panel-heading">
      <h2 class="panel-title text-center" style="color:white;"><strong>Wheel Settings</strong></h2>
    </div>

    <div class="panel-body">
    <form action="/settings/roulette/wheelconfig/edit" method="POST" role="form" id="weel-settings-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-4">

          <div class="form-group">
              <label style="color: #474747">Wheel Label:</label><br>
              <input name="wheel_label" value="{{ $wheel_settings->wheel_label }}" type="text" class="form-control">
          </div>

          <div class="form-group">
              <label style="color: #474747">Interface:</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">#</span>
              <input name="interface" value="{{ $wheel_settings->interface }}" type="text" class="form-control" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
              <label style="color: #474747">Current IP Address:</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
              <input name="current_ip_address" value="{{ $wheel_settings->current_ip_address }}" type="text" class="form-control" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
              <label style="color: #474747">New IP Address:</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
              <input name="new_ip_addres" value="{{ $wheel_settings->new_ip_addres }}" type="text" class="form-control" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
              <label style="color: #474747">Subnet Mask:</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
              <input name="subnet_mask" value="{{ $wheel_settings->subnet_mask }}" type="text" class="form-control" aria-describedby="sizing-addon2">
            </div>
          </div>

          <div class="form-group">
            <label style="color: #474747">Default Gateway:</label><br>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">#</span>
              <input name="default_gateway" value="{{ $wheel_settings->default_gateway }}" type="text" class="form-control" aria-describedby="sizing-addon2">
            </div>
          </div>

      </div><!-- End Col -->

      <!-- SECOND COLUMN -->
      <div class="col-lg-4">
        <div class="form-group">
            <label style="color: #474747">Volume Center:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="volume_center" value="{{ $wheel_settings->volume_center }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Stream URL:</label><br>
            <input name="stream_url" value="{{ $wheel_settings->stream_url }}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label style="color: #474747">Heartbeat:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="heartbeat" value="{{ $wheel_settings->heartbeat }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Bet Time:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="bet_time" value="{{ $wheel_settings->bet_time }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
          <label style="color: #474747">Idle Launch:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="idle_launch" value="{{ $wheel_settings->idle_launch }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Games:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="games" value="{{ $wheel_settings->games }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

      </div><!-- End Col -->

      <!-- THIRD COLUMN -->
      <div class="col-lg-4">

        <div class="form-group">
            <label style="color: #474747">Statistics Orientation:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="statistics_orientation" value="{{ $wheel_settings->statistics_orientation }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Blow Speed:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="blow_speed" value="{{ $wheel_settings->blow_speed }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Rotor Speed:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="rotor_speed" value="{{ $wheel_settings->rotor_speed }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Roulette Type:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="rlt_type" value="{{ $wheel_settings->rlt_type }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Auto Max Video:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="auto_max_video" value="{{ $wheel_settings->auto_max_video }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group">
            <label style="color: #474747">Video on Statistic:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">#</span>
            <input name="video_on_statistic" value="{{ $wheel_settings->video_on_statistic }}" type="text" class="form-control" aria-describedby="sizing-addon2">
          </div>
        </div>
       
      </div><!-- End Col -->

      <div class="col-lg-12">
         <hr style="margin: 15px 0 15px 0">

        <div class="pull-right" style="width: 400px;">
          {{ csrf_field() }}
          <button id="main-config-rlt" type="submit" class="btn btn-success btn-sm btn-block">Update</button>
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
        url: '/settings/roulette/wheelconfig/edit',
        data: $('form#weel-settings-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/roulette/wheelsettings/')}}');
    });
});
</script>