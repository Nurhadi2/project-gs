<?= $this->extend('templates/sb_admin') ?>

<?= $this->section('page_content') ?>

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

    <?php
    $user = auth()->user();

    if ($user->inGroup('superadmin', 'admin', 'user')) { ?>
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
    <?php } else { ?>
        <!-- Pie Chart -->
        <div class="col-md-6 col-sm-12" style="display: none;">
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
        <div class="col-md-6 col-sm-12" style="display: none;">
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
    <?php } ?>


</div>

<!-- Page level custom scripts -->
<script>
    let colorPieChart1 = [];
    let colorPieChart2 = [];

    const getRandomColor = () => {
        return '#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0');
    }

    $(document).ready(function() {
        $.each(productivitas, function(index, value) {
            colorPieChart1.push(getRandomColor());
        });

        $.each(produksi, function(index, value) {
            colorPieChart2.push(getRandomColor());
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
            },
        });
    });
</script>

<?= $this->endSection() ?>