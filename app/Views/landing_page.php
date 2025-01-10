<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?= $_ENV['APP_SHORT_TITLE'] ?></title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link href="<?= base_url() ?>assets/img/<?= $_ENV['APP_LOGO'] ?>" rel="icon" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700|Montserrat:700|Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/landing-page.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/4.0.0/leaflet-search.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/datatables/responsive.dataTables.min.css" />

    <style>
        /* Custom icon for Leaflet Search button */
        .leaflet-control-search .search-button::before {
            content: "\f002";
            /* FontAwesome search icon */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 18px;
            /* Adjust icon size */
            color: #333;
            /* Adjust icon color */
        }

        .leaflet-control-search .search-button {
            background: none;
            /* Remove default background */
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body style="background-image: url(<?= base_url('assets/img/62cb5a4d8f1de-terasering-soka-tabanan_olret.jpg') ?>); background-size: cover">

    <div class="container-fluid" style="height: 100vh; overflow: auto;">

        <!-- Tombol Login -->
        <?php if ($_ENV["BUTTON_LOGIN"] == 1) : ?>
            <a class="corner-link" href="<?= base_url('/login') ?>">Login</a>
        <?php endif; ?>

        <?php $totalKomoditas = 0; ?>

        <div class="header">
            <h1><?= $_ENV['APP_TITLE'] ?></h1>
            <h2><?= $_ENV['APP_CUSTOMER'] ?></h2>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">

                    <script>
                        let productivitas = [];
                        let produksi = [];
                        let namaKecamatanTanam = [];
                        let namaKecamatanPanen = [];
                    </script>

                    <?php foreach ($productivitas as $item) : ?>
                        <script>
                            productivitas.push(<?= $item ?>)
                        </script>
                    <?php endforeach; ?>

                    <?php foreach ($namaKecamatanTanam as $item) : ?>
                        <script>
                            namaKecamatanTanam.push("<?= $item ?>")
                        </script>
                    <?php endforeach; ?>

                    <?php foreach ($produksi as $item) : ?>
                        <script>
                            produksi.push("<?= $item ?>")
                        </script>
                    <?php endforeach; ?>

                    <?php foreach ($namaKecamatanPanen as $item) : ?>
                        <script>
                            namaKecamatanPanen.push("<?= $item ?>")
                        </script>
                    <?php endforeach; ?>

                    <!-- Pie Chart -->
                    <div class="col-md-6 col-sm-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Produktivitas Bulan Ini (Ku/Ha)</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-md-6 col-sm-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Produksi Bulan Ini (Ton)</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card bg-transparent border-0 d-flex align-items-center mt-3">
                    <div class="card-body" style="width: 100%; border-radius: 10px; background-color: rgba(255, 255, 255, 0.7);">

                        <div class="row justify-content-center align-content-center">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="card-title">Cari Data</div>
                                <div class="input-group mb-3">
                                    <input id="search-input" type="text" class="form-control" placeholder="Cari...">
                                    <button id="search-button" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="card-title">Filter</div>
                                <div class="input-group mb-3">
                                    <select id="filter-select" class="form-select">
                                        <option value="0">Semua</option>
                                        <?php foreach ($komoditas as $k) : ?>
                                            <?php $totalKomoditas += 1; ?>
                                            <option value="<?= $k['id_komoditas'] ?>"><?= $k['nama_komoditas'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button id="filter-button" class="btn btn-outline-secondary" type="button">Filter</button>
                                </div>
                            </div>
                        </div>

                        <div id="container-keterangan">

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 mb-3">
                <div class="card bg-transparent border-0">
                    <div class="card-body d-flex justify-content-center">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 mb-3">
                <table class="table table-hover" id="datatable" style="width: 100%">
                    <thead>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Handphone</th>
                        <th>Jenis Komoditas</th>
                        <th>Hasil</th>
                        <th>Luas</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>


        </div>

        <div class="footer bg-white">
            <?= $_ENV['APP_SHORT_TITLE'] ?> @<?= date('Y') ?>
        </div>

    </div>

    <!-- Peta -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/4.0.0/leaflet-search.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.responsive.min.js"></script>

    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Custom Script -->
    <script>
        let keyword = 'all';
        let id_komoditas = '0';
        let colors = [];
        let datatable;
        let polygons = [];

        const map = L.map('map').setView([-3.648177, 119.610870], 15);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Satelite Layer
        googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        googleSat.addTo(map);

        var baseLayers = {
            "Map View": tiles,
            "Satellite View": googleSat,
        };

        L.control.layers(baseLayers).addTo(map);

        const leafletPolygon = () => {

            $.ajax({
                url: '<?= base_url('lahan/getAllAjax') ?>',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    var markersLayer = new L.LayerGroup();

                    // Layer for search
                    map.addLayer(markersLayer);

                    $.each(response["data"], function(key, value) {
                        console.log(value.nama_lengkap, value.handphone, value.luas, value.lokasi)

                        $.ajax({
                            url: '<?= base_url('koordinat/getKoordinatLahan') ?>',
                            type: 'POST',
                            data: {
                                id_lahan: value.id_lahan
                            },
                            dataType: 'json',
                            success: function(coords) {
                                // Create a polygon with the coordinates and add it to the map
                                var polygon = L.polygon(coords, {
                                    color: "blue"
                                }).addTo(map);

                                

                                // Bind a popup to the polygon with the desired data
                                var popupContent = "<b>Nama:</b> " + value.nama_lengkap + "<br>" +
                                    "<b>Handphone:</b> " + value.handphone + "<br>" +
                                    "<b>Luas:</b> " + value.luas + " m2<br>" +
                                    "<b>Lokasi:</b> " + value.lokasi;

                                polygon.bindPopup(popupContent);

                                // Add the polygon to the search layer with its corresponding property
                                polygon.feature = {
                                    properties: {
                                        name: value.nama_lengkap
                                    }
                                };
                                markersLayer.addLayer(polygon);
                            }

                            
                        });
                    });
                    
                    // Add search control to the map
                    var searchControl = new L.Control.Search({
                        layer: markersLayer,
                        propertyName: 'name',
                        marker: false,
                        moveToLocation: function(latlng, title, map) {
                            // Move the map to the polygon
                            map.setView(latlng, 15);
                            latlng.layer.openPopup();
                        }
                    });

                    searchControl.addTo(map);
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }

        const getRandomColor = () => {

            // Generate a random hexadecimal color code
            let letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        const removeAllPolygons = () => {
            polygons.forEach(function(polygon) {
                map.removeLayer(polygon);
            });

            // Kosongkan array setelah semua polygon dihapus
            polygons = [];
        }

        const populateDatatable = (keyword, id_komoditas) => {
            $("#container-keterangan").empty();
            $("#container-keterangan").append(`
                <div class="card-title">Keterangan: </div>
                <div class="input-group mb-3 align-items-center">
                    <div style="width: 10px; height: 10px; background-color: red"></div>
                    &nbsp;
                    Kecamatan
                </div>
            `);

            removeAllPolygons();

            $('#datatable').DataTable().destroy();

            datatable = $("#datatable").DataTable({
                searching: false,
                info: false,
                paging: false,
                scrollX: true,
                scrollY: 400,
                scrollCollapse: true,
                processing: true,
                destroy: true,
                ajax: {
                    url: '<?= base_url('getAllAjax') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        keyword: keyword,
                        id_komoditas: id_komoditas
                    }
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nama_lengkap'
                    },
                    {
                        data: 'handphone'
                    },
                    {
                        data: 'nama_komoditas'
                    },
                    {
                        data: 'total_penghasilan',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
                    },
                    {
                        data: 'luas'
                    },
                    {
                        data: 'lokasi'
                    },
                    {
                        data: 'nama_jenis_kepemilikan'
                    }
                ],
                initComplete: function() {
                    let data = datatable.rows().data().toArray();;

                    var markersLayer = new L.LayerGroup();

                    // Layer for search
                    map.addLayer(markersLayer);

                    $.each(data, function(key, value) {
                        // console.log(value.nama_lengkap, value.handphone, value.luas, value.lokasi)

                        $.ajax({
                            url: '<?= base_url('koordinat/getKoordinatLahan') ?>',
                            type: 'POST',
                            data: {
                                id_lahan: value.id_lahan
                            },
                            dataType: 'json',
                            success: function(coords) {

                                // Create a polygon with the coordinates and add it to the map
                                var polygon = L.polygon(coords, {
                                    color: colors[key]
                                }).addTo(map);

                                // Simpan polygon yang baru dibuat ke dalam array
                                polygons.push(polygon);

                                $("#container-keterangan").append(`
                                    <div class="input-group mb-3 align-items-center">
                                        <div style="width: 10px; height: 10px; background-color: ${colors[key]}"></div>
                                        &nbsp;
                                        ${value.nama_komoditas}
                                    </div>
                                `);

                                // Bind a popup to the polygon with the desired data
                                var popupContent = "<b>Nama:</b> " + value.nama_lengkap + "<br>" +
                                    "<b>Handphone:</b> " + value.handphone + "<br>" +
                                    "<b>Luas:</b> " + value.luas + " m2<br>" +
                                    "<b>Lokasi:</b> " + value.lokasi;

                                polygon.bindPopup(popupContent);

                                // Add the polygon to the search layer with its corresponding property
                                polygon.feature = {
                                    properties: {
                                        name: value.nama_lengkap
                                    }
                                };
                                markersLayer.addLayer(polygon);
                            }
                        });
                    });

                    datatable.columns.adjust().draw();
                }
            });
        }

        const getAllKecamatan = () => {
            $.ajax({
                url: '<?= base_url('kecamatan/getAllAjax') ?>',
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, value) {

                        $.ajax({
                            url: '<?= base_url('koordinat_kecamatan/getKoordinatKecamatan') ?>',
                            type: 'POST',
                            data: {
                                id_kecamatan: value.id_kecamatan
                            },
                            dataType: 'json',
                            success: function(coords) {
                                var polygon = L.polygon(coords, {
                                    color: 'red'
                                }).addTo(map);
                            }
                        });
                    });
                }
            });
        }

        $(document).ready(function() {

            getAllKecamatan();

            for (let i = 0; i < parseInt("<?= $totalKomoditas; ?>"); i++) {
                colors.push(getRandomColor());
            }

            datatable = $("#datatable").DataTable({});

            populateDatatable(keyword, id_komoditas);

            $("#search-button").click(function() {
                let keyword = $("#search-input").val();
                let id_komoditas = $("#filter-select").val();

                // window.open('<?= base_url('/home') ?>?keyword=' + keyword + '&id_komoditas=' + id_komoditas, '_blank');
                populateDatatable(keyword, id_komoditas);
            });

            $("#filter-button").click(function() {
                let keyword = $("#search-input").val();
                let id_komoditas = $("#filter-select").val();

                // window.open('<?= base_url('/home') ?>?keyword=' + keyword + '&id_komoditas=' + id_komoditas, '_self');
                populateDatatable(keyword, id_komoditas);
            });
        });
    </script>

    <!-- Page level custom scripts -->
    <script>
        let colorPieChart1 = [];
        let colorPieChart2 = [];

        const getRandomColor1 = () => {
            return '#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0');
        }

        $(document).ready(function() {
            $.each(productivitas, function(index, value) {
                colorPieChart1.push(getRandomColor1());
            });

            $.each(produksi, function(index, value) {
                colorPieChart2.push(getRandomColor1());
            });
            // Set new default font family and font color to mimic Bootstrap's default styling
            (Chart.defaults.global.defaultFontFamily = "Nunito"),
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = "#858796";

            // Pie Chart Tanam
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: namaKecamatanTanam,
                    datasets: [{
                        data: productivitas,
                        backgroundColor: colorPieChart1,
                        // hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }, ],
                },
                options: {
                    maintainAspectRatio: true,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: "#dddfeb",
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false,
                    },
                    cutoutPercentage: 80,
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    },
                },
            });

            // Pie Chart Panen
            var ctx2 = document.getElementById("myPieChart2");
            var myPieChart2 = new Chart(ctx2, {
                type: "bar",
                data: {
                    labels: namaKecamatanPanen,
                    datasets: [{
                        data: produksi,
                        backgroundColor: colorPieChart2,
                        hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }, ],
                },
                options: {
                    maintainAspectRatio: true,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: "#dddfeb",
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false,
                    },
                    cutoutPercentage: 80,
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    },
                },
            });
        });
    </script>

</body>

</html>