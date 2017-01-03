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

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">@lang('messages.Wheel Settings')</a></li>

                    <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelconfig')}}')">@lang('messages.Wheel Config')</a></li>

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/psconfig')}}')">@lang('messages.Terminals Config')</a></li>
  
                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
                </ul>
            </div>
  	</div>
    </div><!-- End Row -->
</div><!-- End Container-->
<!-- Wheel Config -->
<div class="container">
<div class="row">
<div class="col-lg-6">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h3 class='text-center' style="display: inline; color: white; font-family: 'italic';  padding-left: 15%;">
        @lang('messages.Wheel Config')
      </h3>

      <a style="margin:5px;" class="btn btn-warning btn-sm pull-right" onclick="ExportToPNG();">
        @lang('messages.Export to PNG')
      </a>
    </div>

    <div class="panel-body">
    <form action="/settings/roulette/wheelconfig/edit" method="POST" role="form" id="weel-config-form">
      <!-- FIRST COLUMN -->
      <div class="col-lg-6">

        <div class="form-group" style="width:270px; display: inline-block;">
          <label for="wheeltype">@lang('messages.Roulette')Wheel Type:</label><br>
          <select name="wheeltype" id="wheeltype" class="selectpicker" data-actions-box="true">
            <option value="0" {{ $wheel_config->wheeltype  == 0 ? ' selected="true"' : '' }} >
                    @lang('messages.Automatic')
            </option>

            <option value="1" {{ $wheel_config->wheeltype  == 1 ? ' selected="true"' : '' }} >
                    @lang('messages.Live')
            </option>
          </select>
        </div>

        <div class="form-group" style="width:270px; display: inline-block;">
          <label for="roulettetype">Roulette Type:</label><br>
          <select name="roulettetype" id="roulettetype" class="selectpicker" data-actions-box="true">
            <option value="0" {{ $wheel_config->roulettetype  == 0 ? ' selected="true"' : '' }} >
                    @lang('messages.Single Zero')
            </option>

            <option value="1" {{ $wheel_config->roulettetype  == 1 ? ' selected="true"' : '' }} >
                    @lang('messages.Double Zero')
            </option>
          </select>
        </div>

        <div class="form-group" style="width:270px; display: inline-block;">
          <label for="colorscheme">Color Scheme:</label><br>
          <select name="colorscheme" id="colorscheme" class="selectpicker" data-actions-box="true">
            <option value="0" {{ $wheel_config->colorscheme  == 0 ? ' selected="true"' : '' }} >
                    @lang('messages.Green')
            </option>
            
            <option value="1" {{ $wheel_config->colorscheme  == 1 ? ' selected="true"' : '' }} >
                    @lang('messages.Roulette')Blue
            </option>
            <option value="2" {{ $wheel_config->colorscheme  == 2 ? ' selected="true"' : '' }} >
                   @lang('messages.Red')
            </option>
            
            <option value="3" {{ $wheel_config->colorscheme  == 3 ? ' selected="true"' : '' }} >
                    @lang('messages.Black')
            </option>

            <option value="4" {{ $wheel_config->colorscheme  == 4 ? ' selected="true"' : '' }} >
                    @lang('messages.Yellow')
            </option>
            
            <option value="5" {{ $wheel_config->colorscheme  == 5 ? ' selected="true"' : '' }} >
                    @lang('messages.Classic')
            </option>
          </select>
        </div>

      </div><!-- End Col -->

      <!-- SECOND COLUMN -->
      <div class="col-lg-6">

        <div class="form-group" style="width:270px; display: inline-block;">
            <label for="partialrepeat">Partial Repeat:</label><br>
            <select name="partialrepeat" id="partialrepeat" class="selectpicker" data-actions-box="true">
              <option value="0" {{  $wheel_config->partialrepeat  == 0 ? ' selected="true"' : '' }} >
                      @lang('messages.Disabled')
              </option>

              <option value="1" {{  $wheel_config->partialrepeat  == 1 ? ' selected="true"' : '' }} >
                      @lang('messages.Enabled')
              </option>
            </select>
        </div>

        <div class="form-group" style="width:270px; display: inline-block;">
            <label for="chevalrule">Cheval Rule:</label><br>
            <select name="chevalrule" id="chevalrule" class="selectpicker" data-actions-box="true">
              <option value="0" {{  $wheel_config->chevalrule  == 0 ? ' selected="true"' : '' }} >
                      @lang('messages.Disabled')
              </option>

              <option value="1" {{  $wheel_config->chevalrule  == 1 ? ' selected="true"' : '' }} >
                      @lang('messages.Enabled')
              </option>
            </select>
        </div>

        <div class="form-group" style="width:270px; display: inline-block;">
            <label for="halfbackrule">Halfback Rule:</label><br>
            <select name="halfbackrule" id="halfbackrule" class="selectpicker" data-actions-box="true">
              <option value="0" {{  $wheel_config->halfbackrule  == 0 ? ' selected="true"' : '' }} >
                      @lang('messages.Disabled')
              </option>

              <option value="1" {{  $wheel_config->halfbackrule  == 1 ? ' selected="true"' : '' }} >
                      @lang('messages.Enabled')
              </option>
            </select>
        </div>

      </div><!-- End Col -->

      <div class="col-lg-12">
         <hr style="margin: 15px 0 15px 0">

          {{ csrf_field() }}
          <button id="wheel-config-btn" type="submit" class="btn btn-danger btn-sm btn-block">@lang('messages.Update')</button>

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
        url: '/settings/roulette2/wheelconfig/edit',
        data: $('form#weel-config-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/roulette2/wheelconfig')}}');
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