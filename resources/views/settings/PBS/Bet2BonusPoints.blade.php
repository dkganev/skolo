<div class="container">
    <div class=" "> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('/settings/PBS/BonusPoints2Money')}}')">Bonus Points to Money</a></li>
              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/PBS/Bet2BonusPoints')}}')">Bet to Bonus Points</a></li>
              <li><a href="javascript:ajaxLoad('{{url('/settings/PBS/CardTypeBonusPeriod')}}')">Card Type Bonus Period</a></li>
              <!--<li><a href="javascript:ajaxLoad('{{url('#')}}')">Advertise Image Settings</a></li>-->
              <!--<li><a href="javascript:ajaxLoad('#')">Stock Image Settings</a></li>-->
              
            </ul>
        </div>
        
    </div>
</div>

<div class="container">
    <div class="row" >
        <div class="col-md-8" >

            <div class="panel panel-default" id="panelBonusPoints2Money">
                <div class="panel-heading">
                    <div>
                        <h2 class='text-center' style="display: inline; color:#fff; font-family: 'italic';  padding-left: 20%;">
                            Bet to Bonus Points
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
                                <th class="text-center" data-sortable="true">Game</th>
                                <th class="text-center" data-sortable="true">Bronze</th>
                                <th class="text-center" data-sortable="true">Gold</th>
                                <th class="text-center" data-sortable="true">Platinum</th>
                                <th class="text-center">
                                    <button class="btn btn-danger btn-xs" type="button"  tabindex="0" onclick="AddBet2BonusPoints()">
                                        <span id="refresh" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                        <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                        <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                        <span id="addGame">Add Game</span>
                                    </button>
                                </th>
                            </tr>
                            <tr id="rowAdd" class="rowInputAdd" style="display: none;">
                                        <th class="text-center rowInputAdd">
                                            <span id="errorAdd" style="color: #d9534f; display: none;"> Select the game, please.</span> 
                                            <select id="nameAdd" class="form-control input-sm rowInputAdd" style=" display: none;">
                                                <option value="0">Select</option>
                                                @if ($AccountingGames)
                                                    @foreach($AccountingGames as $game)
                                                        <option value="{{$game->gameid}}">{{$game->description}}</option>
                                                    @endforeach
                                                @endif    
                                            </select>
                                        </th>
                                        <th class="text-right rowInputAdd">
                                            <input id="bronze_money_for_bonus_pointAdd" class="form-control input-sm rowInputAdd" value="0" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </th>
                                        <th class="text-right rowInputAdd">
                                            <input id="gold_money_for_bonus_pointAdd" class="form-control input-sm rowInputAdd" value="0" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </th>
                                        <th class="text-right rowInputAdd">
                                            <input id="platinum_money_for_bonus_pointAdd" class="form-control input-sm rowInputAdd" value="0" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </th>
                                        <th class="text-center rowInputAdd">
                                            <button class="form-control btn btn-warning btn-xs rowInputAdd" type="button" onclick="SaveAddBet2BonusPoints()" style="display: none;" tabindex="0">
                                                Save
                                            </button>
                                        </th>
                                    </tr>
                        </thead>
                        </tbody>
                            
                            @if ($games)
                                @foreach($games as $game)
                                    <tr class="tr-class" id="row{{$game->id}}">
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
<!--<script src="bootstrap-table/bootstrap-table.js"></script> --> 
<script>
   addTimer123 = setTimeout(function(){ $(".rowInputAdd").hide(); }, 200); 
    
    
</script>