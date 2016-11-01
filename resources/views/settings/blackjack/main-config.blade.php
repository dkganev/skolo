<div class="container">
	<div class="row">
	    <div class="col-lg-12">
	        <h1 style="margin-top: 0px;" class="page-header">Blackjack</h1>
		</div>
	</div><!-- End Row -->
</div><!-- End Container -->

<!-- Blackjack Main Config -->
<div class="container">
<div class="row">

<div class="col-lg-6">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h2 class="panel-title text-center" style="color:#3c3f42;"><strong>Main Config</strong></h2>
	  </div>

	  <div class="panel-body">
		<form action="/settings/bingo/mainconfig/edit" method="POST" role="form">
			{{ csrf_field() }}
			<!-- SETIINGS -->
			<div class="col-lg-6">

				    <div class="form-group">
				    	<label style="color: #474747">Cost:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">$</span>
							<input name="bingo_ticket_cost" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Blackjack:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input name="bingo_win_pr" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Line:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><strong>%</strong></span>
							<input name="bingo_line_pr" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

			</div><!-- End Col -->

			<!-- VISIBLE -->
			<div class="col-lg-6">
				<div class="form-group">
					<label style="color: #474747">My Bonus:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="mybonus_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_line_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Blackjack:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_bingo_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_line_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Blackjack:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_bingo_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

			</div><!-- End Col -->
		</form>
	  </div>

	  <div class="panel-footer">
	  	<button name="Submit" value="Login" type="Submit" type="submit" class="btn btn-warning btn-sm btn-block">Update</button>
	  </div>

	</div><!-- End Panel -->	
</div><!-- End Col -->

<!-- TABLES -->

<div class="col-lg-6">
	<div class="well">
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

       
            <tr>
            <form action="/hit" method="POST">
                <td>
                    <input name="ticket_cnt" style="height:30px;" class="form-control" value="" type="text" placeholder="Min Bet">
                </td>
                <td>
                    <input name="max_ball_idx" style="height:30px;" class="form-control" value="" type="text" placeholder="Max Bet">
                </td>
                <td>
					<input  type="submit" name="update" value=" Apply " 
					style="position: absolute; height: 0px; width: 0px; border: none; padding: 0px;"
					hidefocus="true" tabindex="-1"/>
					                	<button   type="Submit"
			                  value="Submit"
			                  class="btn btn-info btn-xs form-control"
					          >
		                  Update
		          	</button>
                </td>
             </form>
            </tr>
    
        </tbody>
    </table>
    </div>
</div><!-- End Col -->

  <form action="/hit" method="POST">

                    <input name="ticket_cnt" style="height:30px;" class="form-control" value="" type="text" placeholder="Min Bet">


                    <input name="max_ball_idx" style="height:30px;" class="form-control" value="" type="text" placeholder="Max Bet">

                	<button   type="Submit"
			                  value="Submit"
			                  class="btn btn-info btn-xs form-control"
					          >
		                  Update
		          	</button>

             </form>


</div><!-- End Row -->
</div><!-- End Container -->