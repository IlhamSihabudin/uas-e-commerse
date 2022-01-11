<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white">
                    <span class="h4">Tambah Kategori</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('/admin/kategori') ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required autofocus>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Tambah</button>
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