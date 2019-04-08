<div id="auth-widget">
    <!-- Authentication Links -->
    @guest
        {{-- <a href="{{ route('register') }}" class="btn btn-primary">REGISTER</a> --}}
        <a href="{{ route('login') }}" class="btn btn-primary">
          @lang('Login') 
          @icon("sign-in-alt")
        </a>
    @else
        
         <span class="auth-user">@circleicon('user') {{ Auth::user()->name }}</span>
         @form(['id'=>"logout-form",'action'=> route('tgn.logout') , 'method'=>"POST", 'class'=>"d-inline-block"])
              @button(['type'=>'submit','style'=>'link']) 
                @icon("sign-out-alt")
              @endbutton
          @endform
                
    @endguest
    
</div>