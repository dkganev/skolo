@include('casino.bingo-playlist.templates-modals')
<div class="container">
  <div class="row">
      <div class="col-lg-5">
          <h2 style="margin-top: 0px;" class="page-header">Templates</h2>
          <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/casino/playlist')}}')">Playlist</a></li>

              <li><a class="active" href="javascript:ajaxLoad('{{url('/casino/templates')}}')">Templates</a></li>

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
            Create Template
            <span style="margin-left: 6px;" class="caret"></span>
        </button>
      </div><!-- End Col-->
    </div>

    <div class="row">
    <div class="col-lg-5">
      <form id="create-template-form" action="/casino/templates/store" method="post" class="form-inline" style="padding-top: 15px;">
        <div class="form-group">

          <label for="name">Template Name: </label>
          <input class="form-control" type="text" name="name" id="name">

          <button id="add-template-button"
                  type="Submit"
                  value="Submit"
                  class="btn btn-info btn-sm form-control"
          >
                  Add
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
              <th>Name</th>
              <th>Number of Games</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach($templates as $template)
            <tr>
              <td>{{ $template->name }}</td>
              <td>0</td>
              <td>
                <a class="btn btn-warning btn-xs" href="#">Edit</a>

                <a class="btn btn-danger btn-xs" href="#"
                    role="button" data-toggle="modal"
                    data-toggle="modal"
                    data-target="#deleteTemplateModal"
                    data-template-name="{{ $template->name }}"
                    data-template-name="{{ $template->id }}"

                >Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- End Col-->
    </div><!-- End Row-->

  </div><!-- End Well-->
</div><!-- End Container-->

<script>
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
      }
    })
    .done(function() {
       javascript:ajaxLoad('{{url('/casino/templates')}}');
       console.log('Success');
    });
  });

});
</script>