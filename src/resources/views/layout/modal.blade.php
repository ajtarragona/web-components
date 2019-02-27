<div class="modal-container" id="@yield('id') ">
  <div class="modal-title">@yield('title')</div>
  <div class="modal-body">@yield('body')</div>
  @hasSection('actions')
    <div class="modal-footer">
      @yield('actions')
    </div>
  @endif
  
</div>
{{-- <div class="modal fade" id="@yield('id')" tabindex="-1" role="dialog" aria-labelledby="@yield('title')" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@yield('title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @yield('body')
      </div>
      @hasSection('actions')
        <div class="modal-footer">
          @yield('actions')
        </div>
    @endif
    </div>
  </div>
</div> --}}
