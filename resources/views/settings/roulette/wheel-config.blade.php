<div class="container">
  <div class="row">
      <div class="col-lg-6">
        <h1 style="margin-top: 0px;" class="page-header">Roulette - Wheel Config</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette/wheelsettings')}}')">Wheel Config</a></li>

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette/wheelconfig')}}')">Wheel Config</a></li>

            </ul>
        </div>
  	</div>
  </div><!-- End Row -->
</div><!-- End Container-->

<!-- Wheel Settings -->
<div class="container">
<div class="row">
<div class="col-lg-6">
  <div class="panel panel-primary">

    <div class="panel-heading">
      <h2 class="panel-title text-center" style="color:white;"><strong>Wheel Settings</strong></h2>
    </div>

    <div class="panel-body">
    <form action="/settings/roulette/wheelconfig/edit" method="POST" role="form" id="weel-config-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-6">

          <div class="form-group">
              <label style="color: #474747">Wheel Type:</label><br>
              <input name="wheeltype" value="{{ $wheel_config->wheeltype }}" type="text" class="form-control">
          </div>

          <div class="form-group">
              <label style="color: #474747">Roulette Type:</label><br>
              <input name="roulettetype" value="{{ $wheel_config->roulettetype }}" type="text" class="form-control">
          </div>

          <div class="form-group">
              <label style="color: #474747">Color Scheme:</label><br>
              <input name="colorscheme" value="{{ $wheel_config->colorscheme }}" type="text" class="form-control">
          </div>

      </div><!-- End Col -->

      <!-- SECOND COLUMN -->
      <div class="col-lg-6">

        <div class="form-group">
            <label style="color: #474747">Partial Repeat:</label><br>
            <input name="partialrepeat" value="{{ $wheel_config->partialrepeat }}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label style="color: #474747">Cheval Rule:</label><br>
            <input name="chevalrule" value="{{ $wheel_config->chevalrule }}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label style="color: #474747">Halfback Rule:</label><br>
            <input name="halfbackrule" value="{{ $wheel_config->halfbackrule }}" type="text" class="form-control">
        </div>

      </div><!-- End Col -->

      <div class="col-lg-12">
         <hr style="margin: 15px 0 15px 0">

          {{ csrf_field() }}
          <button id="wheel-config-btn" type="submit" class="btn btn-success btn-sm btn-block">Update</button>

      </div>

    </form>
   </div><!-- End Panel Body--> 

  </div><!-- End Panel -->  
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->

<script>
$('button#wheel-config-btn').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        method: 'POST',
        url: '/settings/roulette/wheelconfig/edit',
        data: $('form#weel-config-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/roulette/wheelconfig')}}');
    });
});
</script>