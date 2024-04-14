<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url('assets/'); ?>dashboard/LOGOSUNFIELD.png" alt="LOGO" width="80" height="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  fw-bold" href="<?= base_url('auth/registration'); ?>">Daftar</a>
          </li>
          <li class="nav-item ">

            <a href="<?= base_url('auth'); ?>" class="nav-link btn-orangecsm fw-bold ml-2 text-white">Login</a>

          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>