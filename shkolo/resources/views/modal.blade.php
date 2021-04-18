<x-layout>
    <x-slot name="title">
        Modal
    </x-slot>
    <input type="hidden" id="ID"  value="{{$ID}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="body-box " >
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4" >Title:</label>
                <input type="text" id="name" class="col-sm-4" value="{{$linksData['Name']}}">
            </div>
            
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4" >Link:</label>
                <input type="url" name="url" id="url" placeholder="https://example.com" value="{{$linksData['URL']}}" class="col-sm-4" >
            </div>
            
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4" >Color:</label>
                <select class="col-sm-4" id="color" onchange="" value="{{$linksData['Color_ID']}}">
                    <option value="0"></option>
                    @foreach ($dataColors as $dataColor)
                        <option value="{{$dataColor->ID}}" {{$dataColor->ID == $linksData['Color_ID'] ? 'selected' : '' }} >{{$dataColor->color}}</option>
                    @endforeach    
                </select>
      
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-sm-8" style=" text-align: right">
                <button  onclick='updateData()' class="btn btn-success save-data">Update</button>
            </div>
        </div>
    </div>
    
    

</x-layout>