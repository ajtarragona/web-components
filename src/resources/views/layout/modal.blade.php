<div class="modal-container" id="@yield('id') ">
  <div class="modal-title">@yield('title')</div>
  <div class="modal-body">@yield('body')</div>
  @hasSection('actions')
    <div class="modal-footer">
      @yield('actions')
    </div>
  @endif
  
</div>