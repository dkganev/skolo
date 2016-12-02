<div class="container">
    <div class="row" >
        <div class="col-md-12" >

            <div class="panel panel-default" id="panelBonusPoints2Money">
                <div class="panel-heading">
                    <div>
                        <h2 class='text-center' style="display: inline; color: #444649; font-family: 'italic';  padding-left: 35%;">
                            Cards
                        </h2>
                        <a href="{{ route('export2excelBet2BonusPoints') }}" class="btn btn-warning  pull-right" >
                            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                        </a>
                        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                        <a  class="btn btn-warning  pull-right" onclick="ExportToPNGBonusPoints2MoneyTable();">
                            Export to PNG
                        </a>
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
                                <th class="text-center" data-sortable="true">Card #</th>
                                <th class="text-center" data-sortable="true">Name</th>
                                <th class="text-center" data-sortable="true">Type</th>
                                <th class="text-center" data-sortable="true">Cash in</th>
                                <th class="text-center" data-sortable="true">Card Balance</th>
                                <th class="text-center" data-sortable="true">Bonus Points</th>
                                <th class="text-center col-md-3">
                                    <button class="btn btn-danger btn-xs" type="button"  tabindex="0" onclick="AddNewCart()">
                                        <span id="refresh" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                        <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                        <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                        <i class="glyphicon glyphicon-plus-sign"></i>
                                        <span id="addCard">Add Card</span>
                                    </button>
                                    <button class="btn btn-default btn-xs" type="button"  tabindex="0" onclick="AddBet2BonusPoints()">
                                        <span id="refresh" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                        <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                        <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                        <i class="glyphicon glyphicon-transfer"></i>
                                        Add/Withdraw Credit 
                                    </button>
                                </th>
                            </tr>
                            <tr id="rowAdd" class="rowInputAdd" style="display: none;">
                                        <th class="text-center rowInputAdd">
                                            <span id="errorAdd" style="color: #d9534f; display: none;"> Read the card, please.</span> 
                                            <span id="errorAddT" style="color: #d9534f; display: none;"> This Card ID: <span id="CartIDExist">111</span> exist in the database.</span> 
                                            <span id="errorAddI" style="color: #d9534f; display: none;"> Insert the card, please.</span> 
                                            <input id="CartIDAdd" class="form-control input-sm rowInputAdd" value="" name="CartIDAdd" maxlength="5" required="" numbers-only="" style="display:show; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" readonly>
                                            <button class="form-control btn btn-primary btn-xs rowInputAdd" type="button" onclick="ReadNewCard()" style="display: show;" tabindex="0">
                                                <span id="refreshRNC" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKRNC" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeRNC" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Read New Card
                                            </button>
                                        </th>
                                        <th class="text-center rowInputAdd">
                                            <span id="errorAddUser" style="color: #d9534f; display: none;"> Enter username, please.</span> 
                                            <input id="userName" class="form-control input-sm rowInputAdd" value="" name="userName" maxlength="5" placeholder="Player Name" required="" numbers-only="" style="display:show; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                            <input id="userAddress" class="form-control input-sm rowInputAdd" value="" name="userAddress" maxlength="5" placeholder="Player Address" required="" numbers-only="" style="display:show; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                            <input id="userPhone" class="form-control input-sm rowInputAdd" value="" name="userPhone" maxlength="5" placeholder="Player Phone" required="" numbers-only="" style="display:show;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                        </th>
                                        <th class="text-right rowInputAdd" style="vertical-align: middle;">
                                            <select id="nameAdd" class="form-control input-sm rowInputAdd" disabled="" style=" display: show;">
                                                <option value="bronze">Bronze</option>
                                                <option value="gold">Gold</option>
                                                <option value="platinum">Platinum</option>
                                            </select>
                                        </th>
                                        <th class="text-right rowInputAdd" style="vertical-align: middle;">
                                            <input id="cashIn" class="form-control input-sm rowInputAdd" value="" name="cashIn" maxlength="5" placeholder="CashIn Amount" required="" numbers-only="" style="display:show;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
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
                        </thead>
                        </tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>    
                            
                            @if ($games = false)
                                @foreach($games as $game)
                                    <tr id="row{{$game->id}}">
                                        <td class="text-center">
                                            <span id="td1{{$game->id}}" >{{$game->name}} </span>
                                            <input id="name{{$game->id}}" class="form-control input-sm " value="{{$game->name}}" name="bonus_silver_money" maxlength="7" required="" numbers-only="" style="display: none;" tabindex="0" aria-required="false" aria-invalid="false" type="text">
                                        </td>
                                        <td class="text-right">
                                            <span id="td2{{$game->id}}" class="row{{$game->id}}">{{$game->bronze_money_for_bonus_point}}</span>
                                            <input id="bronze_money_for_bonus_point{{$game->id}}" class="form-control input-sm rowInput{{$game->id}}" value="{{$game->bronze_money_for_bonus_point}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td3{{$game->id}}" class="row{{$game->id}}">{{$game->gold_money_for_bonus_point}}</span>
                                            <input id="gold_money_for_bonus_point{{$game->id}}" class="form-control input-sm rowInput{{$game->id}}" value="{{$game->gold_money_for_bonus_point}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td4{{$game->id}}" class="row{{$game->id}}">{{$game->platinum_money_for_bonus_point}}</span>
                                            <input id="platinum_money_for_bonus_point{{$game->id}}" class="form-control input-sm rowInput{{$game->id}}" value="{{$game->platinum_money_for_bonus_point}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-xs row{{$game->id}}" type="button" onclick="EditBet2BonusPoints({{$game->id}})" tabindex="0">
                                                <span id="refreshEdit{{$game->id}}" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKEdit{{$game->id}}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeEdit{{$game->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$game->id}}" type="button" onclick="SaveBet2BonusPoints({{$game->id}})" style="display: none;" tabindex="0">
                                                Save
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$game->id}}" type="button" onclick="RemoveBet2BonusPoints({{$game->id}})" style="display: none; margin-top: 5px" tabindex="0">
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
