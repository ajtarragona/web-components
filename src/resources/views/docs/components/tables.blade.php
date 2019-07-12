<h1 class="display-4">Tablas</h1>
<p class="lead">
	Podem crear taules Bootstrap 
</p>
<p><a href="https://getbootstrap.com/docs/4.3/content/tables/" target="_blank">@icon('external-link-alt')  Documentació sobre taules Bootstrap</a></p>

<hr class="big"/>

<h2>Taules ordenables</h2>
<p><code><a href="https://github.com/Kyslik/column-sortable" target="_blanl">kyslik/column-sortable</a></code></p>


<p>Para que se vean bien los iconos, hay que publicar configuración:</p>
@code
php artisan vendor:publish --provider="Kyslik\ColumnSortable\ColumnSortableServiceProvider" --tag="config"
@endcode

<p>y modificar los prefijos en el archivo <code>config/columnsortable.php</code>:</p>
@code
'asc_suffix'                    => '-down',
'desc_suffix'                   => '-up',                 
@endcode


<hr class="big"/>


<h2>Taules seleccionables</h2>
@row
	@col(['size'=>6])

	
		@includeIf('ajtarragona-web-components::docs.source.components.table-selectable')

	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.table-selectable')
		@endcode
		
	@endcol
@endrow


<h2>Taules clicables</h2>
@row
	@col(['size'=>6])
		@includeIf('ajtarragona-web-components::docs.source.components.table-clickable')

	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.table-clickable')
		@endcode
		
	@endcol
@endrow


<h2>Taules ajax</h2>

{{-- <section id="kitchen-tables" class="py-5">
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
		
</section> --}}