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
                <a class="btn btn-primary" type="button" href="<?= base_url('transaksiPanen/tambah') ?>">
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
                    <table class="table table-bordered w-100" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Dibuat</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Alamat Lahan</th>
                                <th>Kecamatan</th>
                                <th>Luas Lahan (Ha)</th>
                                <th>Luas Area Panen (Ha)</th>
                                <th>Produksi (Ton)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($transaksi_panen as $row) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><?= $row['month_name'] ?></td>
                                    <td><?= $row['tahun'] ?></td>
                                    <td><?= $row['lokasi'] ?></td>
                                    <td><?= $row['nama_kecamatan'] ?></td>
                                    <td><?= $row['luas'] ?></td>
                                    <td><?= $row['total_area'] ?></td>
                                    <td><?= $row['produksi'] ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksiPanen/edit/' . $row['id_transaksi_panen']) ?>" class="btn btn-warning">Edit</a>
                                        <form action="<?= base_url('transaksiPanen/hapus/' . $row['id_transaksi_panen']) ?>" method="post" style="display:inline;">
                                            <?php csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $no++ ?>
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