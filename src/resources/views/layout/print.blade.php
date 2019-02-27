<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	
	<style>
		@php 
			include public_path('css/print.css');
		@endphp
		
		@yield('css')

	</style>

</head>


<body>
	<header >
		<table class="fullwidth">
			<tbody>
				<tr>
					<td>
						<img src="{{ public_path('images/logos/logo_2x.jpg') }}" width="200"/>
					</td>
					<td class="text-right">
						<h4>@yield('title')</h4>
						<h5 class="text-gray-600">@yield('subtitle')</h5>
					</td>
				</tr>
			</tbody>
		</table>
	</header>

	<footer>
		<div class="content">
			@yield('footer') 
		</div>
		{{-- <div class="page-number">
			@lang("Page") <span  class="pagenum"></span>
		</div> --}}
	
		<script type="text/php">
			 $font = $fontMetrics->get_font("sans-serif", "normal");
             $size = 9;
             $pageText = "@lang("Page") " . $PAGE_NUM . " de " . $PAGE_COUNT;
             $y = 750;
             $x = 515;
             $pdf->text($x, $y, $pageText, $font, $size);
		</script>
	</footer>

	<main>
		@yield('body')
	</main>
			
</body>