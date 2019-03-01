@extends('ajtarragona-web-components::layout/master')

@section('title')
	@lang('TGN Web Components Docs')
@endsection

@section('body')
	
	
	@row(['class'=>''])
	
		@col(['size'=>3,'class'=>'docs-sidebar','style'=>''])
			<h1 >TGN Web components</h1>
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
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'layout.grid','title'=>'Grid'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'layout.blocs','title'=>'Blocs'])
						
						
					</ul>
				</li>
    			<li class="{{ starts_with($page,'components')?'active':'' }}">
					<a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'components.alerts']) }}">
			        	Components
					</a>

					<ul>
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.alerts','title'=>'Alerts'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.badges','title'=>'Badges'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.icons','title'=>'Icons'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.lists','title'=>'Lists'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.tables','title'=>'Tables'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.cards','title'=>'Cards'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.buttons','title'=>'Buttons'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.forms','title'=>'Forms'])
						@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.modals','title'=>'Modals'])

					</ul>
			    </li>
    		</ul>

			
		@endcol


		@col(['size'=>9,'class'=>''])
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