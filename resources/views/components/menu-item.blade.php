<li class="menu-item">
    <a href="{{$link}}" class="menu-item-link {{Request::url() == $link ? 'active' : ''}}" >
        <span class="text-nowrap">
            <i class="{{$class}} fa-fw "></i>
            <small>{{$name}}</small>
        </span>
        @if ($counter >=0)
        <span class="badge badge-pill bg-white shadow-sm text-primary">{{$counter}}</span>
        @endif
    </a>
</li>