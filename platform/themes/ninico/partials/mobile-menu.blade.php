<ul {!! $options ?? '' !!}>
    @if (!empty($menu_nodes) && count($menu_nodes))
        @foreach ($menu_nodes as $key => $node)
            @php
                $title = $node->title;
            @endphp

            <li @class([
                    $node->css_class => $node->css_class,
                    'has-dropdown' => $node->has_child
                ])>
                <a href="{{ url($node->url) }}" @if ($node->target !== '_self') target="{{ $node->target }}" @endif>
                    {!! $node->icon_html !!}

                    @if ($title)
                        <span class="title">{{ $title }}</span>
                    @endif
                </a>

                @if ($node->has_child)
                    {!! Menu::generateMenu([
                        'menu' => $node,
                        'menu_nodes' => $node->child,
                        'view' => 'menu',
                        'options' => ['class' => 'submenu'],
                    ]) !!}
                @endif
            </li>
        @endforeach
    @else
        @php
            $fallbackMenu = \Botble\Menu\Models\Menu::wherePublished()->with(['menuNodes' => fn($q) => $q->where('parent_id', 0)->orderBy('position')])->first();
            $nodes = $fallbackMenu ? $fallbackMenu->menuNodes : collect();
        @endphp
        @if ($nodes->isNotEmpty())
            @foreach ($nodes as $node)
                <li>
                    <a href="{{ url($node->url) }}">
                        {!! $node->icon_html !!}
                        <span class="title">{{ $node->title }}</span>
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
