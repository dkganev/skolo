<div class="container">
  <div class="row">
      <div class="col-lg-12">
        <div style="padding-top:2px; margin-top: 0px;">
            <ul class="breadcrumb">
                <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">@lang('messages.Main Config')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')"></a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">@lang('messages.Max Balls')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">@lang('messages.Sphere Config')</a></li>

	        <li class="active" ><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
            </ul>
        </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container -->

<div class="container">
<div class="row">
<div class="col-lg-4">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h3 class='text-center' style="display: inline; color: white; font-family: 'italic';  padding-left: 10%;">
        @lang('messages.Accounting Config')
      </h3>

      <a class="btn btn-warning btn-sm pull-right" onclick="ExportToPNG();">
          @lang('messages.Export to PNG')
      </a>
    </div>

    <div class="panel-body">
    <form action="/settings/bingo/sphereconfig/edit" method="POST" role="form" id="acc-config-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-3">
        <div class="form-group" style="width:300px; display: inline-block;">
          <label>@lang('messages.ID'):</label><br>
          <input disabled class="form-control text-center" type="text" name="id" value="{{ $acc_config->id }}">
        </div>

        <div class="form-group" style="width:300px; display: inline-block;">
          <label>@lang('messages.Acc IP'):</label><br>
          <input class="form-control text-center" type="text" name="acc_ip" value="{{ $acc_config->acc_ip }}">
        </div>

        <div class="form-group" style="width:300px; display: inline-block;">
          <label>@lang('messages.Acc Port'):</label><br>
          <input class="form-control text-center" type="text" name="acc_port" value="{{ $acc_config->acc_port }}">
        </div>

        <div class="form-group" style="width:300px; display: inline-block;">
          <label>@lang('messages.Game Port'):</label><br>
          <input class="form-control text-center" type="text" name="game_port" value="{{ $acc_config->game_port }}">
        </div>

      </div><!-- End Col -->

      <div class="col-lg-12">
         <hr style="margin: 15px 0 15px 0">

          {{ csrf_field() }}
          <button id="acc-config-btn" type="submit" class="btn btn-danger btn-sm btn-block">@lang('messages.Update')</button>

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
        url: '/settings/bingo/accconfig/edit',
        data: $('form#acc-config-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}');
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