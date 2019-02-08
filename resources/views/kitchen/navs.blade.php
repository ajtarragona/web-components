<section id="kitchen-navs" class="py-5">
	<hr />
	@row
		@col(['size'=>6])
			<h2>Navs</h2>

			<div class="mb-3">
				<h5>Drilldown</h5>
				@card(['withbody'=>false,'class'=>'mb-3'])
					
					@nav([
						'navigation' => 'drilldown',
						'fullwidth' => true,
						'items' => [
							[
								'title' => 'Item 1'  ,
								'icon' => 'home',
								'url' => '#',
								'active ' => true,
								'showif' => false
							],
							[
								'title' => 'Item 2'  ,
								'icon' => 'star',
								'url' => '#',
								'children' => [
									[
										'title' => 'Subifds ff tem 2.1'  ,
										'url' => '#'
									],
									[
										'title' => 'Subitem 2.2'  ,
										'url' => '#',
										'children' => [
											[
												'title' => 'Subitemfdf fd fds fds 2.2.1'  ,
												'url' => '#'
											],
											[
												'title' => 'Subitem 2.2.2'  ,
												'url' => '#'
											]
										]
									],
									[
										'title' => 'Subitem 2.3'  ,
										'url' => '#'
									]
								]
							],
							[
								'title' => 'Item 3'  ,
								'icon' => 'file',
								'url' => '#',
							],
							[
								'title' => 'Item 4'  ,
								'icon' => 'check',
								'children' => [
									[
										'title' => 'Subitem 4.1'  ,
										'url' => '#'
									],
									[
										'title' => 'Subitem 4.2'  ,
										'url' => '#'
									]
								]
							]
						]
					])
				@endcard
			</div>


			<div class="mb-3">
				<h5>Dropdown</h5>

				@card(['withbody'=>false,'type'=>'success','class'=>'mb-3'])
					
					@nav([
						'navigation' => 'dropdown',
						'fullwidth' => true,
						'class' => 'nav-dark ',
						'items' => [
							[
								'title' => 'Item 1'  ,
								'icon' => 'home',
								'url' => '#',
								'active ' => true,
								'showif' => false
							],
							[
								'title' => 'Item 2'  ,
								'icon' => 'star',
								'url' => '#',
								'children' => [
									[
										'title' => 'Subifds ff tem 2.1'  ,
										'url' => '#'
									],
									[
										'title' => 'Subitem 2.2'  ,
										'url' => '#',
										'children' => [
											[
												'title' => 'Subitemfdf fd fds fds 2.2.1'  ,
												'url' => '#'
											],
											[
												'title' => 'Subitem 2.2.2'  ,
												'url' => '#'
											]
										]
									],
									[
										'title' => 'Subitem 2.3'  ,
										'url' => '#'
									]
								]
							],
							[
								'title' => 'Item 3'  ,
								'icon' => 'file',
								'url' => '#',
							],
							[
								'title' => 'Item 4'  ,
								'icon' => 'check',
								'children' => [
									[
										'title' => 'Subitem 4.1'  ,
										'url' => '#'
									],
									[
										'title' => 'Subitem 4.2'  ,
										'url' => '#'
									]
								]
							]
						]
					])
				@endcard
			</div>
			<div class="mb-3">
			<h5>Collapse</h5>

				@card(['withbody'=>false,'type'=>'danger','class'=>'mb-3'])
					
					@nav([
						'navigation' => 'collapse',
						'fullwidth' => true,
						'class' => 'nav-dark ',
						'items' => [
							[
								'title' => 'Item 1'  ,
								'icon' => 'home',
								'url' => '#',
								'active ' => true,
								'showif' => false
							],
							[
								'title' => 'Item 2'  ,
								'icon' => 'star',
								'url' => '#',
								'children' => [
									[
										'title' => 'Subifds ff tem 2.1'  ,
										'url' => '#'
									],
									[
										'title' => 'Subitem 2.2'  ,
										'url' => '#',
										'children' => [
											[
												'title' => 'Subitemfdf fd fds fds 2.2.1'  ,
												'url' => '#'
											],
											[
												'title' => 'Subitem 2.2.2'  ,
												'url' => '#'
											]
										]
									],
									[
										'title' => 'Subitem 2.3'  ,
										'url' => '#'
									]
								]
							],
							[
								'title' => 'Item 3'  ,
								'icon' => 'file',
								'url' => '#',
							],
							[
								'title' => 'Item 4'  ,
								'icon' => 'check',
								'children' => [
									[
										'title' => 'Subitem 4.1'  ,
										'url' => '#'
									],
									[
										'title' => 'Subitem 4.2'  ,
										'url' => '#'
									]
								]
							]
						]
					])
				@endcard
			</div>
		@endcol
	@endrow
</section>