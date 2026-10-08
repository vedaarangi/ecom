<header class="main-header">
    {!! Theme::partial('header-top') !!}
    <div class="main-menu-area d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto col-lg-2 col-xl-2 d-flex align-items-center">
                    {!! Theme::partial('logo') !!}
                </div>
                <div class="col col-lg-7 col-xl-7 d-flex align-items-center justify-content-center">
                    <div class="main-menu d-none d-lg-block">
                        <nav id="mobile-menu">
                            @php
                                $menuHtml = Menu::renderMenuLocation('main-menu', ['view' => 'menu']);
                                if (empty(trim($menuHtml ?? ''))) {
                                    $menuHtml = Menu::renderMenuLocation('main-menu');
                                }
                                if (empty(trim($menuHtml ?? ''))) {
                                    $firstMenu = \Botble\Menu\Models\Menu::wherePublished()->first();
                                    if ($firstMenu) {
                                        $menuHtml = Menu::generateMenu(['slug' => $firstMenu->slug, 'view' => 'menu']);
                                    }
                                }
                            @endphp
                            {!! $menuHtml !!}
                        </nav>
                    </div>
                </div>
                @if (is_plugin_active('ecommerce'))
                    <div class="col-auto col-lg-3 col-xl-3 d-flex align-items-center justify-content-end ms-auto">
                        <div class="header-meta d-flex align-items-center justify-content-end">
                            <div class="mainmenu__search">
                                <form action="{{ route('public.products') }}" class="position-relative form--quick-search" data-url="{{ route('public.ajax.search-products') }}" method="GET">
                                    <div class="mainmenu__search-bar p-relative">
                                        <button class="mainmenu__search-icon" title="search"><i class="fal fa-search"></i></button>
                                        <input type="text" name="q" class="input-search-product" placeholder="{{ __('Search products...') }}" value="{{ BaseHelper::stringify(request()->query('q')) }}" autocomplete="off">
                                    </div>
                                    <div class="panel--search-result"></div>
                                </form>
                            </div>
                            {!! Theme::partial('header-meta') !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>

<style>
    .main-header .main-menu-area {
        padding: 12px 0;
        background: #fff;
    }
    .main-header .main-menu-area .logo img {
        max-height: 44px;
        width: auto;
        display: block;
    }
    .main-header .main-menu-area .main-menu nav > ul {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        flex-wrap: nowrap !important;
        white-space: nowrap !important;
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important;
        gap: 14px;
    }
    .main-header .main-menu-area .main-menu nav > ul > li {
        display: inline-flex !important;
        align-items: center !important;
        margin: 0 !important;
        padding: 0 !important;
        white-space: nowrap !important;
        flex-shrink: 0 !important;
    }
    .main-header .main-menu-area .main-menu nav > ul > li > a {
        font-size: 13.5px !important;
        font-weight: 600 !important;
        white-space: nowrap !important;
        padding: 14px 0 !important;
        line-height: 1.2 !important;
        color: var(--tp-text-body, #333) !important;
        display: inline-block !important;
        transition: color 0.2s ease;
    }
    .main-header .main-menu-area .main-menu nav > ul > li > a:hover {
        color: var(--tp-text-primary, #d51243) !important;
    }
    @media (min-width: 992px) and (max-width: 1200px) {
        .main-header .main-menu-area .main-menu nav > ul {
            gap: 10px !important;
        }
        .main-header .main-menu-area .main-menu nav > ul > li > a {
            font-size: 12.5px !important;
        }
    }
    .main-header .main-menu-area .mainmenu__search {
        min-width: 145px;
        max-width: 185px;
    }
    .main-header .main-menu-area .mainmenu__search-bar {
        position: relative;
    }
    .main-header .main-menu-area .mainmenu__search-bar input {
        width: 100%;
        height: 38px;
        border-radius: 20px;
        background-color: var(--tp-grey-2, #f5f5f5);
        border: 1px solid var(--tp-border-1, #e5e5e5);
        padding: 0 15px 0 35px;
        font-size: 13px;
        color: var(--tp-text-body, #333);
        outline: none;
        transition: border-color 0.2s ease;
    }
    .main-header .main-menu-area .mainmenu__search-bar input:focus {
        border-color: var(--tp-text-primary, #d51243);
    }
    .main-header .main-menu-area .mainmenu__search-icon {
        position: absolute;
        inset-inline-start: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        padding: 0;
        color: var(--tp-text-body, #777);
        font-size: 13px;
        cursor: pointer;
    }
    .main-header .main-menu-area .header-meta {
        margin-inline-start: 12px;
    }
    .main-header .main-menu-area .header-meta .header-meta__social {
        margin-inline-start: 12px;
    }
</style>

{!! Theme::partial('navbar') !!}

