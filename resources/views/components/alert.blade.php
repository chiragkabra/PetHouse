<div>
  @if(Session::has('success'))
          <div class="alert alert-primary">
          {{Session::get('success')}}
      </div>
  @elseif(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
  @endif
</div>
