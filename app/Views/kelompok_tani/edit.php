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
                <form action="<?= base_url('kelompokTani/update/' . $kelompok_tani['id_kelompok_tani']) ?>" method="post">

                    <div class="form-group">
                        <label class="form-label" for="nama_kelompok_tani">Nama Kelompok Tani</label>
                        <input type="text" class="form-control" id="nama_kelompok_tani" name="nama_kelompok_tani" value="<?= $kelompok_tani['nama_kelompok_tani'] ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nama_ketua">Nama Ketua</label>
                        <select name="nama_ketua" id="nama_ketua" class="form-control">
                            <option value="">Pilih Ketua</option>
                            <?php foreach ($ketua as $row) : ?>
                                <?php if ($kelompok_tani["nama_ketua"] == $row['id_ketua_kelompok_tani']) : ?>
                                    <option value="<?= $row['id_ketua_kelompok_tani'] ?>" selected><?= $row['nama_lengkap'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row['id_ketua_kelompok_tani'] ?>"><?= $row['nama_lengkap'] ?></option>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class=" form-group">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control" type="text" class="form-control" id="alamat" name="alamat" value="<?= $kelompok_tani['alamat'] ?>">
                    </div>

                    <div class=" form-group">
                        <label class="form-label" for="id_kecamatan">Kecamatan</label>
                        <select class="form-control" type="text" class="form-control" id="id_kecamatan" name="id_kecamatan">
                            <option value="">Select Kecamatan</option>
                            <?php foreach ($kecamatan as $row) : ?>
                                <?php if ($kelompok_tani["id_kecamatan"] == $row['id_kecamatan']) : ?>
                                    <option value="<?= $row['id_kecamatan'] ?>" selected><?= $row['nama_kecamatan'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row['id_kecamatan'] ?>"><?= $row['nama_kecamatan'] ?></option>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url('kelompokTani') ?>" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>