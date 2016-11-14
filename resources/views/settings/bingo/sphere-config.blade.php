<div class="container">
<div class="row">
    <div class="col-lg-6">
        {{-- <h1 style="margin-top: 0px;" class="page-header">Bingo - Sphere Config</h1> --}}
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">Sphere Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">Accounting Config</a></li>

            </ul>
        </div>
	</div><!--End Col -->
</div><!-- End Row -->

<!-- Wheel Config -->
<div class="container">
<div class="row">
<div class="col-lg-3">
  <div class="panel panel-primary">

    <div class="panel-heading">
      <h2 class="panel-title text-center" style="color:white;"><strong>Wheel Config</strong></h2>
    </div>

    <div class="panel-body">
    <form action="/settings/bingo/sphereconfig/edit" method="POST" role="form" id="sphere-config-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-3">

        <div class="form-group" style="width:190px; display: inline-block;">
          <label for="wheeltype">ID:</label><br>
          <input disabled class="form-control text-center" type="text" name="id" value="{{ $sphere_config->id }}">
        </div>

        <div class="form-group" style="width:190px; display: inline-block;">
          <label>Sphere IP:</label><br>
          <input class="form-control text-center" type="text" name="sphere_ip" value="{{ $sphere_config->sphere_ip }}">
        </div>

        <div class="form-group" style="width:190px; display: inline-block;">
          <label>Sphere Port:</label><br>
          <input class="form-control text-center" type="text" name="sphere_port" value="{{ $sphere_config->sphere_port }}">
        </div>

      </div><!-- End Col -->


      <div class="col-lg-12">
         <hr style="margin: 15px 0 15px 0">

          {{ csrf_field() }}
          <button id="sphere-config-btn" type="submit" class="btn btn-success btn-sm btn-block">Update</button>

      </div>

    </form>
   </div><!-- End Panel Body--> 

  </div><!-- End Panel -->  
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->
<script>
$('button#sphere-config-btn').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        method: 'POST',
        url: '/settings/bingo/sphereconfig/edit',
        data: $('form#sphere-config-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}');
    });
});
</script>