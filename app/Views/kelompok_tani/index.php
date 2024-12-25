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
                <a class="btn btn-primary" type="button" href="<?= base_url('kelompokTani/tambah') ?>">
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
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Ketua</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Anggota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach ($kelompok_tani as $row) : ?>
                                <?php $no++; ?>
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $row['nama_kelompok_tani'] ?></td>
                                    <td><?= $row['nama_ketua'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= $row['nama_kecamatan'] ?></td>
                                    <td><?= $row['jumlah_petani'] ?> Petani</td>
                                    <td>
                                        <a href="<?= base_url('kelompokTani/edit/' . $row['id_kelompok_tani']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('kelompokTani/detail/' . $row['id_kelompok_tani']) ?>" class="btn btn-primary">Detail</a>
                                        <form action="<?= base_url('kelompokTani/hapus/' . $row['id_kelompok_tani']) ?>" method="post" style="display:inline;">
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