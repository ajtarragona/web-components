@if(function_exists('language'))

	<nav class="navbar navbar-dark mt-auto" id="lang-selector">
	  <ul class="navbar-nav  ">
	    @foreach (language()->allowed() as $code => $name)
	       <li class="nav-item"><a class="nav-link {{ language()->getCode()==$code?"active":""}}" href="{{ language()->back($code) }}">{{ $name }}</a></li>
	    @endforeach
	  </ul>
	</nav>

@endif