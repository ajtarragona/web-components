<div class="modal-container" id="@yield('id') ">
  <div class="modal-title ">@yield('title')</div>
  <div class="modal-body">@yield('body')</div>
  
  @hasSection('footer')
    <div class="modal-footer">
      @yield('footer')
    </div>
  @endif
  
</div>