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

                <form action="<?= base_url('komoditas/simpan') ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="nama_komoditas">Nama Komoditas</label>
                        <input class="form-control" type="text" class="form-control" id="nama_komoditas" name="nama_komoditas" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="id_jenis_komoditas">Jenis Komoditas</label>
                        <select class="form-control" id="id_jenis_komoditas" name="id_jenis_komoditas" required>
                            <option value="">Pilih Jenis Komoditas</option>
                            <?php foreach ($jenis_komoditas as $jk) : ?>
                                <option value="<?= $jk['id_jenis_komoditas'] ?>"><?= $jk['name_jenis_komoditas'] ?></option>
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