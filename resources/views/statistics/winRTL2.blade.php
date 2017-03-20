<div class="container">
    <div class=" "> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb">
              <li ><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">@lang('messages.Bingo')</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>-->
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">@lang('messages.Blackjack')</a></li>
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">@lang('messages.Roulette') 1</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette2')}}')">@lang('messages.Roulette') 2</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/winRTL1')}}')">@lang('messages.Win') @lang('messages.Roulette')1</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>-->
              <!--<li><a href="javascript:ajaxLoad('#')">Slots </a></li>-->
            </ul>
        </div>
        
    </div>
    <div class=" "> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb">
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette2')}}')">@lang('messages.Roulette History Statistics')</a></li>
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/winRTL2')}}')">@lang('messages.Wheel Statistics')</a></li>
            </ul>
        </div>
        
    </div>
    <div class="row" >
        <div class="col-md-12">

            <div class="panel panel-default" id="panelBingoContend">
                <div class="panel-heading">
                    <div>
                        <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 35%;">
                            @lang('messages.Wheel Statistics') 
                        </h2>

                        <a  class="btn btn-warning  pull-right" onclick="ExportToPNGBingoTable();">
                            @lang('messages.Export to PNG')
                        </a>
                    </div> 
                </div>

                <div class="panel-body" >
                    <div class="col-md-6">
                        <table class="table " >
                            <thead class="w3-dark-grey">
                        
                                <tr>
                                    <th>
                                        @lang('messages.Number') 
                                    </th>
                                    <th>
                                        @lang('messages.Hits')
                                    </th>
                                    <th>
                                        @lang('messages.Percentage Distribution')
                                    </th>
                                     <th>
                                        @lang('messages.Number') 
                                    </th>
                                    <th>
                                        @lang('messages.Hits')
                                    </th>
                                    <th>
                                        @lang('messages.Percentage <br />Distribution')
                                </tr>
                            </thead>
                            <tbody >
                                <tr>
                                    <td>
                                        0:
                                    </td>
                                    <td>
                                        {{$historys->wins0}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins0/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        20:
                                    </td>
                                    <td>
                                        {{$historys->wins20}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins20/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1:
                                    </td>
                                    <td>
                                        {{$historys->wins1}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins1/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        21:
                                    </td>
                                    <td>
                                        {{$historys->wins21}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins21/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2:
                                    </td>
                                    <td>
                                        {{$historys->wins2}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins2/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        22:
                                    </td>
                                    <td>
                                        {{$historys->wins22}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins22/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3:
                                    </td>
                                    <td>
                                        {{$historys->wins3}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins3/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        23:
                                    </td>
                                    <td>
                                        {{$historys->wins23}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins23/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4:
                                    </td>
                                    <td>
                                        {{$historys->wins4}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins4/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        24:
                                    </td>
                                    <td>
                                        {{$historys->wins24}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins24/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5:
                                    </td>
                                    <td>
                                        {{$historys->wins5}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins5/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        25:
                                    </td>
                                    <td>
                                        {{$historys->wins25}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins25/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6:
                                    </td>
                                    <td>
                                        {{$historys->wins6}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins6/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        26:
                                    </td>
                                    <td>
                                        {{$historys->wins26}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins26/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        7:
                                    </td>
                                    <td>
                                        {{$historys->wins7}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins7/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        27:
                                    </td>
                                    <td>
                                        {{$historys->wins27}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins27/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        8:
                                    </td>
                                    <td>
                                        {{$historys->wins8}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins8/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        28:
                                    </td>
                                    <td>
                                        {{$historys->wins28}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins28/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        9:
                                    </td>
                                    <td>
                                        {{$historys->wins9}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins9/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        29:
                                    </td>
                                    <td>
                                        {{$historys->wins29}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins29/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        10:
                                    </td>
                                    <td>
                                        {{$historys->wins10}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins10/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        30:
                                    </td>
                                    <td>
                                        {{$historys->wins30}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins30/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        11:
                                    </td>
                                    <td>
                                        {{$historys->wins11}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins11/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        31:
                                    </td>
                                    <td>
                                        {{$historys->wins31}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins31/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        12:
                                    </td>
                                    <td>
                                        {{$historys->wins12}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins12/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        32:
                                    </td>
                                    <td>
                                        {{$historys->wins32}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins32/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        13:
                                    </td>
                                    <td>
                                        {{$historys->wins13}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins13/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        33:
                                    </td>
                                    <td>
                                        {{$historys->wins33}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins33/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        14:
                                    </td>
                                    <td>
                                        {{$historys->wins14}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins14/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        34:
                                    </td>
                                    <td>
                                        {{$historys->wins34}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins34/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        15:
                                    </td>
                                    <td>
                                        {{$historys->wins15}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins15/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        35:
                                    </td>
                                    <td>
                                        {{$historys->wins35}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins35/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        16:
                                    </td>
                                    <td>
                                        {{$historys->wins16}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins16/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        36:
                                    </td>
                                    <td>
                                        {{$historys->wins36}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins36/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        17:
                                    </td>
                                    <td>
                                        {{$historys->wins17}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins17/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        00:
                                    </td>
                                    <td>
                                        {{$historys->wins37}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins37/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        18:
                                    </td>
                                    <td>
                                        {{$historys->wins18}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins18/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        NSG:
                                    </td>
                                    <td>
                                        {{$historys->wins38}}
                                    </td>
                                    <td>
                                        {{number_format(($historys->wins38/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        19:
                                    </td>
                                    <td>
                                        {{$historys->wins19}}
                                    </td>
                                    <td>
                                       {{number_format(($historys->wins19/$winsTotal)*100 , 2 ) }}%
                                    </td>
                                    <td>
                                        @lang('messages.TOTAL'):
                                    </td>
                                    <td>
                                        {{$winsTotal}}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody >
                        </table>     
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-1">
                        </div>    
                        <div class="col-md-6">   
                            <!--@lang('messages.TOTAL'): {{$winsTotal}} -->



                        </div>
                        <img src="/images/roulette/roulette_wheel_vector_512.png" alt="" style=" margin-top: 100px;">
                    </div>



                </div>    
            </div>        
        </div>    
    </div> 
</div>
    
    
    
    