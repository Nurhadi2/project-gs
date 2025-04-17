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

                <form action="<?= base_url('kelompokTani/simpan') ?>" method="post">

                    <div class="form-group">
                        <label class="form-label" for="nama_kelompok_tani">Nama Kelompok Tani</label>
                        <input class="form-control" type="text" class="form-control" id="nama_kelompok_tani" name="nama_kelompok_tani">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nama_ketua">Nama Ketua</label>
                        <select name="nama_ketua" id="nama_ketua" class="form-control">
                            <option value="">Pilih Ketua</option>
                            <?php foreach ($ketua as $row) : ?>
                                <option value="<?= $row['id_ketua_kelompok_tani'] ?>"><?= $row['nama_lengkap'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control" type="text" class="form-control" id="alamat" name="alamat">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="id_kecamatan">Kecamatan</label>
                        <select class="form-control" type="text" class="form-control" id="id_kecamatan" name="id_kecamatan">
                            <option value="">Select Kecamatan</option>
                            <?php foreach ($kecamatan as $row) : ?>
                                <option value="<?= $row['id_kecamatan'] ?>"><?= $row['nama_kecamatan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('kelompokTani') ?>" class="btn btn-danger">Kembali</a>
                </form>

            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>