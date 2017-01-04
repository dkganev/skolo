<div class="container">
    <div class="row" >
        <div class="col-md-12" >

            <div class="panel panel-default" id="panelCardsContend">
                <div class="panel-heading">
                    <div>
                        <h2 class='text-center' style="display: inline; color:#fff; font-family: 'italic';  padding-left: 35%;">
                            Cards
                        </h2>
                        <a onclick="export2excelCards();" class="btn btn-warning  pull-right" >
                            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                        </a>
                        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                        <a  class="btn btn-warning  pull-right" onclick="ExportToPNGCardsTable();">
                            Export to PNG
                        </a>
                    </div><br />
                    <div class="pull-left pagination-detail">
                         <!-- <span class="pagination-info">Showing 1 page</span> -->
                        <span class="page-list">
                            <span class="btn-group dropup">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="page-size">{{$page['rowsPerPage']}}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="{{$page['rowsPerPage'] == 20 ? 'active' : '' }}">
                                        <a onclick="changeRowsPerPageCards(20)">20</a>
                                    </li>
                                    <li class="{{$page['rowsPerPage'] == 50 ? 'active' : '' }}">
                                        <a onclick="changeRowsPerPageCards(50)">50</a>
                                    </li>
                                    <li class="{{$page['rowsPerPage'] == 100 ? 'active' : '' }}">
                                        <a onclick="changeRowsPerPageCards(100)">100</a>
                                    </li>
                                </ul>
                            </span>
                            <span style="color: #fff;">rows per page</span>
                        </span>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="pagination" style="margin: 0px; ">
                        <input id="pageReload" type="hidden" val="" data-page="{{$UserInfoViews->currentPage()}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('players/cards')}}" data-excel-url="{{ route('export2excelCards') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                        <ul class="pagination" style="margin: 0px;">
                            @if ( !$UserInfoViews->lastPage()  )
                                <li class="page-number active" >
                                    <a onclick="changePageNumR(1)">1</a>
                                </li>
                            @endif
                            @if ( $UserInfoViews->lastPage() != 1  )
                                @if ($UserInfoViews->lastPage() < 6) 
                                    @for ($i = 1; $i <= $UserInfoViews->lastPage(); $i++)
                                        <li class="page-number {{$UserInfoViews->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumCards({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @else 


                                    @if ( $UserInfoViews->currentPage() > 1  )
                                        <li class="page-pre">
                                            <a onclick="changePageNumCards({{ $UserInfoViews->currentPage()-1}})" >‹</a>
                                        </li>
                                    @endif
                                    @if ( $UserInfoViews->currentPage() >= 4)
                                         <li class="page-number">
                                            <a onclick="changePageNumCards(1)">1</a>
                                        </li>
                                         <li class="page-last-separator disabled">
                                            <a href="javascript:void(0)">...</a>
                                        </li>
                                    @endif

                                    @if ( $UserInfoViews->currentPage() == 1 )
                                        @for ($i = 1; $i < 6; $i++)
                                            <li class="page-number {{$UserInfoViews->currentPage() == $i ? "active" : "" }}">
                                                <a onclick="changePageNumCards({{ $i }})">{{ $i }}</a>
                                            </li>
                                        @endfor
                                    @endif

                                    @if ( $UserInfoViews->currentPage() == 2 || $UserInfoViews->currentPage() == 3)
                                        @for ($i = 1; $i < 6; $i++)
                                            <li class="page-number {{$UserInfoViews->currentPage() == $i ? "active" : "" }}">
                                                <a onclick="changePageNumCards({{ $i }})">{{ $i }}</a>
                                            </li>
                                        @endfor
                                    @endif 

                                    @if ( $UserInfoViews->currentPage() > 3 && $UserInfoViews->currentPage() < $UserInfoViews->lastPage() - 2  )
                                        @for ($i = $UserInfoViews->currentPage() - 2 ; $i < $UserInfoViews->currentPage() + 3; $i++)
                                            <li class="page-number {{$UserInfoViews->currentPage() == $i ? "active" : "" }}" >
                                                <a onclick="changePageNumCards({{ $i }})">{{ $i}}</a>
                                            </li>
                                        @endfor
                                    @endif

                                    @if ( $UserInfoViews->currentPage() == $UserInfoViews->lastPage() - 1 || $UserInfoViews->currentPage() == $UserInfoViews->lastPage() - 2)
                                        @for ($i = $UserInfoViews->lastPage() - 5 ; $i < $UserInfoViews->lastPage() + 1; $i++)
                                            <li class="page-number {{$UserInfoViews->currentPage() == $i ? "active" : "" }} " >
                                                <a onclick="changePageNumCards({{ $i }})">{{ $i}}</a>
                                            </li>
                                        @endfor
                                    @endif



                                    @if ( $UserInfoViews->currentPage() == $UserInfoViews->lastPage())
                                        @for ($i = $UserInfoViews->lastPage() - 4 ; $i < $UserInfoViews->lastPage()+1; $i++)
                                            <li class="page-number {{$UserInfoViews->currentPage() == $i ? "active" : "" }}">
                                                <a onclick="changePageNumCards({{ $i }})">{{ $i}}</a>
                                            </li>
                                        @endfor
                                    @endif

                                    @if ( $UserInfoViews->currentPage() < $UserInfoViews->lastPage() - 2 )
                                         <li class="page-last-separator disabled">
                                            <a href="javascript:void(0)">...</a>
                                        </li>
                                        <li class="page-number">
                                            <a onclick="changePageNumCards({{ $UserInfoViews->lastPage() }})" >{{ $UserInfoViews->lastPage()}}</a>
                                        </li>

                                    @endif
                                    @if ( $UserInfoViews->currentPage() < $UserInfoViews->lastPage())
                                        <li class="page-next">
                                            <a onclick="changePageNumCards({{ $UserInfoViews->currentPage() + 1 }})" >›</a>
                                        </li>
                                    @endif

                                @endif
                           @else
                                <li class="page-number active">
                                    <a onclick="changePageNumCards({{ $UserInfoViews->currentPage() }})" >{{$UserInfoViews->currentPage()}}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="keep-open btn-group open pull-right" title="Columns">
                        <a class="btn btn-success CardsSort" style="display: none;" onclick="changePageSortMenuCards()"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-default CardsSort" style="display: none;" onclick="cleanSortFunctionCards()"><i class="fa fa-close" aria-hidden="true"></i></a> 
                        <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuCards();">
                           Sort Menu
                           <span class="caret"></span>
                        </button>
                    </div>
                </div>
                <div class="panel-body" id="tableRoulette" >
                    <table id="example" class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"

                            data-pagination="false"
                            data-side-pagination="client"
                            data-page-list="[20, 50, 100]"
                            data-page-size="20"
                            data-classes="table-condensed"
                    >
                        <thead class="w3-dark-grey">
                            <tr>
                                <th class="text-center CardsSort" style="display: none; vertical-align: middle;" data-field="id203" ><input class="form-control" type='text' style="color: #333" value="{{$page['CardID'] == "" ? "" : $page['CardID']}}" id='CardID' ></th>
                                <th class="text-center CardsSort" style="display: none; vertical-align: middle;" data-field="id203" ><input class="form-control" type='text' style="color: #333" value="{{$page['Name'] == "" ? "" : $page['Name']}}" id='Name' ></th>
                                <th class="text-center CardsSort" style="display: none; vertical-align: middle;" data-field="id203" >
                                    <select id='Level' class="form-control input-sm rowInputAdd"  style=" display: show;">
                                        <option value="" >Select</option>
                                        <option value="bronze" {{$page['Level'] == "bronze" ? "selected" : ""}}>Bronze</option>
                                        <option value="gold" {{$page['Level'] == "gold" ? "selected" : ""}}>Gold</option>
                                        <option value="platinum" {{$page['Level'] == "platinum" ? "selected" : ""}}>Platinum</option>
                                    </select>
                                </th>
                                <th class="text-center CardsSort" style="display: none; vertical-align: middle;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            From:
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromDeposit'] == "" ? "" : $page['FromDeposit']}}" id='FromDeposit' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            To:
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToDeposit'] == "" ? "" : $page['ToDeposit']}}" id='ToDeposit' >
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th class="text-center CardsSort" style="display: none; vertical-align: middle;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            From:
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromBankCredit'] == "" ? "" : $page['FromBankCredit']}}" id='FromBankCredit' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            To:
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToBankCredit'] == "" ? "" : $page['ToBankCredit']}}" id='ToBankCredit' >
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th class="text-center CardsSort" style="display: none; vertical-align: middle;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            From:
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromBonusPoints'] == "" ? "" : $page['FromBonusPoints']}}" id='FromBonusPoints' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            To:
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToBonusPoints'] == "" ? "" : $page['ToBonusPoints']}}" id='ToBonusPoints' >
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th class="text-center CardsSort" style="display: none; vertical-align: middle;">
                                    
                                </th>
                            </tr>
                            
                            
                            <tr>
                                <th class="text-center" onclick="changePageSortCards('card_id', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Card #<i class="fa {{ $page['OrderQuery'] == 'card_id' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" style="color: #fff" ></i></th>
                                <th class="text-center" onclick="changePageSortCards('name', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Name<i class="fa {{ $page['OrderQuery'] == 'name' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" ></i></th>
                                <th class="text-center" onclick="changePageSortCards('level', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Type<i class="fa {{ $page['OrderQuery'] == 'level' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" ></i></th>
                                <th class="text-center" onclick="changePageSortCards('deposit', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Cash in<i class="fa {{ $page['OrderQuery'] == 'deposit' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" ></i></th>
                                <th class="text-center" onclick="changePageSortCards('bank_credit', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Card Balance<i class="fa {{ $page['OrderQuery'] == 'bank_credit' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right"></i></th>
                                <th class="text-center" onclick="changePageSortCards('bonus_points', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Bonus Points<i class="fa {{ $page['OrderQuery'] == 'bonus_points' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right"></i></th>
                                <th class="text-center col-md-3">
                                    <button class="btn btn-danger btn-xs" type="button"  tabindex="0" onclick="AddNewCart()"  style="width: 31%;">
                                        <span id="refresh" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                        <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                        <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                        <i class="glyphicon glyphicon-plus-sign"></i>
                                        <span id="addCard">Add Card</span>
                                    </button>
                                    <button class="btn btn-default btn-xs" type="button"  tabindex="0" onclick="AddWithdrawCart()"  style="width: 67%;">
                                        <span id="OKWithdraw" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                        <span id="OKAddWithdraw" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                        <i class="glyphicon glyphicon-transfer"></i>
                                        <span id="addWithdrawCard">Add/Withdraw Credit</span> 
                                    </button>
                                </th>
                            </tr>
                            <tr id="rowAdd" class="rowInputAdd" style="display: none;">
                                        <th class="text-center rowInputAdd">
                                            <span id="errorAdd" style="color: #d9534f; display: none;"> Read the card, please.</span> 
                                            <span id="errorAddT" style="color: #d9534f; display: none;"> This Card ID: <span id="CartIDExist">111</span> exist in the database.</span> 
                                            <span id="errorAddI" style="color: #d9534f; display: none;"> Insert the card, please.</span> 
                                            <input id="CartIDAdd" class="form-control input-sm rowInputAdd" value="" name="CartIDAdd" placeholder="Card ID" required="" numbers-only="" style="display:show; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" readonly>
                                            <button class="form-control btn btn-primary btn-xs rowInputAdd" type="button" onclick="ReadNewCard()" style="display: show;" tabindex="0">
                                                <span id="refreshRNC" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKRNC" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeRNC" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Read New Card
                                            </button>
                                        </th>
                                        <th class="text-center rowInputAdd">
                                            <span id="errorAddUser" style="color: #d9534f; display: none;"> Enter username, please.</span> 
                                            <input id="userName" class="form-control input-sm rowInputAdd" value="" name="userName" placeholder="Player Name" required="" numbers-only="" style="display:show; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                            <input id="userAddress" class="form-control input-sm rowInputAdd" value="" name="userAddress"  placeholder="Player Address" required="" numbers-only="" style="display:show; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                            <input id="userPhone" class="form-control input-sm rowInputAdd" value="" name="userPhone" placeholder="Player Phone" required="" numbers-only="" style="display:show;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                        </th>
                                        <th class="text-right rowInputAdd" style="vertical-align: middle;">
                                            <select id="nameAdd" class="form-control input-sm rowInputAdd" disabled="" style=" display: show;">
                                                <option value="bronze" >Bronze</option>
                                                <option value="gold" >Gold</option>
                                                <option value="platinum" >Platinum</option>
                                            </select>
                                        </th>
                                        <th class="text-right rowInputAdd" style="vertical-align: middle;">
                                            <input id="cashIn" class="form-control input-sm rowInputAdd" value="" name="cashIn" placeholder="CashIn Amount" required="" numbers-only="" style="display:show;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </th>
                                        <th class="text-right rowInputAdd" style="vertical-align: middle;">
                                        </th>
                                        <th class="text-right rowInputAdd" style="vertical-align: middle;">
                                       </th>
                                       <th class="text-center rowInputAdd" style="vertical-align: middle;">
                                            <button class="form-control btn btn-warning btn-xs rowInputAdd" type="button" onclick="SaveAddCard()" style="display: show; width: 30%;" tabindex="0">
                                                Save
                                            </button>
                                           
                                        </th>
                                    </tr>
                                    <tr id="rowAddWithdraw" class="rowInputAddWithdraw" style="display: none;">
                                        <th class="text-center rowInputAddWithdraw">
                                            <span id="errorAddWithdraw" style="color: #d9534f; display: none;"> Read the card, please.</span> 
                                            <span id="errorAddWithdrawT" style="color: #d9534f; display: none;"> This Card ID: <span id="CartID2Exist">111</span> exist in the database.</span> 
                                            <span id="errorAddWithdrawI" style="color: #d9534f; display: none;"> Insert the card, please.</span> 
                                            <input id="CartIDAddWithdraw" class="form-control input-sm rowInputAddWithdraw" value="" name="CartIDAddWithdraw" placeholder="Card ID" required="" numbers-only="" style="display:show; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" readonly>
                                            <button class="form-control btn btn-primary btn-xs rowInputAddWithdraw" type="button" onclick="ReadWithdrawCard()" style="display: show;" tabindex="0">
                                                <span id="refreshRNC" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKRNC" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeRNC" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Read New Card
                                            </button>
                                        </th>
                                        <th class="text-center rowInputAddWithdraw" style="vertical-align: middle;">
                                            <span id="userWithdrawName" > </span> 
                                        </th>
                                        <th class="text-right rowInputAddWithdraw" style="vertical-align: middle;">
                                            <span id="levelWithdraw" > </span>
                                        </th>
                                        <th class="text-right rowInputAddWithdraw" style="vertical-align: middle;">
                                            <span id="cashInWithdraw" > </span>
                                        </th>
                                        <th class="text-right rowInputAddWithdraw" style="vertical-align: middle;">
                                            <span id="errorBankCredit" style="color: #d9534f; display: none;">The withdrawal amount is bigger than existing Card Balance.<br /></span> 
                                            <span id="BankCreditText" > </span> 
                                            <input id="BankCreditWithdraw" class="form-control input-sm rowInputAddWithdraw" value="" name="BankCredit" placeholder="CashIn Amount" required="" numbers-only="" style="display:show;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </th>
                                        <th class="text-right rowInputAddWithdraw" style="vertical-align: middle;">
                                            <span id="BonusPointsText" ></span> 
                                        </th>
                                        <th class="text-center rowInputAddWithdraw" style="vertical-align: middle;">
                                            <button class="form-control btn btn-warning btn-xs rowInputAddWithdraw" type="button" onclick="SaveAddWithdrawCard()" style="display: show; width: 31%;" tabindex="0">
                                                <span id="refreshAddWithdraw" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="removeAddWithdraw" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Add
                                            </button>
                                            <button class="form-control btn btn-warning btn-xs rowInputAddWithdraw" type="button" onclick="SaveWithdrawCard()" style="display: show; width: 67%;" tabindex="0">
                                                <span id="refreshWithdraw" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="removeWithdraw" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Withdraw
                                            </button>
                                           
                                        </th>
                                    </tr>
                        </thead>
                        </tbody>
                           @if ($UserInfoViews)
                                @foreach($UserInfoViews as $key => $val)
                                    <tr class="tr-class bootstrap-modal-form-open rows" id="row{{$val->id}}" data-toggle="modal" data-target="#bingoHistory_modal">
                                        <td class="text-center" style="vertical-align: bottom;">
                                            <span id="CartIDText{{$val->id}}" class="row{{$val->id}}">{{$val->card_id}} </span>
                                            <span id="errorAdd{{$val->id}}" style="color: #d9534f; display: none;"> Read the card, please.</span> 
                                            <span id="errorAddT{{$val->id}}" style="color: #d9534f; display: none;"> This Card ID: <span id="CartIDExist">111</span> exist in the database.</span> 
                                            <span id="errorAddI{{$val->id}}" style="color: #d9534f; display: none;"> Insert the card, please.</span> 
                                            <input id="CartID{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->card_id}}" placeholder="Cart ID" name="CartID" readonly="" required="" numbers-only="" style="display: none;" tabindex="0" aria-required="false" aria-invalid="false" type="text">
                                            <button class="form-control btn btn-primary btn-xs rowInput{{$val->id}}" type="button" onclick="ReadNewCard2({{$val->id}})" style="display: none;" tabindex="0">
                                                <span id="refreshRNC{{$val->id}}" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKRNC{{$val->id}}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeRNC{{$val->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Read New Card
                                            </button>
                                        
                                        </td>
                                        <td class="text-center">
                                            <span id="nameText{{$val->id}}" class="row{{$val->id}}">{{$val->name}} </span>
                                            <span id="errorAddUser{{$val->id}}" style="color: #d9534f; display: none;"> Enter username, please.</span> 
                                            <input id="name{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->name}}" placeholder="Player Name" name="name" required="" numbers-only="" style="display: none;" tabindex="0" aria-required="false" aria-invalid="false" type="text">
                                            <input id="userAddress{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->address}}" name="userAddress" placeholder="Player Address" required="" numbers-only="" style="display:none; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                            <input id="userPhone{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->phone}}" name="userPhone" placeholder="Player Phone" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td2{{$val->id}}" class="row{{$val->id}}">{{$val->level}}</span>
                                            <!--<select id="type{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" disabled=""  style="display:none !important;">
                                                <option value="bronze" {{$val->level == "bronze" ? "selected" : ""}}>Bronze</option>
                                                <option value="gold" {{$val->level == "gold" ? "selected" : ""}}>Gold</option>
                                                <option value="platinum" {{$val->level == "platinum" ? "selected" : ""}}>Platinum</option>
                                            </select> -->
                                        </td>
                                        <td class="text-right" style="vertical-align: bottom;">
                                            <span id="cashInText{{$val->id}}" class="row{{$val->id}}">{{$val->deposit}}</span>
                                            <input id="cashIn{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->deposit}}" name="cashIn" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="BankCredit{{$val->id}}" class="row{{$val->id}}">{{$val->bank_credit}}</span>
                                        </td>
                                        <td class="text-right">
                                            <span id="td6{{$val->id}}" class="row{{$val->id}}">{{$val->bonus_points}}</span>
                                        </td>
                                        <td class="text-center" style="vertical-align: inherit;">
                                            <button class="btn btn-primary btn-xs row{{$val->id}}" type="button" onclick="EditCart({{$val->id}})" tabindex="0" style="width: 31%;">
                                                <span id="refreshEdit{{$val->id}}" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKEdit{{$val->id}}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="remove1Edit{{$val->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-default btn-xs row{{$val->id}}" type="button" onclick="TransactionsCart({{$val->id}})" tabindex="0"  style="width: 67%;">
                                                Transactions
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$val->id}} form-control" type="button" onclick="SaveEditCart({{$val->id}})" style="display: none;" tabindex="0">
                                                <span id="removeEdit{{$val->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Save
                                            </button>
                                            <button class="btn btn-primary btn-xs row2Input{{$val->id}}" type="button" onclick="RemoveBet2BonusPoints({{$val->id}})" style="display: none; margin-top: 0px" tabindex="0">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif    
                        </tbody>
                    </table>
                        
            
                </div>        
            </div>
        </div>
    </div>    
</div> 


<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script >
//sortTimer123 = setTimeout(function(){ $('.RouletteSort').hide(); }, 200);
pageSortMenuOpen =  $('#pageReload').attr('data-sortMenuOpen');    
if (pageSortMenuOpen == 1){
    sortTimer123 = setTimeout(function(){ $('.CardsSort').show(); }, 200);
}else{
    sortTimer123 = setTimeout(function(){ $('.CardsSort').hide(); }, 200);
}    
//$("#rouletteHistory_modal").css({'overflow': 'scroll'});
</script>
