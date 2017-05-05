<footer class="app-footer">
    <div class="site-footer-right">
        @if (rand(1,100) == 100)
            <i class="voyager-rum-1"></i> Made with rum and even more rum
        @else
            Made with <i class="voyager-heart"></i> by <a href="#" target="_blank">Tp Link</a>
        @endif
        @php $version = 'v1.0'; @endphp
        @if (!empty($version))
            - {{ $version }}
        @endif
    </div>
</footer>
