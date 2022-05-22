<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <a href="{{route('index')}}" class="d-flex align-items-center">
            <img src="{{asset(base::$logo)}}" class="w-50" alt="">
        </a>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul class=" ">
            <x-menu-spacer></x-menu-spacer>

            <x-menu-item link="{{route('home')}}" class="feather feather-home" name="Home"></x-menu-item>

            <x-menu-title title="Article Management"></x-menu-title>
            <x-menu-item link="{{route('category.index')}}" class="feather feather-layers" name="Manage Category" ></x-menu-item>
            <x-menu-item link="{{route('article.create')}}" class="feather feather-plus-circle" name=" Article Create " ></x-menu-item>
            <x-menu-item link="{{route('article.index')}}" class="feather feather-layers" name=" Article List " ></x-menu-item>

            {{-- <x-menu-spacer></x-menu-spacer> --}}


            <x-menu-title title="USER PROFILE"></x-menu-title>
            <x-menu-item link="{{route('profile.yourProfile')}}" class="feather feather-user" name="Your Profile" ></x-menu-item>
            <x-menu-item link="{{route('profile.changePassword')}}" class="feather feather-refresh-cw" name="Change Password" ></x-menu-item>
            <x-menu-item link="{{route('profile.email')}}" class="feather feather-edit" name="Update Name & Email" ></x-menu-item>
            <x-menu-item link="{{route('profile.editPhoto')}}" class="feather feather-arrow-up" name="Update Photo" ></x-menu-item>

            <x-menu-spacer></x-menu-spacer>

            @if (Auth::user()->role == 0)
            <x-menu-title title="User Management"></x-menu-title>
            <x-menu-item link="{{route('user-manager.index')}}" class="feather feather-users" name="Users" ></x-menu-item>  
            @endif
            

            <x-menu-spacer></x-menu-spacer>
            <li>
                <a class="btn btn-outline-primary w-100" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

<div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
    <div class="row header mb-4">
        <div class="col-12">
            <div class="p-2 bg-primary d-flex justify-content-between align-items-center rounded">
                <button class="show-sidebar-btn btn btn-primary d-block d-lg-none">
                    <i class="feather-menu text-light" style="font-size: 2em;"></i>
                </button>
                <form action="" method="post" class="d-none d-md-block">
                    <div class="form-inline">
                        <input type="text" class="form-control mr-2" placeholder="Search Everything">
                        <button class="btn btn-light">
                            <i class="feather-search text-primary"></i>
                        </button>
                    </div>
                </form>
                <div class="dropdown">
                    <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset("storage/profile/" .Auth::user()->photo)}}" class="" alt="" style="width:30px;height:25px"> 
                        <span class="d-none d-md-inline-block">{{Auth::user()->name}}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @yield('content')    
</div>
