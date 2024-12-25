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
                <form action="<?= base_url('ketuaKelompokTani/simpan') ?>" method="post">
                    <?= csrf_field() ?>

                    <p>User Data</p>
                    <hr>

                    <label class="form-label" for="nama_lengkap">Nama Lengkap:</label>
                    <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" required>

                    <label class="form-label" for="alamat">Alamat:</label>
                    <input class="form-control" type="text" id="alamat" name="alamat" required>

                    <label class="form-label" for="handphone">Handphone:</label>
                    <input class="form-control" type="text" id="handphone" name="handphone" required>

                    <label class="form-label" for="nik">NIK:</label>
                    <input class="form-control" type="text" id="nik" name="nik" required>

                    <p class="mt-3">User Account</p>
                    <hr>

                    <label for="floatingEmailInput" class="form-label"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" value="<?= old('email') ?>" required>

                    <label for="floatingUsernameInput" class="form-label"><?= lang('Auth.username') ?></label>
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" value="<?= old('username') ?>" required>

                    <label for="floatingPasswordInput" class="form-label"><?= lang('Auth.password') ?></label>
                    <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" value="<?= old('password') ?>" required>

                    <label for="floatingPasswordConfirmInput" class="form-label"><?= lang('Auth.passwordConfirm') ?></label>
                    <input type="password" class="form-control mb-3" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" value="<?= old('password_confirm') ?>" required>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('petani') ?>" class="btn btn-danger ">Kembali</a>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>