@include('casino.bingo-playlist.templates-modals')
<div class="container">
  <div class="row">
      <div class="col-lg-5">
          <div style="padding-top:2px; margin-top: 0px;">
            <ul class="breadcrumb">
              <li><a href="javascript:ajaxLoad('{{url('/casino/playlist')}}')">@lang('messages.Playlist')</a></li>

              <li class="active"><a href="javascript:ajaxLoad('{{url('/casino/templates')}}')">@lang('messages.Templates')</a></li>
            </ul>
          </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container -->

<div class="container">
  <div class="well">
    <div class="row">
      <div class="col-lg-5">
        <button id="toggle-create-template-form" class="btn btn-primary btn-sm">
            @lang('messages.Create Template')
            <span style="margin-left: 6px;" class="caret"></span>
        </button>
      </div><!-- End Col-->
    </div>

    <div class="row">
    <div class="col-lg-5">
      <form id="create-template-form" action="/casino/templates/store" method="post" class="form-inline" style="padding-top: 15px;">
        <div class="form-group">

          <label for="name">@lang('messages.Template Name'): </label>
          <input class="form-control" type="text" name="name" id="name">

          <button   id="add-template-button"
                    type="Submit"
                    value="Submit"
                    class="btn btn-info btn-sm form-control"
                  >
                  @lang('messages.Add')
          </button>

        </div>
        </form>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-lg-6">
       <table class="table table-bordered">
          <thead class="w3-blue-grey">
            <tr>
              <th>@lang('messages.Name')</th>
              <th>@lang('messages.Number of Games')</th>
              <th>@lang('messages.Action')</th>
            </tr>
          </thead>
          <tbody>
           @foreach($templates as $template)
            <tr>
              <td>{{ $template->name }}</td>
              <td>{{ $template->template_games->count() }}</td>
              <td>
                <a class="btn btn-primary btn-xs" href="#"
                    role="button" 
                    data-toggle="modal"
                    data-target="#editTemplateModal--{{ $template->template_id }}"
                >
                  @lang('messages.Edit')
                </a>
                <a class="btn btn-danger btn-xs" href="#"
                    role="button" data-toggle="modal"
                    data-toggle="modal"
                    data-target="#deleteTemplateModal"
                    data-template-name="{{ $template->name }}"
                    data-template-id="{{ $template->template_id }}"
                >@lang('messages.Delete')</a>
              </td>
            </tr>
            @include('casino.bingo-playlist.update-template-modal')
            @endforeach
          </tbody>
        </table>
      </div><!-- End Col-->
    </div><!-- End Row-->

  </div><!-- End Well-->
</div><!-- End Container-->

