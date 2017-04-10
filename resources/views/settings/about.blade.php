<div class="container">
    <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default" id="panelSlotsContend">
                <div class="panel-heading">
                    <div>
                        <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 45%;">
                            @lang('messages.About')
                        </h2>
                    
                    </div>
                </div>
                <div class="panel-body">
                    <h2 style="text-align: center;"> CMS - Control Management System</h2>    
                    <h2> Product Version: {{!empty($aboutArray['version']) ? $aboutArray['version'] : ""}}</h2>
                    <h2> Updates: {{!empty($aboutArray['version']) ? $aboutArray['update'] : ""}}</h2>
                    <h2> Commit: {{!empty($aboutArray['version']) ? $aboutArray['commit'] : ""}} </h2>
                    <h2> Date: {{!empty($aboutArray['version']) ? $aboutArray['commitDate'] : ""}}</h2>
                    @if (empty($shellOutput))
                        <br /><h2> Original version</h2>
                    @else
                        <br /><h2>These files were modified:</h2><hr />
                        @foreach ($shellOutput as $var)
                           <h2>{{$var}} </h2>
                        @endforeach
                    @endif
                           
            </div>
        </div>
    </div>
</div>