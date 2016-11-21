<div class="container">
<div class="row">
<div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>+ Edit User</strong></h2>
      </div>
        <div class="modal-body">
            <form role="form" method="POST" style="width: 80%;">
            <input type="hidden" value="{{ $user->id }}" id="id-{{ $user->id }}" }}">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Username:</label><br>
                            <input id="name-{{ $user->id }}" value="{{ $user->name }}" class="form-control" type="text" id="username" name="username" placeholder="Username">
                        </div>

                        <div class="form-group ">
                            <label>First Name: </label><br>
                            <input id="firstname-{{ $user->id }}" value="{{ $user->firstname }}" class="form-control" type="text" name="firstname" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label>Last Name:</label><br>
                            <input id="lastname-{{ $user->id }}" value="{{ $user->lastname }}"  class="form-control" type="text" name="lastname" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label>Phone Number: </label><br>
                            <input id="phone-{{ $user->id }}" value="{{ $user->phone }}" class="form-control" type="text" name="phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group ">
                            <label>Password </label><br>
                            <input id="password-{{ $user->id }}" class="form-control" type="password" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password:</label><br>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <label for="role">User Role: </label><br>
                            <select name="role" class="form-control selectpicker" id="role-{{ $user->id }}">                            
                                <option selected="true" disabled="disabled">Choose Role</option>
                                @foreach($roles as $role)
                                    <option {{ $user->hasRole($role->name) == $role->name ? 'selected' : '' }} value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div><!-- End Row -->
            </form>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="edit-user-{{ $user->id }}" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script>
$('#edit-user-{{ $user->id }}').on('click', function(event) {
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: '/settings/users/edit',
        data: {
          id: $('#id-{{ $user->id }}').val(),
          name: $('#name-{{ $user->id }}').val(),
          firstname: $('#firstname-{{ $user->id }}').val(),
          lastname: $('#lastname-{{ $user->id }}').val(),
          phone: $('#phone-{{ $user->id }}').val(),
          passowrd: $('#password-{{ $user->id }}').val(),
          role: $('#role-{{ $user->id }}').val(),
          _token: "{{ Session::token() }}",
        },
        success: function(response) {
          //
        },
        error: function(error) {
          //
        }
    }).done(function() {
        $('#editUserModal-{{ $user->id }}').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        javascript:ajaxLoad('{{url('/settings/users')}}');
    });
});
</script>