
<table class="table table-hover" data-clickable="true" data-clicktype="click" data-control-click="true">
	<thead>
		<tr>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach(range(1, 10) as $i) 
			<tr data-url="http://www.google.com">
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>