<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">{{Lang::get('esteraha.notificationscontrol')}}</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
        <div class="white-box">

            <div class="row">
                <div class="col-sm-6 col-xs-6">

                        <div class="form-group">
                            <label for="name">{{Lang::get('esteraha.title')}}</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-text"></i></div>
                                {!! Form::text('title', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                            </div>
                        </div>
                       <div class="form-group">
                           <label for="phone_number">{{Lang::get('esteraha.text')}}</label>
                           <div class="input-group">
                               <div class="input-group-addon"><i class="ti-Italic"></i></div>
                               {!! Form::text('text', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                           </div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">{{Lang::get('esteraha.send')}}<i class="fa fa-check"></i></button>

                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<script>

</script>