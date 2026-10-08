<ul {!! $options ?? '' !!}>
    @if (!empty($menu_nodes) && count($menu_nodes))
        @foreach ($menu_nodes as $key => $node)
            @php
                $hasMegaMenu = $node->has_child && count($node->child) > 12;
            @endphp
            <li @class([
                    $node->css_class => $node->css_class,
                    'has-dropdown' => $node->has_child,
                    'has-megamenu' => $hasMegaMenu
                ])>
                <a href="{{ url($node->url) }}" @if ($node->target !== '_self') target="{{ $node->target }}" @endif @class(['mega-menu-title' => $hasMegaMenu])>
                    {!! $node->icon_html !!}

                    {{ $node->title }}
                </a>

                @if ($node->has_child)
                    @if ($hasMegaMenu)
                        {!! Menu::generateMenu([
                           'menu' => $node,
                           'menu_nodes' => $node->child,
                           'view' => 'mega-menu',
                           'options' => ['class' => 'submenu mega-menu'],
                       ]) !!}
                    @else
                        {!! Menu::generateMenu([
                            'menu' => $node,
                            'menu_nodes' => $node->child,
                            'view' => 'menu',
                            'options' => ['class' => 'submenu'],
                        ]) !!}
                    @endif
                @endif
            </li>
        @endforeach
    @else
        @php
            $fallbackMenu = \Botble\Menu\Models\Menu::wherePublished()->with(['menuNodes' => fn($q) => $q->where('parent_id', 0)->orderBy('position')])->first();
            $fallbackNodes = $fallbackMenu ? $fallbackMenu->menuNodes : collect();
        @endphp
        @if ($fallbackNodes->isNotEmpty())
            @foreach ($fallbackNodes as $fallbackNode)
                <li>
                    <a href="{{ url($fallbackNode->url) }}">
                        {!! $fallbackNode->icon_html !!}
                        {{ $fallbackNode->title }}
                    </a>
                </li>
            @endforeach
        @else
            <li><a href="{{ BaseHelper::getHomepageUrl() }}">{{ __('Home') }}</a></li>
            <li><a href="{{ route('public.products') }}">{{ __('Shop / Order') }}</a></li>
            <li><a href="{{ url('bulk-b2b-enquiry') }}">{{ __('Bulk / B2B Enquiry') }}</a></li>
            <li><a href="{{ url('our-mill') }}">{{ __('Our Mill') }}</a></li>
            <li><a href="{{ url('blog/rice-knowledge') }}">{{ __('Rice Knowledge') }}</a></li>
            <li><a href="{{ url('about-us') }}">{{ __('About Us') }}</a></li>
            <li><a href="{{ url('contact-us') }}">{{ __('Contact Us') }}</a></li>
        @endif
    @endif
</ul>
