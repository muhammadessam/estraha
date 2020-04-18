

<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">{{Lang::get('esteraha.amenitiescontrol')}}</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
        <div class="white-box">

            <div class="row">
                <div class="col-sm-6 col-xs-6">

                        <div class="form-group">
                            <label for="name">{{Lang::get('esteraha.amenityname')}}</label>
                            <div class="input-group">
                             
                                {!! Form::text('name', null,['class'=> 'form-control' , 'required'=>'required'])!!}
                            </div>
                        </div>



                        <div class="form-group">

                                <label for="picture">{{Lang::get('esteraha.uploadpicture')}}</label>
                                <input type="file" id="input-file-now" class="dropify" name="picture" />
                        </div>
                  
                </div>


                </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

        </div>
        </div>
</div>
        </div>
    </div>
</div>

