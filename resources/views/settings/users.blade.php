<div class="container">
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addBillModal">
                    Add User
                </button>
                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 33%;">
                    Users
                </h2>

            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover data-table-table"
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
                            <th data-sortable="true">Permisions</th>
                            <th data-sortable="true">Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->fullName() }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-primary btn-xs">Edit</button>
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