<div class="p-5 ">
    <!-- row -->
    <div class="row mt-5 mb-5">
        <?php foreach ($lapangan as $l) : ?>
            <div class="col-md-6 mb-2">
                <div class="card mb-4  " style="border-color: #0C2030;">
                    <img src="<?= base_url('assets/img/lapangan/') . $l['image']; ?>" alt="Flexbox Feature" style="height: 250px;">
                    <div class="p-2 text-white bg-blackcsm">
                        <div class="row">
                            <div class="col-md-8">

                                <h2><?= $l['nama']; ?></h2>
                                <p class="h5"><?= $l['alamat']; ?></p>
                                <p class="text-orangecsm h6">Rp.<?= $l['harga']; ?>/2jam</p>
                            </div>

                            <div class="col-md-3 ">
                                <a href="<?= base_url('user/lapanganDetail/') . $l['id']; ?>" class="nav-link btn-orangecsm text-white text-center mt-5">Sewa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- ENd Row -->