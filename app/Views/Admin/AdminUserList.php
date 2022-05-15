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
<?php if(session()->getFlashData('failed')){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('failed') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
  <a class="btn btn-primary mb-3"  data-toggle="modal" data-target="#newUserModal">Add User</a>
</div>
<div>
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>Admin Email</th>
              <th>Admin Name</th>
              <th>Last Update</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php foreach($user as $users): ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $users['admin_email']; ?></td>
            <td><?= $users['admin_name']; ?></td>
            <td><?= $users['updated_at']; ?></td>
            <td>
              <a href="" data-toggle="modal" data-target="#editUser<?= $users['admin_id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
              <a href="<?= base_url('admin/user/delete/' . $users['admin_id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete  ?')"><i class="far fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php $i++; ?>
      <?php endforeach; ?>
      </tbody>
  </table>
</div>
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModal">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/user/add'); ?>" method="post">
            <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="admin_name">Admin Name</label>
                        <input type="text" class="form-control" value="<?= old('name');?>" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="admin_email">Admin Email</label>
                        <input type="text" class="form-control" value="<?= old('email');?>"  name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="admin_password">Admin Password</label>
                        <input type="password" class="form-control" name="password" id="Mypassword">
                    </div>
                    <div>
                      <input type="checkbox" onclick="myFunction()">Show Password
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
<?php foreach ($user as $users) : ?>
    <div class="modal fade" id="editUser<?= $users['admin_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?= $users['admin_id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUser<?= $users['admin_id'] ?>Label">Edit Admin User</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('admin/user/edit/'.$users['admin_id']); ?>"  method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="admin_name">Admin Name</label>
                            <input type="text" class="form-control" value="<?= $users['admin_name'] ?>" id="nameE" name="nameE" >
                        </div>
                        <div class="form-group">
                            <label for="admin_email">Admin Email</label>
                            <input type="text" class="form-control" value="<?= $users['admin_email'] ?>" id="emailE" name="emailE">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
  function myFunction() {
  var x = document.getElementById("Mypassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?= $this->endSection() ?>


