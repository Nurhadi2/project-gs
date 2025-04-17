<?= $this->extend('templates/sb_admin') ?>

<?= $this->section('page_content') ?>
<p class="mb-4">Edit data <?= $title ?>.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-12 mb-3">
                <form action="<?= base_url('transaksiTanam/update/' . $transaksi_tanam['id_transaksi_tanam']) ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label class="form-label" for="bulan">Bulan</label>
                        <select class="form-control" id="bulan" name="bulan" required>
                            <option value="">-- Select Month --</option>
                            <?php foreach ($months as $month) : ?>
                                <?php if ($month["id_month"] == $transaksi_tanam['bulan']) : ?>
                                    <option value="<?= $month["id_month"] ?>" selected><?= $month["month_name"] ?></option>
                                <?php else : ?>
                                    <option value="<?= $month["id_month"] ?>"><?= $month["month_name"] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="tahun">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun" required>
                            <option value="">Pilih Tahun</option>
                            <option value="2021" <?php if ($transaksi_tanam['tahun'] == '2021') echo 'selected'; ?>>2021</option>
                            <option value="2022" <?php if ($transaksi_tanam['tahun'] == '2022') echo 'selected'; ?>>2022</option>
                            <option value="2023" <?php if ($transaksi_tanam['tahun'] == '2023') echo 'selected'; ?>>2023</option>
                            <option value="2024" <?php if ($transaksi_tanam['tahun'] == '2024') echo 'selected'; ?>>2024</option>
                            <option value="2025" <?php if ($transaksi_tanam['tahun'] == '2025') echo 'selected'; ?>>2025</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="total_area">Total Area Ditanami (Ha)</label>
                        <input type="number" id="total_area" name="total_area" class="form-control" value="<?= $transaksi_tanam['total_area'] ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="urea">Produktivitas (Ku/Ha)</label>
                        <input type="text" id="urea" name="urea" class="form-control" value="<?= $transaksi_tanam['urea'] ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="id_lahan">Lahan</label>
                        <select class="form-control" id="id_lahan" name="id_lahan" required>
                            <option value="">Pilih Lahan</option>
                            <?php foreach ($lahan as $jk) : ?>
                                <?php if ($jk['id_lahan'] == $transaksi_tanam['id_lahan']) : ?>
                                    <option value="<?= $jk['id_lahan'] ?>" selected><?= $jk['nama_lengkap'] ?> - <?= $jk['lokasi'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $jk['id_lahan'] ?>"><?= $jk['nama_lengkap'] ?> - <?= $jk['lokasi'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('komoditas') ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>