<script>
    $(".closeTemp").click(function() {
        var template_id = $(this).attr("data-id");
        //$('#editTemplateModal--' + template_id).modal('hide');
        javascript:ajaxLoad('{{url('/casino/templates')}}');
      
        console.log(template_id);
        
    });
    $(".up,.down").click(function() {
        var row = $(this).parents(".dataTableRow:first");
        idx = row.attr('data-idx');
        template_id = row.data('template-id');
        var data = {
            idx: row.attr('data-idx'),
            template_id: row.data('template-id'),
            _token: $('meta[name="csrf-token"]').attr('content')
        }
        if ($(this).is(".up")) {
            $.post('casino/templates/up', data, function(response) {
                if (response.success == "success") {
                    //console.log(response.idx, response.idxNew, response.idxC);
                    $('#row' + template_id + "idx" + response.idx ).attr('data-idx', response.idxC );    
                    $('#row' + template_id + "idx" + response.idx ).attr('id', 'rowNew' );
                    $('#row' + template_id + "idx" + response.idxNew ).attr('data-idx', response.idx );    
                    $('#row' +  template_id + "idx" + response.idxNew  ).attr('id', 'row' +  template_id + "idx" + response.idx );
                    $('#rowNew' ).attr('data-idx', response.idxNew );    
                    $('#rowNew' ).attr('id', 'row' +  template_id + "idx" + response.idxNew );
                    row.insertBefore(row.prev());
                } else {
                    console.log(response);
                }
            });
            
        } else {
            $.post('casino/templates/down', data, function(response) {
                if (response.success == "success") {
                    //console.log(response.idx, response.idxNew, response.idxC);
                    $('#row' + template_id + "idx" + response.idx ).attr('data-idx', response.idxC );    
                    $('#row' + template_id + "idx" + response.idx ).attr('id', 'rowNew' );
                    $('#row' + template_id + "idx" + response.idxNew ).attr('data-idx', response.idx );    
                    $('#row' +  template_id + "idx" + response.idxNew  ).attr('id', 'row' +  template_id + "idx" + response.idx );
                    $('#rowNew' ).attr('data-idx', response.idxNew );    
                    $('#rowNew' ).attr('id', 'row' +  template_id + "idx" + response.idxNew );
                    row.insertAfter(row.next());
                } else {
                    console.log(response);
                }
            });
            
        }
    });
    $(".top").click(function() {
      var row = $(this).parents(".divTableRow:first");
      idx = row.attr('data-idx');
      template_id = row.data('template-id');
      var idxArray = new Array();
      var data = {
          idx: row.attr('data-idx'),
          template_id: row.data('template-id'),
          _token: $('meta[name="csrf-token"]').attr('content')
      }
      $.post('casino/templates/top', data, function(response) {
        $.each( response.idxArray, function( key, value ) {
            idxArray.push(value);
        });
        for ( var i = 0, l = idxArray.length; l > i  ; l-- ) {
            idx2 = idxArray[ l-1 ] - 1; 
            $('#row' + template_id + "idx" + idx2 ).attr('data-idx', idxArray[ l-1 ] );
            $('#row' + template_id + "idx" + idx2 ).attr('id', 'row' + template_id + "idx" + idxArray[ l-1 ]);
        }
        
        //row.attr('idx',response.idxNew ); 
        idxN = parseInt(response.idx) + 1;
        $('#row' + template_id + "idx" + idxN ).attr('data-idx', response.idxNew );
        $('#row' + template_id + "idx" + idxN ).attr('id', 'row' + template_id + "idx" + response.idxNew);
      });
      row.insertAfter('.dataHeadingRow' + template_id);
    });
    $(".remove").click(function() {
      var row = $(this).parents(".dataTableRow:first");
      template_id = row.data('template-id');

      var data = {
          idx: row.attr('data-idx'),
          template_id: row.data('template-id'),
          _token: $('meta[name="csrf-token"]').attr('content')
      }
      //console.log(data);
      
      $.post('casino/templates/destroy', data, function(response) {
        // console.log(response);
        //$('#editTemplateModal--' + template_id).modal('hide');
        //javascript:ajaxLoad('{{url('/casino/templates')}}');
      });
       row.remove();

      // row.remove();
    });


$(document).ready(function() {

  // TOGGLE STORE TEMPLATE FORM
  $('#create-template-form').hide(); //Initially form wil be hidden.
  $('#toggle-create-template-form').click(function() {
    $('#create-template-form').toggle(150);
  });

  // STORE TEMPLATE FORM
  $('#add-template-button').on('click', function(event) {
    event.preventDefault();
    var url = $('form#create-template-form').attr('action');
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
       method: 'POST',
       url: url,
       data: {
           name: $('form#create-template-form input[name="name"]').val(),
           _token: token,
      },
      success: function(response) {
          console.log(response);
      },
      error: function(response) {
          console.log(response.responseText);
      }
    }).done(function() {
        javascript:ajaxLoad('{{url('/casino/templates')}}');
    });
  });

       //   success:function(data){
       //    if (data.success == "success"){
       //        $("#CasinoMenu").text( data.casinoname);
       //        //$("#casinoEvents1").click();
       //        //var href = $('#casinoEvents').attr('href');
       //        var href = $('#CasinoCasino').attr('href');
       //        window.location.href = href; 
       //        //location.reload();casinoEvents
       //        //window.location.href = "http://10.0.0.156:8000/casino/events";
       //    }
       // },
       // error: function (error) {
       //      alert ("Unexpected wrong.");
       //  }

});
</script>