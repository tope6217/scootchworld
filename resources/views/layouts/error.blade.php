@if (session()->get('success') != null)
    @if (session()->get('success') == true)
        <p class="alert-info">{{ session()->get('msg') }}
        @else
        <p class="alert-warning">{{ session()->get('msg') }}</p>
    @endif
@endif
