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
@livewireStyles
@endsection

@section('pre-js')
	@include("ajtarragona-web-components::layout.parts.gmaps")
@endsection


@section('js')
	<script language="JavaScript">
		$(document).ready(function(e){
			$('.select-toggle').on('click',function(e){
				$($(this).data('for')).tgnTable('toggleSelectable');
				$(this).toggleClass('btn-light').toggleClass('btn-warning');
			});
			$('.select-all').on('click',function(e){
				$($(this).data('for')).tgnTable('selectAll');
			});
			$('.deselect-all').on('click',function(e){
				$($(this).data('for')).tgnTable('deselectAll');
			});
			
		});
		

		var successAjaxCallback = function (data, button){
			// al("successAjaxCallback");
			// al(data);
			// al(button);
			TgnFlash.success("Ok");
		}

		$('#prompt-button').on('click', function(e){
			TgnModal.prompt("Introdueix un valor", function(ret){
				al("ret",ret);
			});
			// var value=TgnModal.prompt("Holita?");
			// alert("retorn:"+value);
		});
		$('#confirm-button').on('click', function(e){
			TgnModal.confirm("N'estàs segur?", function(ret){
				al("ret",ret);
			});
			// var value=TgnModal.prompt("Holita?");
			// alert("retorn:"+value);
		});

		$('.chart-canvas').tgnChart();

		

	</script>
		<script>
			$(window).on('load',function(){
				
				$("#auto3,  #auto4").bind('tgnautocomplete:change',function(e,data){
					// al("selected");
					let val=data.element.tgnAutocomplete('valueview');
					al(val);
				});
				// $("#auto3").bind('tgnautocomplete:change',function(e,data){
				// 	al("changed");
				// 	al(data);
				// 	al(data.element.tgnAutocomplete('valueview'));
				// });
			});
		</script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
	<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=desert"></script> --}}

	@livewireScripts
@endsection