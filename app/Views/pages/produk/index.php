<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if (session('success')): ?>
            <div class="alert alert-success">
                <b>Success!! </b> <?= session('success') ?>
            </div>
            <?php endif; ?>
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white">
                    <span class="h4">Produk</span>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="<?= base_url('/admin/produk/create') ?>" class="btn btn-primary col-md-2"><i class="fa fa-plus"></i> Tambah</a>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="table-responsive">
                                    <table id="datatables" class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <th>Merek</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($datas): ?>
                                        <?php foreach ($datas as $data): ?>
                                                <tr>
                                                    <td><?= $data->nama_produk ?></td>
                                                    <td><?= "Rp ". $data->harga ?></td>
                                                    <td><?= $data->nama_kategori ?></td>
                                                    <td><?= $data->nama_merek ?></td>
                                                    <td align="center">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('/admin/produk/edit/'.$data->produk_id); ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                                                            <a href="<?= base_url('/admin/produk/destroy/'.$data->produk_id); ?>" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
    $(document).ready(function () {
        $('#datatables').dataTable({
            "info": false
        });
    })
</script>
<?= $this->endSection() ?>