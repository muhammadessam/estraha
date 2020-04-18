<!--.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">{{Lang::get('esteraha.specialofferscontrol')}}</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
        <div class="white-box">

            <div class="row">
                <div class="col-sm-6 col-xs-6">



                        <div class="form-group">
                            <label for="price_offer">{{Lang::get('esteraha.priceoffer')}}</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                {!! Form::text('price_offer', null,['class'=> 'form-control' , 'required'=>'required'])!!}
                            </div>
                        </div>




                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

                </div>
            </div>
        </div>
    </div>
</div>


</div>
    </div>
</div>