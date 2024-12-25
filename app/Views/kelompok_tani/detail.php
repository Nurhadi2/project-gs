<?= $this->extend('templates/sb_admin') ?>
<?= $this->section('page_content') ?>

<p class="mb-4"><?= $title ?>.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail <?= $title ?></h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-3">

                <table class="table-borderless w-100">
                    <tr>
                        <th>Nama Kelompok Tani: </th>
                        <td><?= $kelompok_tani['nama_kelompok_tani'] ?></td>
                        <th>Nama Ketua: </th>
                        <td><?= $kelompok_tani['nama_ketua'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat: </th>
                        <td><?= $kelompok_tani['alamat'] ?></td>
                        <th>Kecamatan: </th>
                        <td><?= $kelompok_tani['nama_kecamatan'] ?></td>
                    </tr>
                </table>

            </div>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="col-12 mb-3">
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="col-12 mb-3">
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-12 mb-3">
                <hr>
                <p class="mt-3 font-weight-bold">Daftar Petani</p>
                <table class="table w-100" id="tablePetani">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Handphone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($members as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_lengkap'] ?></td>
                                <td><?= $row['handphone'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // Call the dataTables jQuery plugin
        let datatable;
        datatable = $('#dataTable').DataTable({
            searching: false,
            paging: false,
            info: false
        });

        let tablePetani;
        tablePetani = $('#tablePetani').DataTable({
            searching: true,
            paging: true,
            info: true
        });
    });
</script>

<?= $this->endSection() ?>