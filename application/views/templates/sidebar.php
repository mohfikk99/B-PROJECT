<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4" href="index.html">
    <div class="sidebar-brand-icon">
      <img class="logo ml-2 " src="<?= base_url('assets/img/logo.jpg'); ?>" alt="">
    </div>
    <div class="sidebar-brand-text mx-2">RS Umum Daerah Mokopido</div>
  </a>



  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="#">
      <i class="fas fa-check"></i>
      <span><?= $title; ?></span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Petugas'); ?>">
      <i class="fas fa-user-check"></i>
      <span> Profil Petugas</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Pasien'); ?>">
      <i class="fas fa-procedures"></i>
      <span>Data Pasien</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Rumah_sakit'); ?>">
      <i class="fas fa-person-booth"></i>
      <span>Data Pavilium</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Rumah_sakit/layanan'); ?>">
      <i class="fas fa-prescription-bottle-alt"></i>
      <span>Data layanan</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Rumah_sakit/laboratorium'); ?>">
      <i class="fas fa-prescription-bottle"></i>
      <span>Data Laboratorium</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Rumah_sakit/pelayanan'); ?>">
      <i class="fas fa-bookmark"></i>
      <span>Data Pelayanan</span></a>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->