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
                <th>Enabled</th>
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
                        <span class="button-checkbox">
                            <input type="hidden" name="enabled" value="false">
                            <button type="button" class="btn" data-color="danger"></button>
                            <input type="checkbox" name="enabled" class="hidden"
                             {{ $table->game_state->enabled ? " checked" : "" }} />
                        </span>
                    </td>
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
/* Edit Table Row */
// SEND TABLE EDIT FORM
$('.bj-table-button').on('click', function(event) {
    event.preventDefault();
    var id = $(this).attr('data-id');
    var trForm = $('tr#' + id + ' :input[name="bet_max"]').val();
    
    $.ajax({
        method: 'POST',
        url: '/settings/blackjack/table/edit',
        data: $('tr#' + id + ' :input').serialize(),
        success: function(data) {
            // For Version
            // for(key in data.response) {
            //     $('tr#' + id + ' :input[name="' + key + '"]').val(data.response[key]);
            // }

            // Each Version
            $.each(data.response, function(key, value) {
                $('tr#' + id + ' :input[name="' + key + '"]').val(value);
            });

            $('tr#' + id).addClass('flashNow');
            setTimeout(function() {
                $('tr#' + id).removeClass('flashNow');
            }, 300);

            $('.alert-success').delay(50).fadeIn(function() {
              $(this).delay(1500).fadeOut();
            });
        },
        error: function (error) {
            console.log("Error " + error);
        }
    });
});

// CHANGE VALUE ON CHECKBOX ON CHANGE T/F
$('input[type="checkbox"]').change(function(){
     cb = $(this);
     cb.val(cb.prop('checked'));
});
</script>

<style>
    .flashNow {
        animation-name: flash;
        animation-timing-function: ease-out;
        animation-duration: 2s;
        -webkit-animation-name: flash;
        -webkit-animation-timing-function: ease-out;
        -webkit-animation-duration: 2s;
    }
    @-webkit-keyframes flash {
        from { background: #a5f783; }
        to  background: none; }
    }
    @keyframes flash {
        0% { background: green; }
        100% { background: none; }
    }
</style>

<!-- Plugin for Boostrap Checkbox -->
<script>
  $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>