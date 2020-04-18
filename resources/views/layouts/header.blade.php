<!-- Top Navigation -->

<nav class="navbar navbar-default navbar-static-top m-b-0">

    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

        <div class="top-left-part"><a class="logo" href="index.html"><b><img src="plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>

        <ul class="nav navbar-top-links navbar-left hidden-xs">

            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-right-circle ti-menu"></i></a></li>

            <li>

                <form role="search" class="app-search hidden-xs">

                    <input type="text" placeholder="ابحث ..." class="form-control">

                    <a href=""><i class="fa fa-search"></i></a>

                </form>

            </li>

        </ul>

        <ul class="nav navbar-top-links navbar-right pull-right">



            <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">  {{ Auth::user()->name}}</b> </a>

                <ul class="dropdown-menu dropdown-user animated flipInY">

                    <li><a href="{{URL::to('changepassword/')}}"><i class="ti-pencil"></i> {{Lang::get('esteraha.changepassword')}} </a></li>

                    <li role="separator" class="divider"></li>



                    {!! Form::open(['route' => 'logout' ]) !!}

                    <button type="submit" class="btn btn-default btn-flat" style="background: none; border:none ">

                    <i class="fa fa-power-off"></i> {{Lang::get('esteraha.logout')}}

                    </button>

                    {!! Form::close() !!}



                </ul>

                <!-- /.dropdown-user -->

            </li>

            <!-- /.dropdown -->

        </ul>

    </div>

    <!-- /.navbar-header -->

    <!-- /.navbar-top-links -->

    <!-- /.navbar-static-side -->

</nav>

<!-- End Top Navigation -->

