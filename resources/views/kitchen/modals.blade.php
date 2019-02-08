<section id="kitchen-modals" class="py-5">
	<hr />
	@row
		@col(['size'=>6])
			<h2>Modals</h2>

			<a href="{{ route('webcomponents.kitchen.modal') }}" class="btn btn-primary tgn-modal-opener">@lang("Open Modal") @icon("external-link-square-alt") </a>
			<a href="{{ route('webcomponents.kitchen.modal') }}" class="btn btn-success tgn-modal-opener" data-animate="false" data-style="success" data-size="lg" data-valign="center">@lang("Open Modal") @icon("external-link-alt") </a>
			<a href="unexisting" class="btn btn-danger tgn-modal-opener">@lang("Open Error")</a>
		@endcol
	@endrow
</section>