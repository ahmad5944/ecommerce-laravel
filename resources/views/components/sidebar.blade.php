@php
    $route = Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<style>
    .active {
        background-color: #e4e8ff !important;
        border-radius: 10px;
        margin-right: 30px !important;
    }
</style>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Hai, {{ auth()->user()->name }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item {{ $route == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ $route == 'product.index' ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('product.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-box-2 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product</span>
                </a>
            </li>
            <li class="nav-item {{ $route == 'order.index' ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('order.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-cart text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Order</span>
                </a>
            </li>
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Management</h6>
            </li> --}}
            <li class="nav-item">
                @if ($route == 'user.index' || $route == 'role.index' || $route == 'permission.index')
                    <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link" aria-controls="pagesExamples"
                        role="button" aria-expanded="true">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                    <div class="collapse show" id="pagesExamples" style="">
                    @else
                        <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link collapsed"
                            aria-controls="pagesExamples" role="button" aria-expanded="false">
                            <div
                                class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">User Management</span>
                        </a>
                        <div class="collapse" id="pagesExamples" style="">
                @endif
                <ul class="nav ms-4">
                    <li class="nav-item {{ $route == 'user.index' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('user.index') }}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Profile </span>
                        </a>
                    </li>
                    <li class="nav-item {{ $route == 'role.index' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('role.index') }}">
                            <span class="sidenav-mini-icon"> R </span>
                            <span class="sidenav-normal"> Role </span>
                        </a>
                    </li>
                    <li class="nav-item {{ $route == 'permission.index' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('permission.index') }}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Permission </span>
                        </a>
                    </li>
                </ul>
    </div>
    </li>
    </ul>
    </div>
</aside>
