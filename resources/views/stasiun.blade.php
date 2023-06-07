@extends("layouts.landing_layout")
@section("landing-stasiun", "border-warning")

@section('menu')
<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
{{-- <li><a class="nav-link scrollto" href="#about">About</a></li> --}}
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="section-title">
                <h2>Penyebaran Stasiun Kendaraan Listrik</h2>
                <p>Maps SPKLU & SPBKLU</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div id='maps' style="height: 600px; position: relative; overflow: hidden;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://googlemaps.github.io/js-markerclustererplus/dist/index.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js" integrity="sha512-XBxUMC4YQcL60PavAScyma2iviXkiWNS5Yf+A0LZRWI1PNiGHkp66yPQxHWDSlv6ksonLAL2QMrUlCKq4NHhSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('assets/js/geolocation-marker.js') }}"></script>

    <script>
        var map ;
        var arrayDataMarker = [];
        var arrayMarkerCluster = [];
        var markerClusterer ;
        $( document ).ready(function() {
            const styles = {
                default: [],
                hide: [
                    {
                        featureType: "poi.business",
                        stylers: [{ visibility: "off" }],
                    },
                    {
                        featureType: "transit",
                        elementType: "labels.icon",
                        stylers: [{ visibility: "off" }],
                    },
                ],
            };
            map = new google.maps.Map(document.getElementById('maps'), {
                center: {
                    lat: -7.435261,
                    lng: 109.695589,
                },
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
            });

            map.setOptions({ styles: styles["hide"] });

            @foreach($dataMaps as $stasiun)
                <?php
                    $content =
                    '<div class="p-3">'.
                        '<div class="row">'.
                            '<div class="col-4 mb-3 col-lg-3 text-start"><strong>Stasiun</strong></div>'.
                            '<div class="col-8 mb-3 col-lg-9 text-start">'. str_replace("\n","",$stasiun->nama_stasiun) .'</div>'.
                        '</div>'.
                        '<div class="row">'.
                            '<div class="col-4 mb-3 col-lg-3 text-start"><strong>Alamat</strong></div>'.
                            '<div class="col-8 mb-3 col-lg-9 text-start">'. str_replace("\n","",$stasiun->alamat_stasiun) .'</div>'.
                        '</div>'.
                        '<div class="row">'.
                            '<div class="col-4 mb-3 col-lg-3 text-start"><strong>Fasilitas</strong></div>'.
                            '<div class="col-8 mb-3 col-lg-9 text-start">'. str_replace("\n","",$stasiun->fasilitas) .'</div>'.
                        '</div>'.
                    '</div>';
                ?>
                @if(is_numeric($stasiun->latitude) == 1 && is_numeric($stasiun->longitude))
                var icon{{ $stasiun->id }} = {
                        @if(!empty($stasiun->logo_stasiun))
                            url: "{{asset($stasiun->logo_stasiun)}}",
                        @else
                            url: "{{url( 'images/lighting.png' ) }}",
                        @endif
                        scaledSize: new google.maps.Size(25, 25),
                        origin: new google.maps.Point(0,0),
                        anchor: new google.maps.Point(0, 0)
                    };
                    var stasiunMarker{{ $stasiun->id }} =  new google.maps.Marker({
                    position: { lat: {{ $stasiun->latitude}}, lng: {{$stasiun->longitude}} },
                    map,
                    title : '{{ $stasiun->nama_stasiun }}',
                    @if(!empty($stasiun->logo_stasiun))
                        icon: icon{{ $stasiun->id }}
                    @endif
                    });

                    arrayDataMarker.push({
                        marker : stasiunMarker{{ $stasiun->id }},
                        kotaName : 'NAMA KOTA',
                        kotaId : '{{ $stasiun->kota_id }}',
                        namastasiun : '{{ $stasiun->nama_stasiun }}',
                    });
                    stasiunMarker{{ $stasiun->id }}.addListener('click', function() {
                        var infoWindowstasiun{{ $stasiun->id }} = new google.maps.InfoWindow({
                        content: '<?=$content;?>'
                        });
                        infoWindowstasiun{{ $stasiun->id }}.open(map, stasiunMarker{{ $stasiun->id }});
                    });

                    arrayMarkerCluster.push(  stasiunMarker{{ $stasiun->id }} );
                    var icon{{ $stasiun->id }} = {
                    @if(!empty($stasiun->logo_stasiun))
                        url: "{{asset($stasiun->logo_stasiun)}}",
                    @else
                        url: "{{url( 'images/lighting.png' ) }}",
                    @endif
                    scaledSize: new google.maps.Size(25, 25),
                    origin: new google.maps.Point(0,0),
                    anchor: new google.maps.Point(0, 0)
                };
                @endif
            @endforeach

            markerClusterer = new MarkerClusterer(map, arrayMarkerCluster, {
                maxZoom: 18,
                gridSize: 10,
                styles: [
                    MarkerClusterer.withDefaultStyle({
                        width: 50,
                        height: 50,
                        textColor: "#000000",
                        textSize: 10,
                    })
                ],
                clusterClass:  "custom-clustericon" ,
            });

            new MarkerClusterer({ arrayMarkerCluster, map });
        });
    </script>

@endpush