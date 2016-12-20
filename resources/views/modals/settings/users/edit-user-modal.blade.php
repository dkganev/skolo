<div class="container">
<div class="row">
<div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>@lang('messages.Edit User')</strong></h2>
      </div>
        <div class="modal-body">
            <form role="form" method="POST" style="width: 80%;" autocomplete="off">
            <input type="hidden" value="{{ $user->id }}" id="id-{{ $user->id }}" }}">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>@lang('messages.Username'):</label><br>
                            <input id="name-{{ $user->id }}" value="{{ $user->name }}" class="form-control" type="text" id="username" name="username" placeholder="@lang('messages.Username')">
                            <span class="help-block">
                                <strong id="name{{ $user->id }}"></strong>
                            </span>
                        </div>

                        <div class="form-group ">
                            <label>@lang('messages.First Name'): </label><br>
                            <input id="firstname-{{ $user->id }}" value="{{ $user->firstname }}" class="form-control" type="text" name="firstname" placeholder="@lang('messages.First Name')">
                        </div>

                        <div class="form-group">
                            <label>@lang('messages.Last Name'):</label><br>
                            <input id="lastname-{{ $user->id }}" value="{{ $user->lastname }}"  class="form-control" type="text" name="lastname" placeholder="@lang('messages.Last Name')">
                        </div>

                        <div class="form-group">
                            <label>@lang('messages.Phone Number'): </label><br>
                            <input id="phone-{{ $user->id }}" value="{{ $user->phone }}" class="form-control" type="text" name="phone" placeholder="@lang('messages.Phone Number')">

                            <span class="help-block">
                                <strong id="phone{{ $user->id }}"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group ">
                            <label>@lang('messages.Password')</label><br>
                            <input id="password-{{ $user->id }}" class="form-control" type="password" name="password" placeholder="@lang('messages.Password')">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">@lang('messages.Confirm Password'):</label><br>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('messages.Confirm Password')">
                        </div>

                        <div class="form-group">
                            <label for="role">@lang('messages.Choose Role'): </label><br>
                            <select name="role" class="form-control selectpicker" id="role-{{ $user->id }}">                            
                                <option selected="true" disabled="disabled">@lang('messages.Choose Role')</option>
                                @foreach($roles as $role)
                                    <option {{ $user->hasRole($role->name) == $role->name ? 'selected' : '' }} value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="Language">@lang('messages.Prefered Language'): </label><br>
                            <select name="Language" class="form-control selectpicker" id="Language-{{ $user->id }}">                            
                                <!--<option selected="true" disabled="disabled">@lang('messages.Choose Language')</option> -->
                                @foreach($CmsLangs as $key => $val)
                                    <option {{ $user->lang_id == $val->langid ? 'selected' : '' }} value="{{ $val->langid }}">
                                       {{$val->lang_short_name}} - {{$val->langname}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div><!-- End Row -->
            </form>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
        <button id="edit-user-{{ $user->id }}" class="btn btn-primary">@lang('messages.Save')</button>
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
          password: $('#password-{{ $user->id }}').val(),
          role: $('#role-{{ $user->id }}').val(),
          Language: $('#Language-{{ $user->id }}').val(),
          _token: "{{ Session::token() }}",
        },
        success: function(response) {
          //
        },
        error: function(error) {
            $.each(error.responseJSON, function(key, value) {
                $('strong#' + key + {{ $user->id }}).html(value);
                $('strong#' + key + {{ $user->id }}).closest('.form-group').addClass('has-error');
            });
        }
    }).done(function() {
        $('#editUserModal-{{ $user->id }}').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        javascript:ajaxLoad('{{url('/settings/users')}}');
    });
});
</script>