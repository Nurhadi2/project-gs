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

                <form action="<?= base_url('jenisKepemilikan/simpan') ?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="nama_jenis_kepemilikan">Nama Jenis Kepemilikan</label>
                        <input class="form-control" type="text" class="form-control" id="nama_jenis_kepemilikan" name="nama_jenis_kepemilikan">
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('jenisKepemilikan') ?>" class="btn btn-danger">Kembali</a>
                </form>

            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>