<!-- Sidebar -->
<ul class="sidebar navbar-nav {{in_array(\Route::currentRouteName(),['video.view'])?'toggled':''}}">
    <li class="nav-item {{ request()->is('/*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('index')}}">
            <i class="fas fa-fw fa-home "></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('account*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('account.index')}}">
            <i class="fas fa-fw fa-video"></i>
            <span>My Account</span>
        </a>
    </li>
    @if(\Illuminate\Support\Facades\Auth::check() )
        <li class="nav-item {{ request()->is('video/upload*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('video.create')}}">
                <i class="fas fa-fw fa-cloud-upload-alt"></i>
                <span>Upload Video</span>
            </a>
        </li>
    @endif

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Categories</span>
        </a>
        <div class="dropdown-menu">
            @foreach(cate_nav() as $cate)
                <a class="dropdown-item" href="{{route('video.category',$cate->slug)}}">{{$cate->title}}</a>
            @endforeach
        </div>
    </li>

</ul>