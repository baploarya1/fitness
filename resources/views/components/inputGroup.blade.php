
<?php  

// var_dump($name);
// exit;
?>

<div class="form-group row mb-0"  >
    <div class="col-sm-2">
            <label for="{{$label}}" class="col-form-label"> {{$label}} </label>      
    </div>
                    
    <div class="{{$col}}  input-group">
        <input type="{{$type?? 'text'}}" class="form-control " value="{{ $value ?? old($name)}}" id="{{$label}}" name="{{$name}}" >
    </div>
    <br>
   
    
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3 text-left mb-2">
            @error($name)  
                <div class="text-danger mb-0" role="alert">  {{$message}} </div>
            @enderror
        </div>
    </div>