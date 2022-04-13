<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $laptopCount ;?></h3>

                <p>Laptop Total</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa-solid fa-laptop"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $userCount ;?></h3>

                <p>Admin User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
    
<?= $this->endSection() ?>