<x-layout>
    <x-slot name="title">
        Links
    </x-slot>
    
    <div class="body-box " >
        @foreach ($mainDatas as $mainData)
            <a class="main-box " href="{{$mainData['URL']}}" title="{{$mainData['title']}}">
                <div class="box1" style="border-color: {{ $mainData['color'] }};" >
                    <div class="w-100 p-3">
                        <i class="fa fa-plus rounded-circle box2" style="color:{{ $mainData['color'] }}; border-color: {{ $mainData['color'] }};"></i>
                    </div>
                </div>
            </a>
        @endforeach
        
    </div>
    
    
</x-layout>
