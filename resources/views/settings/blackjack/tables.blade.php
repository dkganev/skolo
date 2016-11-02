<div class="container">
  <div class="row">
      <div class="col-lg-6">
        <h1 style="margin-top: 0px;" class="page-header">Blackjack - Tables</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/blackjack/mainconfig')}}')">Main Config</a></li>

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/blackjack/tables')}}')">Tables</a></li>

            </ul>
        </div>
  	</div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
<div class="row">
<div class="col-lg-12">

  <div class="panel panel-primary">

    <div class="panel-heading">
       <h2 class="panel-title text-center" style="color:white;"><strong>Tables</strong></h2>
    </div>

    <div class="panel-body">
        <form action="/settings/blackjack/table/edit" method="POST">
         <table class="table table-bordered">
            <thead class="w3-blue-grey">
              <tr>
                <th>Table</th>
                <th>Min Bet</th>
                <th>Max Bet</th>
                <th>Chip 1</th>
                <th>Chip 2</th>
                <th>Chip 3</th>
                <th>Chip 4</th>
                <th>Chip 5</th>
                <th>Action</th>
              </tr>
            </thead>
              <tbody>
                @foreach($tables as $table)
                <tr id="{{ $table->table_id }}">
                    <td><span class="badge">{{ $table->table_id + 1 }}</span></td>
                    <td>
                        <input name="bet_min" style="height:30px;" class="form-control" value="{{ $table->bet_min }}" type="text">
                    </td>
                    <td>
                        <input name="bet_max" style="height:30px;" class="form-control" value="{{ $table->bet_max }}" type="text">
                    </td>
                    <td>
                        <input name="chip1" style="height:30px;" class="form-control" value="{{ $table->chip1 }}" type="text">
                    </td>
                    <td>
                        <input name="chip2" style="height:30px;" class="form-control" value="{{ $table->chip2 }}" type="text">
                    </td>

                    <td>
                        <input name="chip3" style="height:30px;" class="form-control" value="{{ $table->chip3 }}" type="text">
                    </td>
                    <td>
                        <input name="chip4" style="height:30px;" class="form-control" value="{{ $table->chip4 }}" type="text">
                    </td>
                    <td>
                        <input name="chip5" style="height:30px;" class="form-control" value="{{ $table->chip5 }}" type="text">
                    </td>
                    <td>
                        {{ csrf_field() }}
                        <input type="hidden" name="table_id" value="{{ $table->table_id }}">
                        <button class="btn btn-primary btn-xs bj-table-button"
                                type="submit"
                                data-id="{{ $table->table_id }}"
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

</div><!-- End Col -->
</div><!-- End Row -->
</div><!-- End Container -->

<script>
// SEND TABLE EDIT FORM
$('.bj-table-button').on('click', function(event) {
    event.preventDefault();
    var id = $(this).attr('data-id');

    $.ajax({
        method: 'POST',
        url: '/settings/blackjack/table/edit',
        data: $('tr#' + id + ' :input').serialize(),
        success: function(data){
            $('.alert-success').delay(500).fadeIn(function() {
              $(this).delay(2500).fadeOut();
            });
        },
        error: function (error) {
            console.log("Error " + error);
        }
    })
    .done(function () {
        javascript:ajaxLoad('{{url('/settings/blackjack/tables')}}');
    });
});
</script>