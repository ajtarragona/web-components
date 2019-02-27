@if ($errors->any())
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
	    <ul class="list-unstyled mb-0">
	        @foreach($errors->all() as $error)
	        	<li>{!! $error !!} </li>
	        @endforeach
	    </ul>
	</div>
@endif