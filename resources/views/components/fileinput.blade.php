@php
    // $imagePath = $value;
    //dd(isset($value));exit;
@endphp

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="{{$label}}" class="col-form-label"> {{$label}} </label>      
    </div>
    <div class="{{$col}}  input-group">
        <input type="file" name="{{$name}}"   class="form-control-file" id="{{$label}}">
        @if(isset($value))
                <img src="{{ asset("storage/".$value) }}" class="img-thumbnail" alt="Image Preview"> 
        @endif
     </div>
     
  </div>