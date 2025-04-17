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
                <form action="<?= base_url('koordinat_kecamatan/update/' . $koordinat_kecamatan['id_koordinat_kecamatan'] . '/' . $koordinat_kecamatan["id_kecamatan"]) ?>" method="post">
                    <label class="form-label" for="latitude">Latitude:</label>
                    <input class="form-control" type="text" id="latitude" name="latitude" value="<?= $koordinat_kecamatan['latitude']; ?>"><br>

                    <label class="form-label" for="longitude">Longitude:</label>
                    <input class="form-control" type="text" id="longitude" name="longitude" value="<?= $koordinat_kecamatan['longitude']; ?>"><br>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('lahan/detail/' . $koordinat_kecamatan["id_kecamatan"]) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>