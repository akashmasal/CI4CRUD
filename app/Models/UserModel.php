<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'tbl_users';
    protected $primaryKey = 'userId';
    protected $allowedFields = ['userFullName','userEmail','userPassword','userStatus','userCreatedDate','userUpdatedDate'];
}

?>