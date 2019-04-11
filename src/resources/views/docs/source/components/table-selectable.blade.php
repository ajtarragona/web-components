
<table class="table" data-selectable="true">
	<thead>
		<tr>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach(range(1, 10) as $i) 
			<tr>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<h4>Amb checkbox</h4>
<table class="table" data-selectable="true" data-select-style="info">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach(range(1, 10) as $i) 
			<tr>
				<td>@checkbox()</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>



<h4>Individual</h4>
<table class="table" data-selectable="true" data-select-single="true"  data-select-style="primary">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
			<th>{{ $faker->word }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach(range(1, 10) as $i) 
			<tr>
				<td>@radio(['name'=>'demoradio'])</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>