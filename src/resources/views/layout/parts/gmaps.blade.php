{{-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script> --}}
{{-- <script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/OverlappingMarkerSpiderfier/1.0.3/oms.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('webcomponents.gmaps.api_key') }}&v=3.64&&libraries=places,geometry,drawing"  ></script>

{{-- Polyfill para soportar el drawingmanager de fmaps api que ha quedado deprecado --}}
{{-- <script src="https://cdn.jsdelivr.net/gh/mapchannels/mcx-drawing-polyfill@1.0.0/mcx-drawing-polyfill.js"></script> --}}


