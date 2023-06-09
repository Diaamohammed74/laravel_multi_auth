<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!--A side Logo-->
            @include('back.partials.asideLogo')
            <!--A side Logo-->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Dashboard</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item ">
            <a href="{{route('back.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{__('lang.Dashboard')}}</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{route('back.admins.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{__('lang.Admins')}}</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{route('back.roles.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{__('lang.Roles')}}</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{__('lang.Users')}}</div>
            </a>
        </li>

    </ul>
</aside>
