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
                <tr id="{{ $table->table_id }}" style="background-color: {{ in_array($table->table_id + 1, $enabled_color_ids) ? '#0dad3b;' : '' }}">

                    <td><span class="badge">{{ $table->table_id + 1 }}</span></td>

                    <td>
                        <input name="bet_min" style="height:30px;" class="form-control" value="{{ $table->bet_min }}" type="text">
                     	<label id="bet_min{{ $table->table_id }}" style="color: red; display: none; ">@lang('messages.Min Bet must be bigger or equal then chip1')</label>
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
                            <span id="OK{{ $table->table_id }}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                            <span id="remove{{ $table->table_id }}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
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


                <div class="funkyradio">

                    <div class="funkyradio-primary" style="display: inline-block; width: 150px; padding-left: 15px;">
                        <input type="radio" name="radio" id="radio1" value="1"
                            {{ $enabled->t1_enabled == true && $enabled->t2_enabled == false ? 'checked' : '' }}
                        />
                        <label for="radio1"><strong>1 Table</strong></label>
                    </div>

                    <div class="funkyradio-primary" style="display: inline-block; width: 150px; padding-left: 15px;">
                        <input type="radio" name="radio" id="radio2" value="2"
                            {{ $enabled->t2_enabled == true && $enabled->t3_enabled == false ? 'checked' : '' }}
                        />
                        <label for="radio2"><strong>2 Tables</strong></label>
                    </div>

                    <div class="funkyradio-primary" style="display: inline-block; width: 150px; padding-left: 15px;">
                        <input type="radio" name="radio" id="radio3" value="4"
                            {{ $enabled->t4_enabled == true && $enabled->t5_enabled == false ? 'checked' : '' }}
                        />
                        <label for="radio3"><strong>4 Tables</strong></label>
                    </div>
                    <div class="funkyradio-primary" style="display: inline-block; width: 150px; padding-left: 15px;">
                        <input type="radio" name="radio" id="radio4" value="8" 
                            {{ $enabled->t8_enabled ? 'checked' : '' }}
                        />
                        <label for="radio4"><strong>8 Tables</strong></label>
                    </div>
                </div>



                {{ csrf_field() }}
                <button style="position: relative; left: 1%; width: 17%; height: 50px; margin-top: 14px;" class="btn btn-danger btn-sm  enabled-table-button pull-right" type="submit">
                    <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                    <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                    @lang('messages.Update')
                </button>
                </div>
            </form>
        </div>
        <p style="margin-left: 26px;">* All values are in credits</p>
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
    
    var dataValid = 0;
    var data123 = $('tr#' + id + ' :input').serializeArray();
    var dataAray = [0] ;
    $.each(data123, function(i, field){
        dataAray[field.name] = field.value;
        //$("#results").append(field.name + ":" + field.value + " ");
    });
    //console.log( dataAray);
    dataValid = 0;
    if (dataAray['bet_min'] < dataAray['chip1']){
        $('#bet_min' + id).show();
        dataValid = 1;
    }else{
        $('#bet_min' + id).hide();
    }
    
    if (dataValid == 0){
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

                //$('.alert-success').delay(50).fadeIn(function() {
                //    $(this).delay(1500).fadeOut();
                //});
                $('#OK' + id).show();
                sortTimer123 = setTimeout(function(){ $('#OK' + id).hide(); }, 10000);
            },
            error: function (error) {
                console.log("Error " + error);
                $('#remove' + id).show();
                sortTimer123 = setTimeout(function(){ $('#remove' + id).hide(); }, 10000);
            }
        });
    } else {
        $('#remove' + id).show();
        sortTimer123 = setTimeout(function(){ $('#remove' + id).hide(); }, 10000);
    }
});


$('.enabled-table-button').on('click', function(event) {
    event.preventDefault();
    console.log('test');
    $.ajax({
        method: 'POST',
        url: '/settings/blackjack/table/enabled',
        data: $('form#enabled-tables-form').serialize(),
        success: function (response) {
            javascript:ajaxLoad('{{ url('/settings/blackjack/tables') }}');
        },
        error: function (response) {
            $('#remove').show();
            sortTimer123 = setTimeout(function(){ $('#remove').hide(); }, 10000);
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
        width: 150px;
    }

    .tables {
        display: flex;
    }
</style>
<style>
    .funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}
</style>