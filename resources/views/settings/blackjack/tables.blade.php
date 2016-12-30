<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div style="padding-top:2px; margin-top: 0px;">
	        <ul class="breadcrumb">
                    <li><a href="javascript:ajaxLoad('{{url('/settings/blackjack/mainconfig')}}')">@lang('messages.Main Config')</a></li>

                    <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/blackjack/tables')}}')">@lang('messages.Tables')</a></li>

                    <li><a href="javascript:ajaxLoad('{{url('/settings/blackjack/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
	        </ul>
            </div>
  	</div>
    </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
<div class="row">
<div class="col-lg-9">
  <div class="panel panel-default" id="blackjack-tables-panel">
    <div class="panel-heading">
        <h2 class='text-center' style="display: inline; color: white; font-family: 'italic';  padding-left: 35%;">
            @lang('messages.Tables')
        </h2>
        <a class="btn btn-warning  btn-sm pull-right" href="/settings/blackjack/table/export">
            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>
            @lang('messages.Export')
        </a>
        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
        <a class="btn btn-warning btn-sm pull-right" onclick="ExportToPNGBJTables();">
            @lang('messages.Export to PNG')
        </a>
    </div>

    <div class="panel-body">
        <form action="/settings/blackjack/table/edit" method="POST">
         <table class="table table-bordered">
            <thead class="w3-blue-grey">
              <tr>
                <th>@lang('messages.Table')</th>
                <th>@lang('messages.Min Bet')</th>
                <th>@lang('messages.Max Bet')</th>
                <th>@lang('messages.Chip') 1</th>
                <th>@lang('messages.Chip') 2</th>
                <th>@lang('messages.Chip') 3</th>
                <th>@lang('messages.Chip') 4</th>
                <th>@lang('messages.Chip') 5</th>
                <th>@lang('messages.Action')</th>
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
                            @lang('messages.Update')
                        </button>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table> 
        </form>

        <form id="enabled-tables-form" style="border: 1px solid #fff; padding: 10px">
            <div class="tables">
                <span class="button-checkbox" style="margin-left: 0;">
                    <label for="t1_enabled">@lang('messages.Table') 1</label><br>
                    <input type="hidden" name="t1_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t1_enabled" class="hidden"
                        {{ $enabled->t1_enabled ? 'checked' : '' }}
                        />
                </span>
                <span class="button-checkbox">
                    <label for="t2_enabled">@lang('messages.Table') 2</label><br>
                    <input type="hidden" name="t2_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t2_enabled" class="hidden"
                        {{ $enabled->t2_enabled ? 'checked' : '' }}
                     />
                </span>
                <span class="button-checkbox">
                    <label for="t3_enabled">@lang('messages.Table') 3</label><br>
                    <input type="hidden" name="t3_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t3_enabled" class="hidden"
                       {{ $enabled->t3_enabled ? 'checked' : '' }}
                     />
                </span>
                <span class="button-checkbox">
                    <label for="t4_enabled">@lang('messages.Table') 4</label><br>
                    <input type="hidden" name="t4_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t4_enabled" class="hidden"
                       {{ $enabled->t4_enabled ? 'checked' : '' }}
                     />
                </span>
                <span class="button-checkbox">
                    <label for="t5_enabled">@lang('messages.Table') 5</label><br>
                    <input type="hidden" name="t5_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t5_enabled" class="hidden"
                       {{ $enabled->t5_enabled ? 'checked' : '' }}
                     />
                </span>
                <span class="button-checkbox">
                    <label for="t6_enabled">@lang('messages.Table') 6</label><br>
                    <input type="hidden" name="t6_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t6_enabled" class="hidden"
                       {{ $enabled->t6_enabled ? 'checked' : '' }}
                     />
                </span>

                <span class="button-checkbox">
                    <label for="t7_enabled">@lang('messages.Table') 7</label><br>
                    <input type="hidden" name="t7_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t7_enabled" class="hidden"
                       {{ $enabled->t7_enabled ? 'checked' : '' }}
                     />
                </span>

                <span class="button-checkbox">
                    <label for="t8_enabled">@lang('messages.Table') 8</label><br>
                    <input type="hidden" name="t8_enabled" value="false">
                    <button type="button" class="btn" data-color="warning"></button>
                    <input type="checkbox" name="t8_enabled" class="hidden"
                       {{ $enabled->t8_enabled ? 'checked' : '' }}
                     />
                </span>

                {{ csrf_field() }}
                <button class="btn btn-danger btn-sm btn-block enabled-table-button" type="submit">
                    @lang('messages.Update')
                </button>
                </div>
            </form>
        </div>

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
            }, 500);

            $('.alert-success').delay(50).fadeIn(function() {
              $(this).delay(1500).fadeOut();
            });
        },
        error: function (error) {
            console.log("Error " + error);
        }
    });
});


$('.enabled-table-button').on('click', function(event) {
    event.preventDefault();   
    $.ajax({
        method: 'POST',
        url: '/settings/blackjack/table/enabled',
        data: $('form#enabled-tables-form').serialize(),
        success: function (response) {
            //
        },
        error: function (response) {
            //
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
        animation-timing-function: ease-in;
        animation-timing-function: ease-out;
        animation-duration: 2s;
        -webkit-animation-name: flash;
        -webkit-animation-timing-function: ease-out;
        -webkit-animation-duration: 2s;
    }
    @-webkit-keyframes flash {
        from { background: #a5f783; }
        to  { background: none; }
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
<script>
    function ExportToPNGBJTables() {
    html2canvas($('#blackjack-tables-panel'), {
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

<style>
    .button-checkbox,
    .enabled-table-button {
        display: inline-block;
        margin-left: 30px;
    }

    .button-checkbox > button {
        width: 50px;
    }

    .tables {
        display: flex;
    }
</style>