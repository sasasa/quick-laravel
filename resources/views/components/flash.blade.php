{{-- flashメッセージの表示 --}}
@if(session($key))
  <div data-delay="4000" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="mr-auto">{{$mess}}</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      {{session($key)}}
    </div>
  </div>
@endif