<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashData('success')){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>
<div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
  <a class="btn btn-primary mb-3" href="<?=base_url('admin/laptop/adddetail');?>">Add Laptop</a> 
</div>
<div>
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>Laptop Name</th>
              <th>Laptop Image</th>
              <th>Last Update</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php foreach($laptop as $laptops): ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $laptops['laptop_name']; ?></td>
            <td><img src="<?= base_url('img').'/'. $laptops['laptop_image'];?>"  width="300" height="300"></td>
            <td><?= $laptops['updated_at']; ?></td>
            <td>
                <a href="<?=base_url('admin/laptop/editdetail').'/'.$laptops['laptop_id'];?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                <a href="<?= base_url('admin/laptop/delete/' . $laptops['laptop_id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete  ?')"><i class="far fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php $i++; ?>
      <?php endforeach; ?>
      </tbody>
  </table>
</div>

<?= $this->endSection() ?>