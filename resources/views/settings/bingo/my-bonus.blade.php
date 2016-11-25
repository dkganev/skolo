<div class="container">
<div class="row">
    <div class="col-lg-6">
        {{-- <h1 style="margin-top: 0px;" class="page-header">Bingo - My Bonus</h1> --}}
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
                <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

                <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

                <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

                <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">Sphere Config</a></li>

                <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">Accounting Config</a></li>
            </ul>
        </div>
	</div><!--End Col -->
</div><!-- End Row -->

<div class="row">
	<div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center" style="background-image: none; background-color: #607D8B; color: white;">
                <h2 class="panel-title" style="color:white;"><strong>My Bonus</strong></h2>
            </div>

            <div class="panel-body">
                <form action="/settings/bingo/mybonus/edit" method="POST">
                 <table class="table table-bordered">
                    <thead class="w3-blue-grey">
                      <tr>
                        <th>ID</th>
                        <th>Ticket Cost</th>
                        <th>Max Ball</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($my_bonus as $bonus)
                    <tr id="{{ $bonus->id }}">
                        <td><span class="badge">{{ $bonus->id }}</span></td>
                        <td>
                            <input class="form-control text-center" name="ticket_cnt" style="height:30px;" class="form-control" value="{{ $bonus->ticket_cnt }}" type="text" placeholder="Ticket Count">
                        </td>
                        <td>
                            <input class="form-control text-center"  name="max_ball_idx" style="height:30px;" class="form-control" value="{{ $bonus->max_ball_idx }}" type="text" placeholder="Max Ball">
                        </td>
                        <td>
                            <input type="hidden" name="id" value="{{ $bonus->id }}">
                            <button class="btn btn-primary btn-xs mybonus-button"
                                    type="submit"
                                    data-id="{{ $bonus->id }}"
                            >
                                Update
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </form>
            </div> <!--End Panel Body -->
        </div> <!--End Panel -->
    </div><!--End Col -->
    </div><!--End Row -->
</div><!--End Container -->

<script>
$('.mybonus-button').on('click', function(event) {
    event.preventDefault();
    var token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-id');

    $.ajax({
        method: 'POST',
        url: 'settings/bingo/mybonus/edit',
        data: {
            id: $('tr#' + id + ' input[name="id"]').val(),
            ticket_cnt: $('tr#' + id + ' input[name="ticket_cnt"]').val(),
            max_ball_idx: $('tr#' + id + ' input[name="max_ball_idx"]').val() ,
            _token: token
        }
    }).done(function () {
         javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}');
    });
});
</script>