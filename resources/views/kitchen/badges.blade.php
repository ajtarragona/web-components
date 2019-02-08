<section id="kitchen-badges" class="py-5">
	<hr />
			
	<h2>Badges</h2>
	@row
		@col(['size'=>8])
			@badge
				@icon('tag') Primary
			@endbadge

			@badge(['type'=>'secondary'])
				Secondary
			@endbadge

			@badge(['type'=>'danger','icon'=>'exclamation'])
				Danger
			@endbadge

			@badge(['type'=>'info'])
				Info
			@endbadge

			@badge(['type'=>'warning'])
				Warning
			@endbadge

			@badge(['type'=>'success','icon'=>'check','iconalign'=>'right'])
				Success
			@endbadge


			@badge(['href'=>route('webcomponents.kitchen'),'type'=>'light'])
				Light Linked
			@endbadge

			@badge(['type'=>'dark','pill'=>true,'href'=>route('webcomponents.kitchen'),'icon'=>'plus','iconalign'=>'right','iconcolor'=>'warning'])
				Dark Pill
			@endbadge
		@endcol
	@endrow
</section>