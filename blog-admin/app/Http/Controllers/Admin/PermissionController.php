<?php
namespace App\Http\Controllers\Admin;

use App\User;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Request;


Class PermissionController extends CommonController{

    //创建管理员
    public function createAdmin()
    {
        $admin = new User();
        $admin->name = 'linh';
        $admin->password = bcrypt("111111");
        $admin->email = "**@2.com";
        $admin->save();
    }

    //创建角色
    public function createRole()
    {
        $articleAdmin = new Role();

        $articleAdmin->name = 'article_admin';
        $articleAdmin->display_name = '文章管理员';
        $articleAdmin->description = '文章管理';

        $articleAdmin->save();

    }

    //给用户分配角色
    public function roleToUser()
    {
        $user = User::where('name','lidk')->first();

        $t1 = Role::find(2);
        $t2 = Role::find(3);

        $user->roles()->attach([2,3]);

    }

    //权限创建
    public function CreatePermission()
    {
        $permission = new Permission();

        $permission->name = 'article_manager';
        $permission->display_name = '文章管理';
        $permission->description = '文章的审核，文章查看、删除';

        $permission->save();
    }

    public function permissionToRole()
    {
        $role = Role::where('name','root')->first();

        $permission = Permission::where('name','article_manager')->first();

        $role->attachPermission($permission);

    }

    public function noAllow()
    {
        return view('admin.noallow');

    }

    public function check()
    {

        $user = User::find(1);

       foreach($user->roles as $va){
           echo $va->name;
       }

    }
    
  
}