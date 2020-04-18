<!--.row-->



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">{{Lang::get('esteraha.adminsControl')}}</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">

               <div class="col-sm-6 ol-md-6 col-xs-12">


                <div class="white-box">


                        <div class="form-group">
                            <label for="name">{{Lang::get('esteraha.username')}}</label>
                        
                             
                                {!! Form::text('name', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                       
                        </div>

                        <div class="form-group">
                            <label for="email">{{Lang::get('esteraha.email')}}</label>
                           
                              
                                {!! Form::email('email', null,['class'=> 'form-control' , 'required'=>'required'])!!}
                         
                        </div>

                       <div class="form-group">
                           <label for="phone_number">{{Lang::get('esteraha.phoneNumber')}}</label>
                         
                             
                               {!! Form::text('phone_number', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                       
                        </div>


                    @if(Request::path() == 'admins/create')

                        <div class="form-group">
                        <label for="birth_date">{{Lang::get('esteraha.birthdate')}}</label>
                       
                         
                            {!! Form::text('birth_date', null,['class'=> 'form-control mydatepicker'  , 'required'=>'required'])!!}

                  
                    </div>
                    @else
                        <div class="form-group">
                            <label for="birth_date">{{Lang::get('esteraha.birthdate')}}</label>
                         
                               
                                {!! Form::text('birth_date', $date,['class'=> 'form-control mydatepicker'  , 'required'=>'required'])!!}

                           
                        </div>
                        @endif


         </div>
		 </div>
           <div class="col-sm-6 ol-md-6 col-xs-12">


            <div class="white-box">
                    <div class="form-group">
                        <label>{{Lang::get('esteraha.gender')}}</label>
                    
                            <select class="form-control" name="gender">
                                <option value="m">{{Lang::get('esteraha.m')}}</option>
                                <option value="f">{{Lang::get('esteraha.f')}}</option>
                            </select>
                     
                    </div>


                    @if(Request::path() == 'admins/create')

                        <div class="form-group">
                            <label for="password">{{Lang::get('esteraha.password')}}</label>
                            
                              
                                {!! Form::password('password',['class'=> 'form-control' , 'required'=>'required'])!!}
                           
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">{{Lang::get('esteraha.confirmpassword')}}</label>
                            
                              
                                {!! Form::password('password_confirm',['class'=> 'form-control'  , 'required'=>'required'])!!}
                         
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>
                    <a href="{{url()->previous()}}" class="btn btn-inverse waves-effect waves-light" style="color: white">{{Lang::get('esteraha.cancel')}}</a>
                </div>
            </div>
			</div>
        </div>
    </div>
</div>

        </div>
    </div>

