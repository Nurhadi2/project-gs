<?= $this->extend('templates/sb_admin') ?>

<?= $this->section('page_content') ?>

<p class="mb-4">Tambah <?= $title ?> baru.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-12 mb-3">

                <form action="<?= base_url('transaksiPanen/simpan') ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label class="form-label" for="bulan">Bulan</label>
                        <select class="form-control" class="form-control" id="bulan" name="bulan" required>
                            <option value="">Pilih Bulan</option>
                            <?php foreach ($months as $month) : ?>
                                <option value="<?= $month["id_month"] ?>"><?= $month["month_name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="tahun">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun" required>
                            <option value="">Pilih Tahun</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="total_area">Total Area Dipaneni (Ha)</label>
                        <input type="number" id="total_area" name="total_area" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="produksi">Produksi (Ton)</label>
                        <input type="text" id="produksi" name="produksi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="id_lahan">Lahan</label>
                        <select class="form-control" id="id_lahan" name="id_lahan" required>
                            <option value="">Pilih Lahan</option>
                            <?php foreach ($lahan as $jk) : ?>
                                <option value="<?= $jk['id_lahan'] ?>"><?= $jk['nama_lengkap'] ?> - <?= $jk['lokasi'] ?></option>
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