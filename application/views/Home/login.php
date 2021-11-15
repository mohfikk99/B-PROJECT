<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Billing</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/utama.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center mb-4">
                    <img class="logo mb-2" style="width:25%;" src="<?= base_url('assets/img/logo.jpg'); ?>" alt=""> <br>
                    <strong style="color:#000;">RUMAH SAKIT UMUM DAERAH MOKOPIDO</strong>
                    <hr>
                  </div>
                  <form class="user" action="<?= site_url('home/proses_login'); ?>" method="post">
                    <?php if (isset($error)) {
                      echo $error;
                    }; ?>
                    <div class="form-group">
                      <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama...">
                      <?php echo form_error('nama'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password....">
                      <?php echo form_error('password'); ?>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-user btn-block">Masuk</button>

                  </form>



                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->

  <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>