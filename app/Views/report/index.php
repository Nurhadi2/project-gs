<?= $this->extend('templates/sb_admin') ?>

<?= $this->section('page_content') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail <?= $title ?></h6>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class="label">Start Month</label>
                            <select class="form-control" name="start_month" id="start_month">
                                <option value="">-- Select Month --</option>
                                <?php foreach ($months as $month) : ?>
                                    <?php if (isset($filtered)) { ?>
                                        <?php if ($filtered["data"]["startMonth"] == $month["id_month"]) { ?>
                                            <option value="<?= $month["id_month"] ?>" selected><?= $month["month_name"] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $month["id_month"] ?>"><?= $month["month_name"] ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option value="<?= $month["id_month"] ?>"><?= $month["month_name"] ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="end_month">End Month</label>
                            <select class="form-control" name="end_month" id="end_month">
                                <option value="">-- Select Month --</option>
                                <?php foreach ($months as $month) : ?>
                                    <?php if (isset($filtered)) { ?>
                                        <?php if ($filtered["data"]["endMonth"] == $month["id_month"]) { ?>
                                            <option value="<?= $month["id_month"] ?>" selected><?= $month["month_name"] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $month["id_month"] ?>"><?= $month["month_name"] ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option value="<?= $month["id_month"] ?>"><?= $month["month_name"] ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="year">Year</label>
                            <select class="form-control" name="year" id="year">
                                <option value="">-- Select Year --</option>
                                <?php foreach ($years as $year) : ?>
                                    <?php if (isset($filtered)) { ?>
                                        <?php if ($filtered["data"]["year"] == $year) { ?>
                                            <option value="<?= $year ?>" selected><?= $year ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $year ?>"><?= $year ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option value="<?= $year ?>"><?= $year ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                            <label class="label">Action</label>
                            <button class="btn btn-primary" type="submit" id="btnFilter">Filter</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php if (isset($filtered)) : ?>
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center align-middle">No</th>
                                    <th rowspan="2" class="text-center align-middle">Kecamatan</th>
                                    <th colspan="<?= $filtered["data"]["length"] + 1 ?>" class="text-center align-middle"> Realisasi Tanam (Ha)</th>
                                    <th colspan="<?= $filtered["data"]["length"] + 1 ?>" class="text-center align-middle"> Realisasi Panen (Ha)</th>
                                    <th rowspan="2" class="text-center align-middle">Produktivitas (Ku/Ha)</th>
                                    <th rowspan="2" class="text-center align-middle">Produksi (Ton)</th>
                                </tr>
                                <tr>
                                    <?php for ($i = 0; $i < $filtered["data"]["length"]; $i++) : ?>
                                        <th><?= $filtered["data"]["months"][$i] ?></th>
                                    <?php endfor; ?>
                                    <th>Jumlah</th>
                                    <?php for ($i = 0; $i < $filtered["data"]["length"]; $i++) : ?>
                                        <th><?= $filtered["data"]["months"][$i] ?></th>
                                    <?php endfor; ?>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($filtered["data"]["data"]); $i++) : ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $i + 1 ?></td>
                                        <td class="text-center align-middle"><?= $filtered["data"]["data"][$i]["nama_kecamatan"] ?></td>

                                        <?php for ($j = 0; $j < $filtered["data"]["length"]; $j++) : ?>
                                            <?php if ($filtered["data"]["data"][$i]["Tanam" . $filtered["data"]["months"][$j]] == null) { ?>
                                                <td class="text-center align-middle">0</td>
                                            <?php } else { ?>
                                                <td class="text-center align-middle"><?= $filtered["data"]["data"][$i]["Tanam" . $filtered["data"]["months"][$j]] ?></td>
                                            <?php } ?>

                                        <?php endfor; ?>

                                        <?php if ($filtered["data"]["data"][$i]["totalAreaTanam"] == null) { ?>
                                            <td class="text-center align-middle">0</td>
                                        <?php } else { ?>
                                            <td class="text-center align-middle"><?= $filtered["data"]["data"][$i]["totalAreaTanam"] ?></td>
                                        <?php } ?>

                                        <?php for ($j = 0; $j < $filtered["data"]["length"]; $j++) : ?>
                                            <?php if ($filtered["data"]["data"][$i]["Panen" . $filtered["data"]["months"][$j]] == null) { ?>
                                                <td class="text-center align-middle">0</td>
                                            <?php } else { ?>
                                                <td class="text-center align-middle"><?= $filtered["data"]["data"][$i]["Panen" . $filtered["data"]["months"][$j]] ?></td>
                                            <?php } ?>
                                        <?php endfor; ?>

                                        <?php if ($filtered["data"]["data"][$i]["totalAreaPanen"] == null) { ?>
                                            <td class="text-center align-middle">0</td>
                                        <?php } else { ?>
                                            <td class="text-center align-middle"><?= $filtered["data"]["data"][$i]["totalAreaPanen"] ?></td>
                                        <?php } ?>

                                        <?php if ($filtered["data"]["data"][$i]["totalUrea"] == null) { ?>
                                            <td class="text-center align-middle">0</td>
                                        <?php } else { ?>
                                            <td class="text-center align-middle"><?= $filtered["data"]["data"][$i]["totalUrea"] ?></td>
                                        <?php } ?>

                                        <?php if ($filtered["data"]["data"][$i]["totalProduksi"] == null) { ?>
                                            <td class="text-center align-middle">0</td>
                                        <?php } else { ?>
                                            <td class="text-center align-middle"><?= $filtered["data"]["data"][$i]["totalProduksi"] ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        <?php else : ?>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Produktivitas</th>
                                    <th>Produksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        let dataTable;
        dataTable = $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel',
            ],
        });

        $("#btnFilter").on("click", function() {
            let startMonth = $("#start_month").val();
            let endMonth = $("#end_month").val();
            let year = $("#year").val();

            if (startMonth == "" || endMonth == "" || year == "") {
                alert("Please select start month, end month, and year");
            } else {
                window.location.href = "<?= base_url('report') ?>?start_month=" + startMonth + "&end_month=" + endMonth + "&year=" + year;
            }
        });
    });
</script>

<?= $this->endSection() ?>