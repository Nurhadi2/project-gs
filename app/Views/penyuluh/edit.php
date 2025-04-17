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
                <form action="<?= base_url('penyuluh/update/' . $petani['id_penyuluh']) ?>" method="post">
                    <?= csrf_field() ?>

                    <p>User Data</p>
                    <hr>

                    <input type="hidden" name="id_user" value="<?= $petani['id_user']; ?>" required>

                    <label class="form-label" for="nama_lengkap">Nama Lengkap:</label>
                    <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $petani['nama_lengkap']; ?>">

                    <label class="form-label" for="alamat">Alamat:</label>
                    <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $petani['alamat']; ?>">

                    <label class="form-label" for="handphone">Handphone:</label>
                    <input class="form-control" type="text" id="handphone" name="handphone" value="<?= $petani['handphone']; ?>">

                    <label class="form-label" for="nik">NIK:</label>
                    <input class="form-control" type="text" id="nik" name="nik" value="<?= $petani['nik']; ?>">

                    <label for="floatingEmailInput" class="form-label">Kecamatan</label>
                    <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                        <option value="">Select Kecamatan</option>
                        <?php foreach ($kecamatan as $k) : ?>
                            <?php if ($k['id_kecamatan'] == $petani['id_kecamatan']) : ?>
                                <option value="<?= $k['id_kecamatan'] ?>" selected><?= $k['nama_kecamatan'] ?></option>
                            <?php else : ?>
                                <option value="<?= $k['id_kecamatan'] ?>"><?= $k['nama_kecamatan'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>

                    <p class="mt-3">User Account</p>
                    <hr>

                    <label for="floatingEmailInput" class="form-label"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" value="<?= $user['email']; ?>" required>

                    <label for="floatingUsernameInput" class="form-label"><?= lang('Auth.username') ?></label>
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" value="<?= $user['username']; ?>" required>

                    <p class="mt-3 text-danger">*No need to fill the password, if you don't want to change the password</p>

                    <label for="floatingPasswordInput" class="form-label"><?= lang('Auth.password') ?></label>
                    <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" value="<?= old('password') ?>">

                    <label for="floatingPasswordConfirmInput" class="form-label"><?= lang('Auth.passwordConfirm') ?></label>
                    <input type="password" class="form-control mb-3" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" value="<?= old('password_confirm') ?>">

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('penyuluh') ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>