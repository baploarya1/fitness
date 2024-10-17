

<?php //var_dump($value); exit;?>
<div class="form-group row mt-2 mb-0">
    <!-- <div class="col-sm-2 "> -->
    <div class="col-lg-2 col-sm-6">
        <label class="col-form-label " for="exampleFormControlSelect1">{{$label}}</label>
    </div>
    {{-- <!-- <div class="{{$col}} form-group">   --> --}}
    <div class="col-lg-5 col-sm-6 form-group">  
  
        <select class="form-control select" name="{{$name}}"  id="{{$name}}">
            {{-- @if($value)
                 <option value=""> {{ $value}}  </option>
            @else
            @endif --}}
            <option value="">-- {{ $placeholder}} --</option>
            @foreach($options as $option)
            {{-- value="{{ $value ?? old($name)}}" --}}
                @if($type == 'obj')
                    <option value="{{ $option->$key1 }} "{{isset($value)&& $value==$option->$key1 ? "selected" :null }}>{{ $option->$key2 }}</option>
                @else
                    <option value="{{ $option[$key1] }} "{{isset($value)&& $value==$option[$key1] ? "selected" :null }} >{{ $option[$key2] }}</option>
                @endif 

            @endforeach
        </select>
    </div>
    {{-- <div class="col-lg-2"> --}}
        {{$slot}}
    {{-- </div> --}}
   </div>
   
<div class="row ">
    <div class="col-md-2"></div>
    <div class="col-md-3 text-left mb-2 mt-0">
            @error($name)  
                <div class="text-danger mb-0" role="alert">  {{$message}} </div>
            @enderror
        </div>
    </div>

   