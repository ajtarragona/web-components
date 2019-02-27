<section id="kitchen-tables" class="py-5">
	<hr />
	<h2>Tables</h2>

	<table class="table table-response ">
		<thead>
			<tr>
				<th>@sortablelink('id',__('ID'))</th>
				<th>@sortablelink('name',__('Name'))</th>
				<th>@sortablelink('description',__('Description'))</th>
				<th>@sortablelink('active',__('Active'))</th>

			</tr>
		</thead>
		<tbody>
			@foreach($collection as $table1)
				<tr>
					<td data-title="@lang('ID')">{{ $table1->id }}</td>
					<td data-title="@lang('Name')"><a href="{{ route('table1.show',[$table1->id]) }} "> {{ $table1->name}}</a></td>
					<td data-title="@lang('Description')">{{ $table1->description}}</td>
					
					<td data-title="@lang('Active')" data-sort="{{ $table1->active?'1':'0' }}">
						@if($table1->active) 
							@icon('check-circle',['class'=>'text-success']) 
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<hr/>
	
	@row
		@col(['size'=>6])
			<h6 >Default pagination</h6>
			<div class="card">
				@pagination(['collection'=>$collection]) 
			</div>
		@endcol
		
		@col(['size'=>6])
			<h6>Simple pagination</h6>
			<div class="card">
				@pagination(['collection'=>$collection,'type'=>'simple']) 
			</div>
		@endcol
	@endrow


	@row(['class'=>"mt-3"])
		@col(['size'=>3])
			<h6 >Left</h6>
			<div class="card">
				@pagination(['collection'=>$collection,'align'=>'left']) 
			</div>
		@endcol
		
		@col(['size'=>3])
			<h6>Center</h6>
			<div class="card">
				@pagination(['collection'=>$collection,'align'=>'center']) 
			</div>
		@endcol
		
		@col(['size'=>3])
			<h6>Right</h6>
			<div class="card">
				@pagination(['collection'=>$collection,'align'=>'right']) 
			</div>
		@endcol
		
		@col(['size'=>3])
			<h6>Justified</h6>
			<div class="card">
				@pagination(['collection'=>$collection,'align'=>'justify']) 
			</div>
		@endcol
	@endrow
		
</section>