<ul class="nav nav-tabs mb-6">
    <li class="nav-item">
        <a href="{{ route('my-account') }}" class="nav-link {{ Route::currentRouteName() == 'my-account' ? 'active' : '' }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.orders') }}" class="nav-link {{ Route::currentRouteName() == 'account.orders' ? 'active' : '' }}">Orders</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.download') }}" class="nav-link {{ Route::currentRouteName() == 'account.download' ? 'active' : '' }}">Downloads</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.address') }}" class="nav-link {{ Route::currentRouteName() == 'account.address' ? 'active' : '' }}">Addresses</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.profile') }}" class="nav-link {{ Route::currentRouteName() == 'account.profile' ? 'active' : '' }}">Account details</a>
    </li>
    <li class="link-item">
        <a href="{{ route('wishlist') }}">Wishlist</a>
    </li>
    <li class="link-item">
        <a href="{{ route('logout') }}">Logout</a>
    </li>
</ul>
