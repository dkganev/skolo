<h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Terminals'):<br/>&nbsp;</h3>
<hr style="margin: 7px -20px 12px 0;">
<table class="table" style=" margin-left: 10px; ">
    <thead class="w3-blue-grey">
        <tr>
            <th>@lang('messages.PS ID')</th>
            <th>@lang('messages.Seat ID')</th>
            <th>@lang('messages.Action')</th>
        </tr>
    </thead>
    <tbody>
         
            <tr >
                <td id="yelow-psid0" class="yelow-color" >0</td>
                <td id="yelow-seatid0" class="yelow-color" >deff</td>
                <td>
                    <button class="btn btn-primary btn-xs ps-config-toggle"
                        onclick="ChanePS( 0 );"    
                        autofocus="" accesskey="" type="submit"
                        contenteditable=""data-id="0"
                    >
                        @lang('messages.Edit')
                    </button>
                </td>
            </tr>
            
        
                               
        @foreach($server_ps as $val)
            @if (in_array($val->psid, $idArray))
                <tr >
                    <td id="yelow-psid{{$val->psid}}" class="yelow-color" >{{ $val->psid }}</td>
                    <td id="yelow-seatid{{$val->psid}}" class="yelow-color" >{{ $val->seatid }}</td>
                    <td>
                        <button class="btn btn-primary btn-xs ps-config-toggle"
                            onclick="ChanePS( {{$val->psid}} );"    
                            autofocus="" accesskey="" type="submit"
                            contenteditable=""data-id="{{ $val->psid }}"
                                                
                        >
                            @lang('messages.Edit')
                        </button>
                    </td>
                </tr>
            @endif    
        @endforeach
    </tbody>
</table>