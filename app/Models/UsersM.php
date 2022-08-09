<?php
namespace App\Models;

class UsersM extends \CodeIgniter\Model {

    protected $table = 'users';
    protected $primaryKey = 'id';
        protected $returnType = "object";

    // your function to paginate
    public function paginateNews(int $nb_page, $s) {
        return  $this->select('users.id as userid,username,email,name')->join('auth_groups_users', 'auth_groups_users.user_id = users.id')->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')->paginate($nb_page, $s);
    }

}