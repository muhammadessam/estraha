<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span></div>
                <!-- /input-group -->
            </li>


            <li class="nav-small-cap m-t-10">{{Lang::get('esteraha.mainmenu')}}</li>
            <li> <a href="{{URL::to('dashboard')}}" class="waves-effect"><i data-icon="P" class="ti-dashboard"></i> <span class="hide-menu">{{Lang::get('esteraha.dashboard')}}</span></a> </li>
            <li> <a href="{{URL::to('admins')}}" class="waves-effect"><i data-icon="P" class="ti-user"></i> <span class="hide-menu">{{Lang::get('esteraha.adminsControl')}}</span></a> </li>
            <li> <a href="{{URL::to('users')}}" class="waves-effect"><i data-icon="P" class="ti-user"></i> <span class="hide-menu">{{Lang::get('esteraha.userscontrol')}}</span></a> </li>
            <li> <a href="{{URL::to('owners')}}" class="waves-effect"><i data-icon="P" class="ti-user"></i> <span class="hide-menu">{{Lang::get('esteraha.ownerscontrol')}}</span></a> </li>
            <li> <a href="{{URL::to('bookings')}}" class="waves-effect"><i data-icon="P" class="ti-bookmark"></i> <span class="hide-menu">{{Lang::get('esteraha.reservationcontrol')}}</span></a> </li>
            <li> <a href="{{URL::to('places')}}" class="waves-effect"><i data-icon="P" class="ti-location-pin"></i> <span class="hide-menu">{{Lang::get('esteraha.placescontrol')}}</span></a> </li>
            <li> <a href="{{URL::to('specialoffers')}}" class="waves-effect"><i data-icon="P" class="ti-star"></i> <span class="hide-menu">{{Lang::get('esteraha.specialofferscontrol')}}</span></a> </li>
            <li> <a href="{{URL::to('amenities')}}" class="waves-effect"><i data-icon="P" class="ti-location-arrow"></i> <span class="hide-menu">{{Lang::get('esteraha.amenitiescontrol')}}</span></a> </li>
           

        </ul>
    </div>
</div>

<!-- Left navbar-header end -->


