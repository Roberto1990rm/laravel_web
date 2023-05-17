@isset($claseCard)
    <div class="{{ $claseCard }}">
@else
    <div class="col-sm-9">  
@endisset

<div class="row d-flex justify-content-center w-100 m-0">
    <div class="col-xs-12 col-sm-6">
        <div class="card mb-4 w-100">
            @isset($map)
            <div id="map" class="card-img-top" style="height:250px"></div>
            @else
            @isset($urlImg)
            <img src="{{ $urlImg }}" alt="{{ $name }}">
            @endisset
            @endisset

            <div class="card-body">
                <h5 class="card-title">{{ $name }}</h5>
                <p class="card-title">{{ $place }}</p>
            </div>
        </div>

        @isset($urlBack)
        <div class="text-center">
            <a href="{{ $urlBack }}" class="btn btn-primary">Volver</a>
        </div>
        @endisset   

        @isset($map)
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
                integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
                crossorigin=""></script>

        <script>
            var map = L.map('map').setView([40.4340993,-3.8312219,13.39], 13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
        </script>
        @endisset
    </div>
</div>
