<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">
                        <span class="h4">Edit Produk</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('/admin/produk/edit/'.$data['produk_id']) ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $data['nama_produk'] ?>" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Kategori</label>
                                        <select class="form-control" name="kategori_id" required>
                                            <option selected disabled>Pilih Salah Satu</option>
                                            <?php foreach ($kategoris as $kategori): ?>
                                                <option value="<?= $kategori['kategori_id'] ?>" <?= $data['kategori_id'] == $kategori['kategori_id'] ? 'selected' : '' ?>><?= $kategori['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Merek</label>
                                        <select class="form-control" name="merek_id" required>
                                            <option selected disabled>Pilih Salah Satu</option>
                                            <?php foreach ($mereks as $merek): ?>
                                                <option value="<?= $merek['merek_id'] ?>" <?= $data['merek_id'] == $merek['merek_id'] ? 'selected' : '' ?>><?= $merek['nama_merek'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>