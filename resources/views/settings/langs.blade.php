@include('modals.languages-modals')

<div class="container">
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addLanguageModal">
                    Add Language
                </button>
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 20%;">
                    Languages
                </h2>
                <a href="{{ url('/settings/exportLanguages') }}" class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export
                </a>
            </div>
            
            <div class="panel-body">
                <div class="table table-striped table-hover data-table-table">
                    <table class="table"
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
                                <th data-sortable="true">Language ID</th>
                                <th data-sortable="true">Language Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($languages as $language)
                            <tr class="tr-class">
                                <td>{{ $language->langid }}</td>
                                <td>{{ $language->langname }}</td>
                                <td>
                                    <a href="" role="button" data-toggle="modal"
                                        data-toggle="modal"
                                        data-target="#updateLanguageModal"
                                        data-langid="{{ $language->langid }}"
                                        data-langname="{{ $language->langname }}"
                                        class="btn btn-primary btn-xs"
                                    >
                                       Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--  End Context Classes  -->
    </div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>