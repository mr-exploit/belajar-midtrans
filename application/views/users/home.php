<!-- pagination -->
<!-- membuat carousel atau sering disebut iklan -->

<div class="card-content bg-blackcsm rounded-3">
  <img src="<?= base_url('assets/'); ?>dashboard/lapangan/lapangan.png" width="100%" class="img-pagination" />
  <!-- <h1 class="text-whiteAPM text-center ">APA KATA MEREKA?</h1> -->
  <div class="text-whitePagination">
    <h4> Selamat Datang di</h4>
    <h1 class="fs-1 fw-bold">ELITE CENTRE</h1>
    <p>Situs Booking Lapangan Badminton di Elite Centre</p>
    <button type="button" class="nav-link fw-bold btn-orangecsm fw-bold  text-white">Booking Now</button>
  </div>
</div>

<div style="width: 100%; height: 100%; background: #E87561" class="p-4"></div>

<div class="p-4 bg-blackcsm">
  <div class="text-top-header mb-2">
    <div class="row justify-content-between">
      <div class="col-4 text-white">
        Pilih Lapangan
      </div>
      <div class="col-auto">
        <a href="<?= base_url('home/lapanganAll'); ?>" class="text-orangecsm">More ></a>

      </div>
    </div>

    <hr style="color: #E87561; height: 2px; stroke-width: 1px;">
  </div>

  <!-- row pertama -->
  <div class="row">
    <?php
    // Ambil 6 data lapangan pertama
    $lapangan_slice = array_slice($lapangan, 0, 6);
    foreach ($lapangan_slice as $l) :
    ?>
      <div class="col-md-4 mb-2">
        <div class="card mb-4 bg-blackcsm " style="border-color: #0C2030;">
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


  <div class="text-center text-white mt-5">
    <h2>Mengapa Harus Elite Centre?</h2>
  </div>
  <hr style="color: #ffffff; height: 2px; stroke-width: 10px;">

  <div class="container mt-5 mb-5">
    <div class="row ">
      <div class="col-md-4">
        <div class="bg-blackcsm">
          <img src="<?= base_url('assets/'); ?>dashboard/Frame.svg" alt="frame" class="rounded mx-auto d-block mb-3" width="50%">
          <div class="p-2 text-white bg-blackcsm">
            <p>Elite Centre memberikan pelayanan yang baik sehingga menghadirkan kenyamanan dalam
              bermain</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-blackcsm ">
          <img src="<?= base_url('assets/'); ?>dashboard/Frame.svg" alt="frame" class="rounded mx-auto d-block mb-3" width="50%">
          <div class="p-2 text-white bg-blackcsm">
            <p>Elite Centre cepat tanggap dalam merespon calon pemain yang menggunakan lapangan</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class=" bg-blackcsm">
          <img src="<?= base_url('assets/'); ?>dashboard/Frame.svg" alt="frame" class="rounded mx-auto d-block mb-3" width="50%">
          <div class="p-2 text-white bg-blackcsm">
            <p>Elite Centre memberikan pelayanan yang baik sehingga menghadirkan kenyamanan dalam
              bermain</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ini bagian card gelombang -->
<div>
  <!-- untuk membuat card gelombang coba buka website ini https://getwaves.io/ -->
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0c2030" fill-opacity="1" d="M0,64L40,58.7C80,53,160,43,240,42.7C320,43,400,53,480,64C560,75,640,85,720,101.3C800,117,880,139,960,154.7C1040,171,1120,181,1200,181.3C1280,181,1360,171,1400,165.3L1440,160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
    </path>
  </svg>
  <!-- buat row dan colomn, buat column nya jadi 6 -->
  <div class="row p-5">
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-content bg-blackcsm rounded-3">
          <img src="<?= base_url('assets/'); ?>dashboard/gelombang.png" alt="gelombang" width="100%">
          <h1 class="text-whiteAPM text-center ">APA KATA MEREKA?</h1>
        </div>
      </div>
    </div>
    <div class="col-md-6 ">
      <!-- selanjutnya buat  card didalam column -->
      <div class="card">
        <div class="p-3">
          <!-- buat lagi row didalam column dan tambahkan column-->
          <div class="row">
            <div class="col-sm-2">
              <img src="<?= base_url('assets/'); ?>dashboard/New folder/bocah.png" alt="">
            </div>
            <div class="col-sm-6">
              <h5 class="fw-bold">Raien</h5>
              <p>Pengunjung</p>
            </div>
          </div>
          <div>
            <p class="mt-3">“ Fitur yang ada di SUNFIELD sangat memudahkan saya dalam melakukan
              pemesanan lapangan badminton sehingga tidak perlu harus ke lapangan. “</p>
          </div>
          <div class="row">
            <div class="col-md-2">01/03</div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-5">
                  <img src="<?= base_url('assets/'); ?>dashboard/New folder/arrow_back.png" alt="">
                </div>
                <div class="col-md-5">
                  <img src="<?= base_url('assets/'); ?>dashboard/New folder/arrow_forward.png" alt="">
                </div>
              </div>

            </div>
          </div>
          <div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ini bagian dibawah card gelombang -->
<div class="bg-blackcsm">
  <div class="custom-box"></div>
</div>