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
        <form id="add-user-form" role="form" method="POST" style="width: 80%;">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="username">Username:</label><br>
                        <input class="form-control" type="text" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group ">
                        <label for="password">Password </label><br>
                        <input class="form-control" type="text" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label><br>
                        <input class="form-control" type="text" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                    </div>

                    <div class="form-group ">
                        <label for="firstname">First Name: </label><br>
                        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name:</label><br>
                        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last Name">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number: </label><br>
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number">
                    </div>
                </div>

                <div class="col-xs-6" >
                    <div class="form-group">
                        <label for="role">User Role: </label><br>
                            <select name="role" class="form-control selectpicker" id="role">                            
                            <option selected="true" disabled="disabled">Choose Role</option>

                            <option value="user">User</option>
                            <option value="cashier">Cashier</option>
                            <option value="superuser">Super User</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>User Permisions: </label><br>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  + Casino
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                CheckBox Here
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  + Statistics
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                               CheckBox Here
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  + Settings
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                CheckBox Here
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div><!-- End Row -->
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="add-user" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script>
// SEND MAIN CONFIG FORM
$('button#add-user').on('click', function(event) {
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: '/settings/users/store',
        data: $('form#add-user-form').serialize(),
        success: function(response) {
            //
        },
        error: function(error) {
            //
        }
    }).done(function () {
        $('#addUserModal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        javascript:ajaxLoad('{{url('/settings/users')}}');
    });
});

// CHANGE VALUE ON CHECKBOX ON CHANGE T/F
$('input[type="checkbox"]').change(function() {
    cb = $(this);
    cb.val(cb.prop('checked'));
});
</script>