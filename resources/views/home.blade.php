@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
@endsection

@section('content')
    {{-- <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="col-12 mb-0 d-flex justify-content-around align-items-center"> --}}
    {{-- <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"> --}}
    {{-- <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div class="">
                        <h2 class="h6 text-gray-400">Customers</h2>
                        <h3 class="fw-extrabold mb-1">345,678</h3>
                    </div> --}}
    {{-- <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Customers</h2>
                                <h3 class="fw-extrabold mb-2">345k</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                Feb 1 - Apr 1,
                                <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                USA
                            </small>
                            <div class="small d-flex mt-1">
                                <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg><span class="text-success fw-bolder">22%</span></div>
                            </div>
                        </div> --}}
    {{-- </div>
            </div>
        </div>
    </div> --}}
    {{-- 
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="col-12 mb-0 d-flex justify-content-around align-items-center">
                    <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="">
                        <h2 class="h6 text-gray-400">Revenue</h2>
                        <h3 class="fw-extrabold mb-1">$43,594</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="col-12 mb-0 d-flex justify-content-around align-items-center">
                    <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="">
                        <h2 class="h6 text-gray-400">Menus</h2>
                        <h3 class="fw-extrabold mb-1">50</h3>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-around">
                <div>Pilih Hotel: </div>
                <div>
                    <button class="btn btn-primary" id="ibis">Ibis</button>
                    <button class="btn btn-primary" id="harmony">Harmony</button>
                    <button class="btn btn-primary" id="borneo">Borneo</button>
                </div>
            </div>
            <div class="card-body">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script type="text/javascript">
        const map = L.map('map').setView([-0.05545174198124447, 109.34945449188419], 12);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var manusia = L.icon({
            iconUrl: '{{ asset('iconMarkers/human.png') }}',
            iconSize: [50, 50],
        })

        var hotel = L.icon({
            iconUrl: '{{ asset('iconMarkers/hotel.png') }}',
            iconSize: [50, 50],
        })

        var anda = [-0.05545174198124447, 109.34945449188419]
        var ibis = [-0.042551524215812056, 109.3382589617696]
        var harmony = [-0.08846800866891248, 109.34718979062814]
        var borneo = [-0.021106985507102268, 109.32845668690855]

        var lokasiManusia = L.marker(anda, {
                icon: manusia,
                iconAnchor: [50, 25],
                draggable: true
            })
            .bindPopup('Lokasi Anda')
            .addTo(map);

        var hotelIbis = L.marker(ibis, {
                icon: hotel,
                iconAnchor: [50, 25],
                draggable: true
            })
            .bindPopup('Hotel Ibis Pontianak City Center')
            .addTo(map);

        var hotelHarmony = L.marker(harmony, {
                icon: hotel,
                iconAnchor: [50, 25],
                draggable: true
            })
            .bindPopup('Hotel Harmony In & Karaoke')
            .addTo(map);

        var hotelBorneo = L.marker(borneo, {
                icon: hotel,
                iconAnchor: [50, 25],
                draggable: true
            })
            .bindPopup('Hotel Borneo')
            .addTo(map);

        function cariIbis() {
            var route = L.Routing.control({
                waypoints: [
                    L.latLng(anda[0], anda[1]),
                    L.latLng(ibis[0], ibis[1])
                ]
            }).addTo(map);
            setTimeout(function() {
                window.location.reload();
            }, 5000);
        }

        function cariHarmony() {
            var route = L.Routing.control({
                waypoints: [
                    L.latLng(anda[0], anda[1]),
                    L.latLng(harmony[0], harmony[1])
                ]
            }).addTo(map);
            setTimeout(function() {
                window.location.reload();
            }, 5000);
        }

        function cariBorneo() {
            var route = L.Routing.control({
                waypoints: [
                    L.latLng(anda[0], anda[1]),
                    L.latLng(borneo[0], borneo[1])
                ]
            }).addTo(map);
            setTimeout(function() {
                window.location.reload();
            }, 5000);
        }

        document.getElementById("ibis").addEventListener("click", cariIbis);
        document.getElementById("harmony").addEventListener("click", cariHarmony);
        document.getElementById("borneo").addEventListener("click", cariBorneo);
        //var route = L.Routing.control({
        //  waypoints: [
        //    L.latLng(-0.05545174198124447, 109.34945449188419),
        //  L.latLng(-0.042551524215812056, 109.3382589617696)
        //]
        //}).addTo(map);
    </script>
@endpush
