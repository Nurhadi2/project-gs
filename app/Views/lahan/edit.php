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
                <form action="<?= base_url('lahan/update/' . $lahan['id_lahan']) ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="id_komoditas">Jenis</label>

                        <!-- <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $lahan['jenis'] ?>"> -->
                        <select class="form-control" id="id_komoditas" name="id_komoditas">
                            <?php foreach ($komoditas as $row) : ?>
                                <?php if ($lahan['jenis'] == $row['id_komoditas']) : ?>
                                    <option value="<?= $row['id_komoditas'] ?>" selected><?= $row['nama_komoditas'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row['id_komoditas'] ?>"><?= $row['nama_komoditas'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_jenis_kepemilikan">Status Kepemilikan</label>

                        <!-- <input type="text" class="form-control" id="status_kepemilikan" name="status_kepemilikan" value="<?= $lahan['status_kepemilikan'] ?>"> -->
                        <select class="form-control" id="id_jenis_kepemilikan" name="id_jenis_kepemilikan">
                            <?php foreach ($jenisKepemilikan as $row) : ?>
                                <?php if ($lahan['status_kepemilikan'] == $row['id_jenis_kepemilikan']) : ?>
                                    <option value="<?= $row['id_jenis_kepemilikan'] ?>" selected><?= $row['nama_jenis_kepemilikan'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row['id_jenis_kepemilikan'] ?>"><?= $row['nama_jenis_kepemilikan'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="total_penghasilan">Total Penghasilan</label>
                        <input type="number" class="form-control" id="total_penghasilan" name="total_penghasilan" value="<?= $lahan['total_penghasilan'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $lahan['lokasi'] ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="luas">Luas</label>
                        <input type="number" class="form-control" id="luas" name="luas" value="<?= $lahan['luas'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_petani">Petani</label>
                        <select class="form-control" id="id_petani" name="id_petani">
                            <?php foreach ($petani as $row) : ?>
                                <option value="<?= $row['id_petani'] ?>" <?= $row['id_petani'] == $lahan['id_petani'] ? 'selected' : '' ?>>
                                    <?= $row['nama_lengkap'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url('lahan') ?>" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>