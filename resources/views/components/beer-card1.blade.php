
    
    
    <div id="beer-container">
    <div class="card h-100">
        <img src="{{ $beer->imagen ? url('storage/' . $beer->imagen) : asset('img/default-beer.jpg') }}" class="card-img-top" alt="{{ $beer->nombre }}">
        <div class="card-body">
            <h5 class="card-title mb-2" style="color:brown";><b>{{ $beer->nombre }}</b></h5>
            <p class="card-text mb-2"><i>{{ $beer->marca }}</i></p>
            <div class="description-box">
                <p class="card-text">{{ $beer->descripcion }}</p>
            </div>
        </div>
        <div class="card-footer d-flex flex-column align-items-center justify-content-center">
            <div class="place mt-2 mb-2 ms-2 me-2 text-center">
                @php
                    $beerCount = 10;
                    $vol = $beer->vol;
                    $wholeLogos = floor($vol); // Número de logos enteros
                    $partialLogo = $vol - $wholeLogos; // Porción del último logo
                @endphp
                
                @for ($i = 1; $i <= $beerCount; $i++)
                    @if ($i <= $wholeLogos)
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 20px; height: 20px; margin-right: 3px;">
                    @elseif ($i == $wholeLogos + 1 && $partialLogo > 0) 
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 20px; height: 20px; margin-right: 0; clip-path: inset({{ 20 - $partialLogo * 20 }}px 0 0 0);">
                    @else 
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 20px; height: 20px; margin-right: 3px; opacity: 0.4;">
                    @endif
                @endfor
            </div>
        </div>
        <div class="card-footer d-flex flex-column align-items-center justify-content-center">
            <b>{{ $beer->vol }}°</b>
            <a href="{{ route('beers.show', $beer) }}" class="btn btn-primary mt-4">Ver más</a>
        </div>
    </div>
</div>

