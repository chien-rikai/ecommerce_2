<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-left header-links">
            <li class="nav-item dropdown d-none d-lg-flex">
                <a class="nav-link dropdown-toggle px-0" id="quickDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">{{__('lang.Language')}}</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-3" aria-labelledby="quickDropdown">
                    <a class="dropdown-item" href="{!! route('user.change-language', ['vi']) !!}">VietNam</a>
                    <a class="dropdown-item" href="{!! route('user.change-language', ['en']) !!}">English</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
