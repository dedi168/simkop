<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this-> db->table('users');
    }
    public function index()
    {
        $data['title']='User list';

        // $users=new \Myth\Auth\Models\UserModel();
        // $data['users']= $users->findAll();
        $currentPage= $this->request->getVar('page')? $this->request->getVar('page'):1;
        $UsersM = new \App\Models\UsersM();
        $data['users'] = $UsersM->paginateNews(10,'default');
        $data['pager'] = $UsersM->pager;
        $data['links'] = $data['pager']->links();
        $data['currentPage']=$currentPage;

        return view('Admin/index',$data);
    }
    public function detail($id)
    {
        $data['title']='User Detail';

        $this->builder->select('users.id as userid,username,user_image,email,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id',$id);
        $query = $this->builder->get(); 

        $data['user']=$query->getRow();


        return view('Admin/detail',$data);
    }
    public function tambah()
    { 
        return view('Admin/tambah');
    }
}
