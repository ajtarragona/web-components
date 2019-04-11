<table class="table table-bordered table-sm mt-3" >
	<tbody>
		@foreach($request as $name=>$value)
		<tr>
			<th>{{ $name}}</th>
			<td>{!! $value !!}</td>
		</tr>
		@endforeach
	</tbody>
</table>