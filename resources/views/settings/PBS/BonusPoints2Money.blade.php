<div class="container">
    <div class=" "> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb">
              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/PBS/BonusPoints2Money')}}')">Bonus Points to Money</a></li>
              <li><a href="javascript:ajaxLoad('{{url('/settings/PBS/Bet2BonusPoints')}}')">Bet to Bonus Points</a></li>
              <li><a href="javascript:ajaxLoad('{{url('/settings/PBS/CardTypeBonusPeriod')}}')">Card Type Bonus Period</a></li>
              <!--<li><a href="javascript:ajaxLoad('{{url('#')}}')">Advertise Image Settings</a></li>-->
              <!--<li><a href="javascript:ajaxLoad('#')">Stock Image Settings</a></li>-->
              
            </ul>
        </div>
        
    </div>
</div>
<div class="container">
    <div class="row" >
        <div class="col-md-12" style="width: 1000px">

            <div class="panel panel-default" id="panelBonusPoints2Money">
                <div class="panel-heading">
                    <div>
                        <h2 class='text-center' style="display: inline; color:#fff; font-family: 'italic';  padding-left: 20%;">
                            Bonus Points to Money
                        </h2>
                        <a href="{{ route('export2excelBonusPoints2Money') }}" class="btn btn-warning  pull-right" >
                            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                        </a>
                        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                        <a  class="btn btn-warning  pull-right" onclick="ExportToPNGBonusPoints2MoneyTable();">
                            Export to PNG
                        </a>
                    </div>
                </div>
                <div class="panel-body" id="" >
                    
                    <div>
                        <label >One Bonus Points To Money (cents):</label>
                        <input id="BonusPoints2Money" class="form-control input-sm" value="{{$settings->points_to_money}}" name="bonus_silver_money" maxlength="7" required="" numbers-only="" placeholder="cents" style="width: 140px;margin-bottom: 10px;display:inline-block;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                        <button class="btn btn btn-primary btn-sm" type="submit"  onclick="BonusPoints2Money()"  tabindex="0">
                            <div class="icons pull-left">
                                <span id="refresh" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                            </div>
                            <div class="text pull-right">Save</div>
                        </button>
                    </div>
            
                </div>
            </div>
        </div>
    </div>    
</div>    