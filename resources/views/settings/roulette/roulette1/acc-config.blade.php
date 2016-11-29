<div class="container">
  <div class="row">
      <div class="col-lg-8">
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; margin-bottom: 10px;">

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Roulette 1</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">Roulette 2</a></li>

            </ul>
        </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div style="padding-top:2px; margin-top: 0px; background-color: none;">
          <!-- Secondary Navigation -->
          <ul class="breadcrumb" style="background-color: #e5e6e8 !important; margin-bottom: 10px;">
            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Wheel Settings</a></li>

            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelconfig')}}')">Wheel Config</a></li>

            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/psconfig')}}')">Terminals Config</a></li>

            <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/accconfig')}}')">Accounting Config</a></li>
          </ul>
      </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container-->

<!-- Wheel Config -->
<div class="container">
<div class="row">
<div class="col-lg-3">
  <div class="panel panel-primary">

    <div class="panel-heading">
      <h3 class='text-center' style="display: inline; color: white; font-family: 'italic';  padding-left: 10%;">
        Accounting Config
      </h3>
    </div>

    <div class="panel-body">
    <form action="/settings/bingo/sphereconfig/edit" method="POST" role="form" id="acc-config-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-3">

        <div class="form-group" style="width:190px; display: inline-block;">
          <label>ID:</label><br>
          <input disabled class="form-control text-center" type="text" name="id" value="{{ $acc_config->id }}">
        </div>

        <div class="form-group" style="width:190px; display: inline-block;">
          <label>Acc IP:</label><br>
          <input class="form-control text-center" type="text" name="acc_ip" value="{{ $acc_config->acc_ip }}">
        </div>

        <div class="form-group" style="width:190px; display: inline-block;">
          <label>Acc Port:</label><br>
          <input class="form-control text-center" type="text" name="acc_port" value="{{ $acc_config->acc_port }}">
        </div>

        <div class="form-group" style="width:190px; display: inline-block;">
          <label>Game Port:</label><br>
          <input class="form-control text-center" type="text" name="game_port" value="{{ $acc_config->game_port }}">
        </div>

      </div><!-- End Col -->

      <div class="col-lg-12">
         <hr style="margin: 15px 0 15px 0">

          {{ csrf_field() }}
          <button id="acc-config-btn" type="submit" class="btn btn-danger btn-sm btn-block">Update</button>

      </div>

    </form>
   </div><!-- End Panel Body--> 

  </div><!-- End Panel -->  
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->
<script>
$('button#acc-config-btn').on('click', function(event) {
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: '/settings/roulette1/accconfig/edit',
        data: $('form#acc-config-form').serialize(),
    }).done(function() {
        javascript:ajaxLoad('{{url('/settings/roulette1/accconfig')}}');
    });
});
</script>