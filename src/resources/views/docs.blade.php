@extends('ajtarragona-web-components::layout/master')

@section('title')
	@lang('TGN Web Components Docs')
@endsection

@section('body')
	

	@row(['class'=>''])
	
		@col(['size'=>2,'class'=>'docs-sidebar','style'=>''])
			<h1 ><a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'start.introduction']) }}">TGN</a></h1>
			<hr/>
			<ul class="docs-menu">

				<li class="{{ starts_with($page,'start')?'active':'' }}">
			    	<a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'start.introduction']) }}">
			        	Primers passos
			    	</a>

      				<ul>
      					@include('ajtarragona-web-components::docs.menuitem',['route'=>'start.introduction','title'=>'Introducció'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'start.installation','title'=>'Instal·lació'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'start.config','title'=>'Configuració'])
          			</ul>
    			</li>
    			<li class="{{ starts_with($page,'layout')?'active':'' }}">
					<a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'layout.templates']) }}">
			        	Layout
					</a>
					<ul>
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'layout.templates','title'=>'Plantilles'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'layout.grid','title'=>'Graella'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'layout.blocks','title'=>'Blocs'])
						
						
					</ul>
				</li>
    			<li class="{{ starts_with($page,'components')?'active':'' }}">
					<a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'components.introduction']) }}">
			        	Components
					</a>

					@include('ajtarragona-web-components::docs.components.menu')	
					
			    </li>

			    <li class="{{ starts_with($page,'forms')?'active':'' }}">
					<a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'forms.introduction']) }}">
			        	Forms
					</a>

					
					@include('ajtarragona-web-components::docs.forms.menu')
					
			    </li>
			    <li class="{{ starts_with($page,'utils')?'active':'' }}">
					<a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'utils']) }}">
			        	Utilitats
					</a>
				</li>

			    <hr/>
			    <li class="text-info">
					<a class="doc-link text-info" href="{{ route('webcomponents.kitchen') }}">
			        	@icon('chalkboard') Demo
					</a>

				</li>
			    <hr/>
				<li><a  href="https://getbootstrap.com/docs/4.3/getting-started/introduction/" target="_blank">@icon('external-link-alt') Documentació Bootstrap</a></li>
	    		<li><a  href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">@icon('external-link-alt') Icones Fontawesome</a></li>
    		</ul>
    		
    		
		@endcol


		@col()
			<div class="p-3">
				@includeif('ajtarragona-web-components::docs.'.$page)
			</div>
		@endcol
	@endrow
	

@endsection



@section('css')
{{-- <link href="https://jmblog.github.io/color-themes-for-google-code-prettify/themes/github-v2.min.css"  rel="stylesheet"/> --}}
@endsection

@section('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=desert"></script> --}}
@endsection