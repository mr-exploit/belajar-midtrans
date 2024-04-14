<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-9">
            <!-- <?= form_error('lapangan', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Lapangan</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">harga</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($artis as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['alamat']; ?></td>
                            <td><?= $a['harga']; ?></td>
                            <td> <img src="<?= base_url('assets/img/lapangan/') . $a['image']; ?>" class="img-thumbnail " style="height: 150px; width: auto"></td>

                            <td>
                                <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#editModal" data-id="<?= $a['id']; ?>">Edit</a>
                                <a href="<?php echo base_url('lapangan/deleteLapangan/' . $a['id']); ?>" class="badge badge-danger">Delete</a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Button trigger modal -->

<!-- Modal Add-->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add new Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Lapangan'); ?>" method="post" enctype="multipart/form-data" id="myForm">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lapangan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Deskripsi alamat">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="image">
                                        <label class="custom-file-label" for="img" id="img-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit lapangan -->
                <form id="editForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="editNama">Nama Lapangan</label>
                        <input type="text" class="form-control" id="editNama" name="editnama" value="">
                    </div>
                    <div class="form-group">
                        <label for="editAlamat">Alamat</label>
                        <input type="text" class="form-control" id="editAlamat" name="editalamat" value="">
                    </div>
                    <div class="form-group">
                        <label for="editHarga">Harga</label>
                        <input type="text" class="form-control" id="editHarga" name="editharga" value="">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imgedit" name="editimage">
                                        <label class="custom-file-label" for="img" id="img-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hidden input field for lapangan ID -->
                    <input type="hidden" id="lapanganId" name="lapanganId" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>