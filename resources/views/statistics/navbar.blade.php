<div class="row">
    <div class="col-md-12 "> 
        <div style="padding-top:6px; margin-top: 0px;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb">
              <li><a  id="MachineStatistics"
                      data-url="{{substr(url(''),0,-5)}}"
                      href="javascript:ajaxLoad('{{url('statistics/terminals')}}')" 
                    >
                      Machine Statistics
                  </a>
              </li>

              @hasanyrole(['Casino Admin', 'Owner', 'Super User'])
              <li><a href="javascript:ajaxLoad('{{url('statistics/games')}}')">Game Statistics</a></li>

              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Game History</a></li>
              @endhasanyrole
            </ul>
        </div>
    </div>
</div>
<script src="js/statisticsHistory.js"></script>
<script src="/js/socket.io/socket.io.js"></script>
<script src="/js/socket.io/statisticTerminals.js"></script>