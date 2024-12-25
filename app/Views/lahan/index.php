<?= $this->extend('templates/sb_admin') ?>

<?= $this->section('page_content') ?>
<p class="mb-4">Tambah, Edit, Lihat dan hapus data <?= $title ?>.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?></h6>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-12 mb-3">
                <a class="btn btn-primary" type="button" href="<?= base_url('lahan/tambah') ?>">
                    Tambah <?= $title ?>
                </a>
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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis</th>
                                <th>Status Kepemilikan</th>
                                <th>Total Penghasilan</th>
                                <th>Lokasi</th>
                                <th>Luas</th>
                                <th>Nama Petani</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lahan as $row) : ?>
                                <tr>
                                    <td><?= $row['id_lahan'] ?></td>
                                    <td><?= $row['nama_komoditas'] ?></td>
                                    <td><?= $row['nama_jenis_kepemilikan'] ?></td>
                                    <td>Rp. <?= number_format($row['total_penghasilan'], 0, ',', '.') ?>,-</td>
                                    <td><?= $row['lokasi'] ?></td>
                                    <td><?= $row['luas'] ?> m2</td>
                                    <td><?= $row['nama_lengkap'] ?></td>
                                    <td>
                                        <a href="<?= base_url('lahan/edit/' . $row['id_lahan']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('lahan/detail/' . $row['id_lahan']) ?>" class="btn btn-primary">Detail</a>
                                        <form action="<?= base_url('lahan/hapus/' . $row['id_lahan']) ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<?= $this->endSection() ?>