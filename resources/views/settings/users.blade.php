@include('modals.settings.users.add-user-modal')
@include('modals.settings.users.destroy-user-modal')
<div class="container">
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addUserModal">
                    Add User
                </button>
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 33%;">
                    Users
                </h2>
                
                <a href="{{ route('export.terminals') }}" class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                </a>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover"
                    data-toggle="table"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  

                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 6, 9]"
                  >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Username</th>
                            <th data-sortable="true">Full Name</th>
                            <th data-sortable="true">Role</th>
                            <th data-sortable="true">Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @include('modals.settings.users.edit-user-modal')
                        <tr class="tr-class">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->fullName() }}</td>
                            <td>
                                @foreach($roles as $role)
                                    {{ $user->hasRole($role->name) ? $role->name : '' }} 
                                @endforeach
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a  role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#editUserModal-{{ $user->id }}"
                                    class="btn btn-primary btn-xs"
                                >
                                    Edit
                                </a>

                                <a  role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#destroyUserModal"
                                    data-id="{{ $user->id }}"
                                    data-fullname="{{ $user->fullName() }}"
                                    class="btn btn-danger btn-xs"
                                >
                                    Delete
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!--End Panel Body -->
        </div> <!--End Panel -->

    </div><!--End Col -->
</div><!--End Row -->
</div><!--End Container-->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>
