@extends('ajtarragona-web-components::layout/master')

@section('title')
	@lang('TGN Web Components Docs')
@endsection

@section('body')
	

	@row(['class'=>''])
	
		@col(['size'=>2,'class'=>'docs-sidebar','style'=>''])
			<h1 ><a class="doc-link" href="{{ route('webcomponents.docs',['page'=>'start.introduction']) }}">TGN</a></h1>
			<hr/>
		
			@includeif('ajtarragona-web-components::docs.mainmenu')
    		
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