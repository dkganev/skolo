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
        <button id="toggle-create-template-form" class="btn btn-primary btn-sm">Create Template</button>
      </div><!-- End Col-->
    </div>

    <div class="row">
    <div class="col-lg-5">
      <form id="create-template-form" class="form-inline" style="padding-top: 15px;">

          <div class="form-group">
            <label for="template">Template Name: </label>
            <input class="form-control" type="text" name="template" id="template">
            <input class="btn btn-info btn-sm form-control" type="submit" name="submit" value="Save">
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
            <tr>
              <td>1</td>
              <td>Fixed</td>
              <td>
                <a class="btn btn-info btn-xs" href="#">Edit</a>
                <a class="btn btn-warning btn-xs" href="#">Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!-- End Col-->
    </div><!-- End Row-->

  </div><!-- End Well-->
</div><!-- End Container-->

<script type="text/javascript">
  $(document).ready(function() {

    $('#create-template-form').hide(); //Initially form wil be hidden.
    $('#toggle-create-template-form').click(function() {
      $('#create-template-form').toggle(150);
    });

  });
</script>