<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a  href="{{ route('dashboard') }}" class="brand-link">
        <img   src="{{ asset('admin/logo_images/'.$logo->logo_img) }}" alt="AdminLTE Logo" class="brand-image  elevation-3"
            style="opacity: .8">
        {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- @php
                    dd($logo);
                @endphp --}}
               <a href="{{ route('dashboard') }}">
                <img   src="{{asset('admin/logo_images/'.$logo->favicon_img) }}" class=" elevation-2" alt="User Image">
               </a>
            </div>
            <div class="info">
                <a  href="{{ route('dashboard') }}" class="d-block">Hatbazar</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a  href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>

                {{-- <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                        <p class="pl-3">
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview pl-3">
                        <li class="nav-item">
                            <a  href="{{ route('general_setting') }}" class="nav-link">
                                <i class="fa-solid fa-gears"></i>
                                <p class="pl-3">General Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item  mt-3">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-briefcase"></i>
                        <p class="pl-3">
                            Order
                            <i class="right fas fa-angle-left fa-xs"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview pl-4" >
                        <li class="nav-item">
                            <a  href="{{ route('pending.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                               <div class="badge badge-info"> Pending <span class="badge badge-danger">{{ $pending_count }}</span></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('confirm.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>

                              <div class="badge badge-success"> Confirm <span class="badge badge-danger">{{ $confirm_count }}</span></div>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('delivered.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                                <div class="badge badge-warning"> Deliverd <span class="badge badge-danger">{{ $delivered_count }}</span></div>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('cancelled.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                                <div class="badge badge-danger"> Canceled <span class="badge badge-dark">{{ $cancel_count }}</span></div>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('all.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                                <div class="badge badge-primary"> All_order <span class="badge badge-danger">{{ $all_count }}</span></div>
                            </a>
                        </li>

                    </ul>

                </li> --}}
                <li class="nav-item {{ Request::routeIs('main-category.index') || Request::routeIs('sub-category.index') ? 'menu-open' : '' }}">
                    <a href="{{ asset('/') }}admin/#" class="nav-link">
                        <i class="fa-solid fa-arrow-right fa-xs"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview  bg-info" style="{{ Request::routeIs('main-category.index') || Request::routeIs('sub-category.index') ? 'display: block;' : '' }}">
                        <li class="nav-item">
                            <a href="{{ route('main-category.index') }}" class="nav-link {{ Request::routeIs('main-category.index') ? 'active' : '' }}">

                                <p class="small">Main Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sub-category.index') }}" class="nav-link {{ Request::routeIs('sub-category.index') ? 'active' : '' }}">

                                <p  class="small">Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item {{ Request::routeIs('brand.index')  ? 'menu-open' : '' }}">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Brand
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{ Request::routeIs('brand.index')  ? 'display: block;' : '' }}">
                        <li class="nav-item">
                            <a  href="{{ route('brand.index') }}" class="nav-link {{ Request::routeIs('brand.index') ? 'active' : '' }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            Artibutes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('artibute.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Artibutes Setting</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('artibute-info.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Artibutes info Setting</p>
                            </a>
                        </li>

                    </ul>

                </li>


                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Color
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('color.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>color setting</p>
                            </a>
                        </li>

                    </ul>


                </li>


                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('size.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>size setting</p>
                            </a>
                        </li>

                    </ul>


                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Unit
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('unit.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Unit setting</p>
                            </a>
                        </li>

                    </ul>


                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            In-house Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('product.index') }}" class="nav-link">
                                <<i class="fa-solid fa-arrow-right"></i>
                                <p>Product List</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('product.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Add New Product</p>
                            </a>
                        </li>

                    </ul>


                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            Banner
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('product.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Banner List</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('banner.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Banner create</p>
                            </a>
                        </li>

                    </ul>


                </li>

                {{-- <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Faq
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('faq.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Faq create</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}

                {{-- <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            Service
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('single-service.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>SigleService</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('service.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Service create</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('our-journey.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Our Journey</p>
                            </a>w
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            About
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('about.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>about</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('choose.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Chosse</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('teams.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Team</p>
                            </a>
                        </li>
                    </ul>
                </li>







</aside>
