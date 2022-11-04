<div id="auth-widget">
    <!-- Authentication Links -->
    @guest
        {{-- <a href="{{ route('register') }}" class="btn btn-primary">REGISTER</a> --}}
        <a href="{{ route('login') }}" class="btn btn-primary btn-block">
          @lang('tgn::auth.login') 
          @icon("bi-box-arrow-in-right")
        </a>
    @else
        
         <span class="auth-user text-truncate" title="{{ Auth::user()->name }} ({{ Auth::user()->username }})">@circleicon('user') {{ Auth::user()->name }}</span>
         @form(['id'=>"logout-form",'action'=> route('tgn.logout') , 'method'=>"POST", 'class'=>"d-inline-block"])
              @button(['type'=>'submit','style'=>'link']) 
                @icon("bi-box-arrow-right")
              @endbutton
          @endform
                
    @endguest
    
</div>