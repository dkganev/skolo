<div class="container">
    <div class=" "> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('/settings/PBS/BonusPoints2Money')}}')">Bonus Points to Money</a></li>
              <li><a href="javascript:ajaxLoad('{{url('/settings/PBS/Bet2BonusPoints')}}')">Bet to Bonus Points</a></li>
              <li class="active" ><a href="javascript:ajaxLoad('{{url('/settings/PBS/CardTypeBonusPeriod')}}')">Card Type Bonus Period</a></li>
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
                        <h2 class='text-center' style="display: inline; color: #444649; font-family: 'italic';  padding-left: 20%;">
                            Card Type Bonus Period
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
                    <div class=""  style="padding: 10px;">
                        <div style="padding-left: 25px;">
                            <label>Days:</label>
                            <input id="bonus_period" class="form-control input-sm" value="{{$settings->bonus_period}}" name="time_period" numbers-only="" required="" placeholder="Number of days" style="width: 100px;margin-bottom: 10px;" tabindex="0" aria-required="false" aria-invalid="false" type="number">
                        </div>
                        <div style="display: inline-block; padding-left: 25px;">
                            <h4>Bronze to Gold</h4>
                            <label>Bonus Points:</label>
                            <input id="bronze_gold_boundery" class="form-control input-sm" value="{{$settings->bronze_gold_boundery}}" name="bonus_points" numbers-only="" required="" placeholder="Bonus Points" style="width: 100px;margin-bottom: 10px;display: inline-block;" tabindex="0" aria-required="false" aria-invalid="false" type="number">
                        </div>
                        <div style="display: inline-block; padding-left: 25px;">
                            <h4 >Gold to Platinum</h4>
                            <label>Bonus Points:</label>
                            <input id="gold_platinum_boundery" class="form-control input-sm" value="{{$settings->gold_platinum_boundery}}" name="bonus_points" numbers-only="" required="" placeholder="Bonus Points" style="width: 100px;margin-bottom: 10px;display: inline-block;" tabindex="0" aria-required="false" aria-invalid="false" type="number">
                        </div>
                        <button class="btn btn btn-primary btn-sm" type="submit" onclick="CardTypeBonusPeriod()" tabindex="0">
                            <div class="icons pull-left" >
                                <span id="refresh" class="glyphicon glyphicon-refresh icon-spinner icon-submit" style="display: none;"></span>
                                <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success " style="display: none;"></span>
                                <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error " style="display: none;"></span>
                            </div>
                            <div class="text pull-right">Save</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>    