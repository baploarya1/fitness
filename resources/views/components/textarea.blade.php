<?php  //dd($value);exit;?>
<div class="form-group row">
    <div class="col-lg-2 col-sm-6">
        <label class="col-form-label " for="{{$label}}">{{$label}}</label>
    </div>
  
    <div class="{{$col}} col-sm-6">
        <textarea class="form-control" name="{{$name}}"  id="{{$label}}" rows="3" placeholder="Masukkan teks di sini...">{{ $value ?? old($name)}}</textarea>
    </div>
</div>