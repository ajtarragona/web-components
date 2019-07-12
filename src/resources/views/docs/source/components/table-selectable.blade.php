<button class="btn btn-sm btn-light select-toggle" data-for="#tablesel1">Enable/Disable</button>
<button class="btn btn-sm btn-light select-all" data-for="#tablesel1">Select all</button>
<button  class="btn btn-sm btn-light deselect-all" data-for="#tablesel1">Deselect all</button>

<table class="table" data-selectable="true" id="tablesel1">
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

<button class="btn btn-sm btn-light select-toggle" data-for="#tablesel2">Enable/Disable</button>
<button class="btn btn-sm btn-light select-all" data-for="#tablesel2">Select all</button>
<button  class="btn btn-sm btn-light deselect-all" data-for="#tablesel2">Deselect all</button>

<table class="table" data-selectable="true" data-select-style="info" id="tablesel2">
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
				<td>@checkbox(['class'=>'row-selector'])</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>





<h4>Individual</h4>
<button class="btn btn-sm btn-light select-toggle" data-for="#tablesel3">Enable/Disable</button>


<table class="table" data-selectable="true" data-select-single="true"  data-select-style="primary" id="tablesel3">
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
				<td>@radio(['class'=>'row-selector','name'=>'demoradio'])</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
				<td>{{ $faker->words(2,true) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>