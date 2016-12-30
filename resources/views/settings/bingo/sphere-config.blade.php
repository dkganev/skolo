<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div style="padding-top:2px; margin-top: 0px;">
            <ul class="breadcrumb">
                <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">@lang('messages.Main Config')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">@lang('messages.My Bonus')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">@lang('messages.Max Balls')</a></li>

	        <li class="active" ><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">@lang('messages.Sphere Config')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
            </ul>
        </div>
	</div><!--End Col -->
</div><!-- End Row -->

<div class="container">
<div class="row">
<div class="col-lg-4">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class='text-center' style="display: inline; color: white; font-family: 'italic';  padding-left: 15%;">
          @lang('messages.Sphere Config')
      </h3>

        <a class="btn btn-warning btn-sm pull-right" onclick="ExportToPNG();">
            @lang('messages.Export to PNG')
        </a>
    </div>

    <div class="panel-body">
    <form action="/settings/bingo/sphereconfig/edit" method="POST" role="form" id="sphere-config-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-3">

        <div class="form-group" style="width:300px; display: inline-block;">
          <label for="wheeltype">@lang('messages.Sphere ID'):</label><br>
          <input disabled class="form-control text-center" type="text" name="id" value="{{ $sphere_config->id }}">
        </div>

        <div class="form-group" style="width:300px; display: inline-block;">
          <label>@lang('messages.Sphere IP'):</label><br>
          <input class="form-control text-center" type="text" name="sphere_ip" value="{{ $sphere_config->sphere_ip }}">
        </div>

        <div class="form-group" style="width:300px; display: inline-block;">
          <label>@lang('messages.Sphere Port'):</label><br>
          <input class="form-control text-center" type="text" name="sphere_port" value="{{ $sphere_config->sphere_port }}">
        </div>

      </div><!-- End Col -->


      <div class="col-lg-12">
         <hr style="margin: 15px 0 15px 0">

          {{ csrf_field() }}
          <button id="sphere-config-btn" type="submit" class="btn btn-danger btn-sm btn-block">@lang('messages.Update')</button>

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
<script>
    function ExportToPNG() {
        html2canvas($('.panel'), {
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