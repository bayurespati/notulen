@if(session('status'))

    @php($type = session('status')['type'])

    <div role="alert" class="alert alert-contrast alert-{{ $type }} alert-dismissible">
        @if($type === 'success')
            <div class="icon"><span class="s7-check"></span></div>
        @elseif($type === 'info')
            <div class="icon"><span class="s7-info"></span></div>
        @elseif($type === 'warning')
            <div class="icon"><span class="s7-attention"></span></div>
        @else
            <div class="icon"><span class="s7-shield"></span></div>
        @endif
        <div class="message">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                <span aria-hidden="true" class="s7-close"></span>
            </button>

            {{ session('status')['msg'] }}
        </div>
    </div>

@endif