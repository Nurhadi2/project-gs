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
                <a class="btn btn-primary" type="button" href="<?= base_url('jenisKomoditas/tambah') ?>">
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
                                <th>Id</th>
                                <th>Nama Jenis Komoditas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jenisKomoditas as $row) : ?>
                                <tr>
                                    <td><?= $row['id_jenis_komoditas'] ?></td>
                                    <td><?= $row['name_jenis_komoditas'] ?></td>
                                    <td>
                                        <a href="<?= base_url('jenisKomoditas/edit/' . $row['id_jenis_komoditas']) ?>" class="btn btn-warning">Edit</a>
                                        <form action="<?= base_url('jenisKomoditas/hapus/' . $row['id_jenis_komoditas']) ?>" method="post" style="display:inline;">
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