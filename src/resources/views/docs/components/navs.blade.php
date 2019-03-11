<section id="demo-navs" class="py-5">
	<hr />
	@row
		@col(['size'=>6])
			<h2>Navs</h2>

			<div class="mb-3">
				<h5>Drilldown</h5>
				@card(['withbody'=>false,'class'=>'mb-3'])
					
					
					@nav([
							'items' => [
							[
								'title' => 'Item 1'  ,
								'icon' => 'home',
								'url' => 'http://www.google.com',
								'active ' => true,
								'visible' => false
							],
							[
								'title' => 'Item 2'  ,
								'icon' => 'star',
								'iconoptions' =>[
									'position' => 'top',
									'color' => 'success',
									'bg-color'=>'primary',
									'circle'=>true
								],
								'url' => '',
								'children' => [
									[
										'title' => 'Subifds ff tem 2.1'  ,
										'url' => ''
									],
									[
										'title' => 'Subitem 2.2'  ,
										'url' => '',
										'children' => [
											[
												'title' => 'Subitemfdf fd fds fds 2.2.1'  ,
												'url' => ''
											],
											[
												'title' => 'Subitem 2.2.2'  ,
												'url' => ''
											]
										]
									],
									[
										'title' => 'Subitem 2.3'  ,
										'url' => ''
									]
								]
							],
							[
								'title' => 'Item 3'  ,
								'icon' => 'file',
								'url' => '',
							],
							[
								'title' => 'Item 4'  ,
								'icon' => 'check',
								'children' => [
									[
										'title' => 'Subitem 4.1'  ,
										'url' => ''
									],
									[
										'title' => 'Subitem 4.2'  ,
										'url' => ''
									]
								]
							]
						],
						'navigation' => 'drilldown',
						'fullwidth' => true
						
					])

					

				@endcard
			</div>


			<div class="mb-3">
				<h5>Dropdown</h5>

				@card(['withbody'=>false,'type'=>'success','class'=>'mb-3'])
					
					@nav([
							'items' => [
							[
								'title' => 'Item 1'  ,
								'icon' => 'home',
								'url' => 'http://www.google.com',
								'active ' => true,
								'visible' => false
							],
							[
								'title' => 'Item 2'  ,
								'icon' => 'star',
								'url' => '',
								'children' => [
									[
										'title' => 'Subifds ff tem 2.1'  ,
										'url' => ''
									],
									[
										'title' => 'Subitem 2.2'  ,
										'url' => '#',
										'children' => [
											[
												'title' => 'Subitemfdf fd fds fds 2.2.1'  ,
												'url' => ''
											],
											[
												'title' => 'Subitem 2.2.2'  ,
												'url' => ''
											]
										]
									],
									[
										'title' => 'Subitem 2.3'  ,
										'url' => ''
									]
								]
							],
							[
								'title' => 'Item 3'  ,
								'icon' => 'file',
								'url' => '',
							],
							[
								'title' => 'Item 4'  ,
								'icon' => 'check',
								'children' => [
									[
										'title' => 'Subitem 4.1'  ,
										'url' => ''
									],
									[
										'title' => 'Subitem 4.2'  ,
										'url' => ''
									]
								]
							]
						],
						'navigation' => 'dropdown',
						'fullwidth' => true,
						'class' => 'nav-dark ',
						
					])



				@endcard
			</div>
			<div class="mb-3">
			<h5>Collapse</h5>

				@card(['withbody'=>false,'type'=>'danger','class'=>'mb-3'])
					
					
					@nav([
							'items' => [
							[
								'title' => 'Item 1'  ,
								'icon' => 'home',
								'url' => 'http://www.google.com',
								'active ' => true,
								'visible' => false
							],
							[
								'title' => 'Item 2'  ,
								'icon' => 'star',
								'url' => '',
								'children' => [
									[
										'title' => 'Subifds ff tem 2.1'  ,
										'url' => ''
									],
									[
										'title' => 'Subitem 2.2'  ,
										'url' => '',
										'children' => [
											[
												'title' => 'Subitemfdf fd fds fds 2.2.1'  ,
												'url' => ''
											],
											[
												'title' => 'Subitem 2.2.2'  ,
												'url' => ''
											]
										]
									],
									[
										'title' => 'Subitem 2.3'  ,
										'url' => ''
									]
								]
							],
							[
								'title' => 'Item 3'  ,
								'icon' => 'file',
								'url' => '',
							],
							[
								'title' => 'Item 4'  ,
								'icon' => 'check',
								'children' => [
									[
										'title' => 'Subitem 4.1'  ,
										'url' => ''
									],
									[
										'title' => 'Subitem 4.2'  ,
										'url' => ''
									]
								]
							]
						],
						'navigation' => 'collapse',
						'fullwidth' => true,
						'class' => 'nav-dark ',
						''
						
					])


					
				@endcard
			</div>
		@endcol
	@endrow
</section>