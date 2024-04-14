<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="">
            <!-- <?= form_error('lapangan', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">nama lapangan</th>
                        <th scope="col">nama sewa</th>
                        <th scope="col">tgl Bayar</th>
                        <th scope="col">tanggal sewa</th>
                        <th scope="col">total Harga</th>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Transcation Time</th>
                        <!-- <th scope="col">PDF</th> -->
                        <th scope="col">Bank</th>
                        <?php if ($user['role_id'] == 1) : ?>
                            <th scope="col">Action</th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($history as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['namalapangan']; ?></td>
                            <td><?= $a['user_name']; ?></td>
                            <td><?= $a['tgl_faktur']; ?></td>
                            <td><?= $a['hari']; ?></td>
                            <td><?= $a['totalharga']; ?></td>
                            <td><?= $a['payment_type']; ?></td>
                            <td><?= $a['transactionTime']; ?></td>
                            <!-- <td><?= $a['pdf_url']; ?></td> -->
                            <td><?= $a['bank']; ?></td>
                            <?php if ($user['role_id'] == 1) : ?>
                                <td>
                                    <a href="<?php echo base_url('history/deletehistory/' . $a['id']); ?>" class="badge badge-danger">Delete</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>