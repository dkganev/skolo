@include('modals.languages-modals')

<div class="container">
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addLanguageModal">
                    @lang('messages.Add')
                </button>
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 20%;">
                    @lang('messages.Languages')
                </h2>
                <a href="{{ url('/settings/exportLanguages') }}" class="btn btn-warning btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  
                    @lang('messages.Export')
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
                                <th data-sortable="true">@lang('messages.ID')</th>
                                <th data-sortable="true">@lang('messages.Language Name')</th>
                                <th>@lang('messages.Action')</th>
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
                                       @lang('messages.Edit')
                                    </a>


                                <a  role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#destroyLangModal"
                                    data-id="{{ $language->langid }}"
                                    data-lang="{{ $language->langname }}"
                                    class="btn btn-danger btn-xs"
                                >
                                    @lang('messages.Delete')
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