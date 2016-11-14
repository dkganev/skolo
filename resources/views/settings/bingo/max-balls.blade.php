<div class="container">
  <div class="row">
      <div class="col-lg-6">
        {{-- <h1 style="margin-top: 0px;" class="page-header">Bingo - Max Balls</h1> --}}
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">Sphere Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">Accounting Config</a></li>
            </ul>
        </div>
  	</div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
<div class="row">
<div class="col-lg-10">

<!--    Context Classes  -->
<div class="panel panel-default">
   
    <div class="panel-heading">
        <a id="toggle-max-balls" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addMaxBallsModal">
            Add New
        </a>

        <a href="{{ url('/settings/exportBillTypes') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export</a>
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
              <th data-sortable="true">ID</th>
              <th data-sortable="true">Fixed</th>                         
              <th data-sortable="true">Ticket Cost</th>
              <th data-sortable="true">JB. Max Ball</th>
              <th data-sortable="true">JL. Max Ball</th>
              <th data-sortable="true">BL. Max Ball</th>
              <th data-sortable="true">BB. Max Ball</th>
              <th data-sortable="true">JL. Ticket Count</th>
              <th data-sortable="true">JB. Ticket Count</th>
              <th data-sortable="true">BL. Ticket Count</th>
              <th data-sortable="true">BB. Ticket Count</th>

              <th>Action</th>
            </tr>
          </thead>
            <tbody>
            @foreach($jackpot_steps as $steps)
      <tr id="{{ $steps->id }}">
          <td><span class="badge">{{ $steps->id }}</span></td>

          <td style="width:20px;">
            <input type="hidden" name="bingo_cost_fixed" value="false">
            <input name="bingo_cost_fixed" type="checkbox" {{ $steps->bingo_cost_fixed ? " checked" : "" }}>
          </td>

          <td>
            <input name="bingo_ticket_cost" value="{{ $steps->bingo_ticket_cost }}" type="text" class="form-control">
          </td>

          <td>
            <input  name="jackpot_bingo_max_ball" value="{{ $steps->jackpot_bingo_max_ball }}" type="text" class="form-control">
          </td>
          <td>
            <input  name="jackpot_line_max_ball" value="{{ $steps->jackpot_line_max_ball }}" type="text" class="form-control">
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
          <td>
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $steps->id }}">
              <button style="display:inline;"  type="submit" class="btn btn-warning btn-xs edit-max-balls-btn" data-id="{{ $steps->id }}">Update</button>
              <a href="#"
                style="display:inline;" 
                class="btn btn-danger btn-xs"
                role="button"
                data-toggle="modal"
                data-target="#deleteMaxBallModal"
                data-id="{{ $steps->id }}"
              >
                Delete
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