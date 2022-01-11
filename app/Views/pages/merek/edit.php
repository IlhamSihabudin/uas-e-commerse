<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">
                        <span class="h4">Edit Merek</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('/admin/merek/edit/'.$data['merek_id']) ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Nama Merek</label>
                                        <input type="text" class="form-control" id="nama_merek" name="nama_merek" value="<?= $data['nama_merek'] ?>" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Edit</button>
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