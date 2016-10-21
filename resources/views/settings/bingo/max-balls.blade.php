<!-- Games -->
<div class="container">
<div class="row">
    <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Bingo - Max Balls</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

            </ul>
        </div>
	</div>
</div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
<div class="row">
<div class="col-md-12">

<form class="form-inline">

@foreach($jackpot_steps as $steps)
  <div class="well well-sm">

  <span class="badge" style="position: relative; top:14px;">{{ $steps->id }}</span>
  <div class="form-group ">
    <label>Ticket Cost</label><br>
    <input style="width:110px;" value="" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label>BL. Max Ball:</label><br>
    <input style="width:110px;" type="email" class="form-control">
  </div>

  <div class="form-group">
    <label>Ticket Cost</label><br>
    <input style="width:110px;" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Ticket Cost</label><br>
    <input style="width:110px;" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label>BL. Max Ball:</label><br>
    <input style="width:110px;" type="email" class="form-control">
  </div>
  
  <div class="form-group">
    <label>Ticket Cost</label><br>
    <input style="width:110px;" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Ticket Cost</label><br>
    <input style="width:110px;" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label>BL. Max Ball:</label><br>
    <input style="width:110px;" type="email" class="form-control">
  </div>
  
  <div class="form-group">
    <label>Ticket Cost</label><br>
    <input style="width:110px;" type="text" class="form-control">
  </div>
 
  </div><!-- End Well -->
@endforeach
  <button style="width:200px; margin: 5px;" class="btn btn-warning">Update</button>

</form>

</div><!-- End Col -->
</div><!-- End Row -->
</div><!-- End Container Fluid -->
