<!-- Add Language Modal -->
<div class="container">
<div class="row">
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>+ Add User</strong></h2>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" name="server-modal" style="width: 80%;">
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="username">Username:</label><br>
                        <input class="form-control" type="text" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group ">
                        <label for="langname">Password </label><br>
                        <input class="form-control" type="text" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="langid">Confirm Password:</label><br>
                        <input class="form-control" type="text" name="langid" id="langid" placeholder="ID">
                    </div>

                    <div class="form-group ">
                        <label for="langname">First Name: </label><br>
                        <input class="form-control" type="text" name="langname" id="langname" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="langid">Last Name:</label><br>
                        <input class="form-control" type="text" name="langid" id="langid" placeholder="ID">
                    </div>

                    <div class="form-group ">
                        <label for="langname">Phone Number: </label><br>
                        <input class="form-control" type="text" name="langname" id="langname" placeholder="Name">
                    </div>
                </div>
            </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="add-language" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>