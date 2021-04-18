@include('settings.bingo.max-balls-modals')
<div class="container">
  <div class="row">
      <div class="col-lg-12">
        <div style="padding-top:2px; margin-top: 0px">
            <ul class="breadcrumb">
              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">@lang('messages.Main Config')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">@lang('messages.My Bonus')</a></li>

	        <li class="active" ><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">@lang('messages.Max Balls')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">@lang('messages.Sphere Config')</a></li>

	        <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
            </ul>
        </div>
  	</div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
<div class="row">
<div class="col-lg-12">

<!--    Context Classes  -->
<div class="panel panel-default" id="max-balls-panel">
    <div class="panel-heading">
        <a id="toggle-max-balls" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addMaxBallsModal">
            @lang('messages.Add')
        </a>

        <h2 class='text-center' style="display: inline; color:#fff; font-family: 'italic';  padding-left: 30%;">
             @lang('messages.Max Balls')
        </h2>

        <a class="btn btn-warning  btn-sm pull-right" href="/settings/bingo/maxballs/export">
            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>
            @lang('messages.Export')
        </a>

        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
        <a class="btn btn-warning btn-sm pull-right" onclick="ExportToPNGMaxBalls();">
            @lang('messages.Export to PNG')
        </a>
    </div>

    <div class="panel-body">
      <form action="/settings/bingo/maxballs/edit" method="POST">
        <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                data-toggle="table"
                data-locale="en-US"

                data-pagination="true"
                data-side-pagination="client"
                data-page-list="[3, 5]"

                data-classes="table-condensed"
        >
          <thead class="w3-blue-grey">
            <tr>
              <th data-sortable="true">@lang('messages.ID')</th>
              <th data-sortable="true">@lang('messages.Fixed')</th>                         
              <th data-sortable="true">@lang('messages.Ticket Cost')</th>
              <th data-sortable="true">@lang('messages.JL. Max Ball')</th>
              <th data-sortable="true">@lang('messages.JB. Max Ball')</th>
              <th data-sortable="true">@lang('messages.BL. Max Ball')</th>
              <th data-sortable="true">@lang('messages.BB. Max Ball')</th>
              <th data-sortable="true">@lang('messages.JL. Ticket Count')</th>
              <th data-sortable="true">@lang('messages.JB. Ticket Count')</th>
              <th data-sortable="true">@lang('messages.BL. Ticket Count')</th>
              <th data-sortable="true">@lang('messages.BB. Ticket Count')</th>

              <th class="text-center">@lang('messages.Action')</th>
            </tr>
          </thead>
            <tbody>
            @foreach($jackpot_steps as $steps)
      <tr class="tr-class" id="{{ $steps->id }}">
          <td><span class="badge">{{ $steps->id }}</span></td>

          <td style="width:20px;">
            <input type="hidden" name="bingo_cost_fixed" value="false">
            <input name="bingo_cost_fixed" type="checkbox" {{ $steps->bingo_cost_fixed ? " checked" : "" }}>
          </td>

          <td>
            <input name="bingo_ticket_cost" value="{{ $steps->bingo_ticket_cost }}" type="text" class="form-control">
          </td>
          
          <td>
            <input  name="jackpot_line_max_ball" value="{{ $steps->jackpot_line_max_ball }}" type="text" class="form-control">
          </td>

          <td>
            <input  name="jackpot_bingo_max_ball" value="{{ $steps->jackpot_bingo_max_ball }}" type="text" class="form-control">
          </td>
          
          <td>
            <input  name="bonus_line_max_ball" value="{{ $steps->bonus_line_max_ball }}" type="text" class="form-control">
          </td>

          <td>
            <input  name="bonus_bingo_max_ball" value="{{ $steps->bonus_bingo_max_ball }}" type="text" class="form-control">
          </td>

          <td>
            <input  name="jackpo_line_ticket_cnt" value="{{ $steps->jackpo_line_ticket_cnt }}" type="text" class="form-control">
          </td>

          <td>
            <input  name="jackpo_bingo_ticket_cnt" value="{{ $steps->jackpo_bingo_ticket_cnt }}" type="text" class="form-control">
          </td>
          <td>
            <input  name="bonus_line_ticket_cnt" value="{{ $steps->bonus_line_ticket_cnt }}" type="text" class="form-control">
          </td>
          <td>
            <input  name="bonus_bingo_ticket_cnt" value="{{ $steps->bonus_bingo_ticket_cnt }}" type="text" class="form-control">
          </td>
          <td style="width: 140px;">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $steps->id }}">
              <button  type="submit" class="btn btn-primary btn-sm edit-max-balls-btn" data-id="{{ $steps->id }}">@lang('messages.Edit')</button>
              <a href="#"
                class="btn btn-danger btn-sm"
                role="button"
                data-toggle="modal"
                data-target="#deleteMaxBallModal"
                data-id="{{ $steps->id }}"
              >
                @lang('messages.Delete')
              </a>
          </td>
        </tr>
                        @endforeach
                    </tbody>
                </table>
              </form>
            </div> <!--End Panel Body -->
        </div> <!--End Panel -->

</div><!-- End Col -->
</div><!-- End Row -->
</div><!-- End Container Fluid -->

<script>
// SEND TABLE EDIT FORM
$('.edit-max-balls-btn').on('click', function(event) {
    event.preventDefault();
    var id = $(this).attr('data-id');

    $.ajax({
        method: 'POST',
        url: '/settings/bingo/maxballs/edit',
        data: $('tr#' + id + ' :input').serialize(),
    })
    .done(function () {
        javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}');
    });
});

// CHANGE VALUE ON CHECKBOX ON CHANGE T/F
$('input[type="checkbox"]').change(function(){
     cb = $(this);
     cb.val(cb.prop('checked'));
 });
</script>
<script>
    function ExportToPNGMaxBalls() {
    html2canvas($('#max-balls-panel'), {
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