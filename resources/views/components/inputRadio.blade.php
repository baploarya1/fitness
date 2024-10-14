<div class="form-group row d-flex" style="margin-bottom:8px">
        <label for="Faktur" class="col-sm-2 col-form-label">{{$label}} </label>
        <div class="col-sm-10 col-3">
            
            <div class="form-check  {{$display}}" style="gap:3rem">
                    @foreach($options as $option)
                    <div class="">
                            <input class="form-check-input" type="radio" name="{{ strtolower(str_replace(' ','',$label))}}" id="{{$option['text']}} " value="{{$option['text']}} "  >
                            <label class="form-check-label" for="{{ $option['text']}} ">
                                {{$option['text']}} 
                            </label>
                    </div>

                    @endforeach

                    
            </div>
        </div>
        
</div>