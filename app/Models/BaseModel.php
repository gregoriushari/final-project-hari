<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
  protected $returnType           = 'array';
  protected $useSoftDeletes       = false;

  // Dates
  protected $useTimestamps        = true;
  protected $dateFormat           = 'datetime';
  protected $createdField         = 'created_at';
  protected $updatedField         = 'updated_at';
  protected $deletedField         = 'deleted_at';
}
