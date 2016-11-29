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
        <div class="col-md-12" style="width: 1000px">

            <div class="panel panel-default" id="panelBet2BonusPoints">
                <div class="panel-heading">
                    <div>
                        <h2 class='text-center' style="display: inline; color: #444649; font-family: 'italic';  padding-left: 20%;">
                            Bet to Bonus Points
                        </h2>
                        <a class="btn btn-warning  pull-right" onclick="export2excelBet2BonusPoints();">
                            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                        </a>
                        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                        <a  class="btn btn-warning  pull-right" onclick="ExportToPNGBet2BonusPoints();">
                            Export to PNG
                        </a>
                    </div>
                </div>
            
            
            
            </div>
        </div>
    </div>    
</div>    