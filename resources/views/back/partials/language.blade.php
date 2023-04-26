<ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
            data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                {{ strtoupper(app()->getLocale()) }}
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </li>
    <!--/ User -->
</ul>
