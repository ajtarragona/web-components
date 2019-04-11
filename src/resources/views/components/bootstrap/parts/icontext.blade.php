 @isset($icon)
   @php 
      $iconright=isset($iconalign) && $iconalign=="right";
   @endphp  
   <div class="d-flex justify-content-{{ $iconright?'between':'start' }}">
    
    @if(!$iconright)
        <div class="pr-2"> @icon($icon,['color'=>(isset($iconcolor)?$iconcolor:false)]) </div>
    @endif
    
    <div>{{ $slot }}</div>
    
    @if($iconright)
        <div class="pl-2"> @icon($icon,['color'=>(isset($iconcolor)?$iconcolor:false)]) </div>
    @endif

   </div>
   
@else
{{ $slot }}
@endif