<div class="container">
  <div class="row">
      <div class="col-lg-8">
        <hr style="padding-bottom: 15px; margin: 0;">
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Roulette 1</a></li>

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">Roulette 2</a></li>

            </ul>
        </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
  <div class="row">
      <div class="col-lg-6">
        <h1 style="margin-top: 0px;" class="page-header">Roulette 2 - Terminals Config</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">Wheel Settings</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelconfig')}}')">Wheel Config</a></li>

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette2/psconfig')}}')">Terminals Config</a></li>
            </ul>
        </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container-full">
<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary">

    <div class="panel-heading">
      <h2 class="panel-title text-center" style="color:white;"><strong>Terminals Config</strong></h2>
    </div>

    <div class="panel-body">
      
      <div class="col-lg-4">
        <table class="table table-bordered">
          <thead class="w3-blue-grey">
            <tr>
              <th>PS ID</th>
              <th>SEAT ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($ps_conf as $conf)
          <tr>
            <td>{{ $conf->ps_id }}</td>
            <td>{{ $conf->seat_id }}</td>
            <td>
              <button class="btn btn-primary btn-xs mybonus-button"
                      type="submit"
              >
                Update
              </button>
            </td>
          </tr>
          @endforeach

          </tbody>
          </table>     
      </div>

    </div><!-- End Panel Body--> 

  </div><!-- End Panel -->  
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->