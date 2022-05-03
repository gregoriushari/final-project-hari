<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashData('success')):?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ; ?>
<?php if(session()->getFlashData('failed')):?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('failed') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ; ?>

<div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
  <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMemoriModal">Add Memori</a> 
</div>
<div>
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>List Memory Storage</th>
              <th>Bobot</th>
              <th>Last Update</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php foreach($memori as $memoris): ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $memoris['memori_kriteria_name']; ?></td>
            <td><?= $memoris['memori_kriteria_bobot']; ?></td>
            <td><?= $memoris['updated_at']; ?></td>
            <td>
                <a href="" data-toggle="modal" data-target="#editMemori<?= $memoris['memori_kriteria_id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                <a href="<?= base_url('admin/memori/delete/' . $memoris['memori_kriteria_id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete  ?')"><i class="far fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php $i++; ?>
      <?php endforeach; ?>
      </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="newMemoriModal" tabindex="-1" role="dialog" aria-labelledby="newMemoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMemoriModalLabel">Add Memori Criteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/memori/add'); ?>" method="post">
            <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Memory Storage">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="bobot" id="bobot" placeholder="Bobot">
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

<?php foreach ($memori as $memoris) : ?>
    <div class="modal fade" id="editMemori<?= $memoris['memori_kriteria_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editMemori<?= $memoris['memori_kriteria_id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMemori<?= $memoris['memori_kriteria_id'] ?>Label">Edit Harga Criteria</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('admin/memori/edit/'.$memoris['memori_kriteria_id']); ?>"  method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $memoris['memori_kriteria_name'] ?>" id="name" name="name" placeholder="Memory Storage">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" value="<?= $memoris['memori_kriteria_bobot'] ?>" id="bobot" name="bobot" placeholder="Bobot">
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

<?= $this->endSection() ?>