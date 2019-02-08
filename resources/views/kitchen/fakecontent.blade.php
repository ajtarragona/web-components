<div class="d-flex justify-content-between">
  	<h5 class="mb-1 pr-3">{{ $faker->words(5,true) }}</h5>
  	<div>@badge(['pill'=>true]) {{ $faker->randomDigitNotNull }} days ago @endbadge</div>
</div>

<p class="my-2">{{ $faker->paragraph }}</p>
<small>{{ $faker->sentence }}</small>