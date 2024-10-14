<div class="form-group row" style="margin-bottom:8px">
        <div class="col-sm-2">
                <label for="exampleInputEmail1" class="col-form-label">{{$label}}</label>
        </div>
        <div class="col-sm-10 d-flex input-group">
            {{$slot}}
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
        
    </div>
