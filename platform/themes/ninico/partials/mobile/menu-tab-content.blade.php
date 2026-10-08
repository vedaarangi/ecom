<div class="mobile-menu-container">
    <div class="mobile-menu-bar mb-10">
        <nav class="mobile-menu-nav">
            @php
                $mobileMenuHtml = Menu::renderMenuLocation('main-menu', ['view' => 'mobile-menu']);
                if (empty(trim($mobileMenuHtml ?? ''))) {
                    $firstMenu = \Botble\Menu\Models\Menu::wherePublished()->first();
                    if ($firstMenu) {
                        $mobileMenuHtml = Menu::generateMenu(['slug' => $firstMenu->slug, 'view' => 'mobile-menu']);
                    }
                }
            @endphp
            {!! $mobileMenuHtml !!}
        </nav>
    </div>
</div>
