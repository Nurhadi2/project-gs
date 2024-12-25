<?= $this->extend('templates/sb_admin') ?>

<?= $this->section('page_content') ?>

<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<p class="mb-4"><?= $title ?>.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail <?= $title ?></h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-3">

                <table class="table-borderless w-100">
                    <tr>
                        <th>Jenis: </th>
                        <td><?= $lahan['jenis'] ?></td>
                    </tr>
                    <tr>
                        <th>Status Kepemilikan: </th>
                        <td><?= $lahan['status_kepemilikan'] ?></td>
                    </tr>
                    <tr>
                        <th>Total Penghasilan: </th>
                        <td>Rp. <?= number_format($lahan['total_penghasilan'], 0, ',', '.') ?>,-</td>
                    </tr>
                    <tr>
                        <th>Lokasi: </th>
                        <td><?= $lahan['lokasi'] ?></td>
                    </tr>
                    <tr>
                        <th>Luas: </th>
                        <td><?= $lahan['luas'] ?> m2</td>
                    </tr>
                </table>

            </div>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="col-12 mb-3">
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="col-12 mb-3">
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-12 mb-3">
                <div id="map"></div>
            </div>


            <div class="col-12 mb-3">
                <?php if (count($koordinat) > 0) : ?>
                    <form action="<?= base_url('koordinat/hapus/' . $koordinat[0]['id_lahan']) ?>" method="post" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" class="btn btn-danger">Hapus Koordinat</button>
                    </form>
                <?php endif; ?>

                <a class="btn btn-primary" type="button" href="<?= base_url('lahan') ?>">
                    Kembali
                </a>
            </div>


            <div class="col-12 mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Dibuat</th>
                                <th>Diperbarui</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($koordinat as $row) : ?>
                                <tr>
                                    <td><?= $row['id_koordinat'] ?></td>
                                    <td><?= $row['latitude'] ?></td>
                                    <td><?= $row['longitude'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><?= $row['updated_at'] ?></td>
                                    <td>
                                        <a href="<?= base_url('koordinat/edit/' . $row['id_koordinat']) ?>" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Peta -->
<!-- Include Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<!-- Include Leaflet Draw JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />

<script>
    $(document).ready(function() {
        // Call the dataTables jQuery plugin
        let datatable;
        datatable = $('#dataTable').DataTable({
            searching: false,
            paging: false,
            info: false
        });

        // Initialize the map
        var map = L.map('map').setView([-3.648177, 119.610870], 15);

        // Add a tile layer
        osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Satelite Layer
        googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        googleSat.addTo(map);

        // Initialize the FeatureGroup to store editable layers
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        // Tombol untuk buat zona
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems
            },
            draw: {
                polygon: true,
                polyline: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            }
        });
        map.addControl(drawControl);

        // Apabila polygon selesai dibuat
        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            if (type === 'polygon') {

                // konversi zona ke koordinat
                var coordinates = layer.getLatLngs()[0].map(function(latlng) {
                    return [latlng.lat, latlng.lng];
                });

                $.ajax({
                    url: '<?= base_url('koordinat/saveAjax') ?>',
                    method: 'POST',
                    data: {
                        coordinates: coordinates,
                        id_lahan: '<?= $lahan['id_lahan'] ?>'
                    },
                    success: function(data) {
                        drawControl.remove();
                        window.location.reload();
                    }
                })

                // Optionally add the layer to the map
                drawnItems.addLayer(layer);
            }
        });

        // Ambil koordinat sebelumnya apabila ada
        let existingCoordinates = datatable.rows().data().toArray();
        let polygon = [];

        $.each(existingCoordinates, function(index, value) {
            polygon.push([value[1], value[2]]);
        });

        if (polygon.length > 0) {

            L.polygon(polygon, {
                color: 'blue'
            }).addTo(map);

            drawControl.remove();
        }

        var baseLayers = {
            "Satellite View": googleSat,
            "Map View": osm,
        };

        L.control.layers(baseLayers).addTo(map);
    });
</script>

<?= $this->endSection() ?>