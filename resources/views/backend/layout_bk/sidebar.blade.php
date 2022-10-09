<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ route('home', app()->getLocale())}}">
                    <span class="brand-logo">
                        <img src="{{ asset('admin/app-assets/images/logo/logo.png') }}">
                    </span>
                    <h2 class="brand-text">Elegance</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate">{{ __('title.dashboard') }}</span></a>
            </li>
            <li class=" navigation-header"><span>{{ __('label.website') }}</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="{{ request()->is('admin/user/*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{ route('admin.user.index') }}"><i data-feather="user"></i><span class="menu-title text-truncate">{{ __('title.users') }}</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
