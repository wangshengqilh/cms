<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;

class VipController extends Controller
{

    public function index()
    {
        $users = UserModel::get()->toArray();
        echo '<pre>';print_r($users);echo '</pre>';
    }


    /**
     * 添加新用户
     * 2019年1月1日23:00:16
     * liwei
     */
    public function add()
    {
        $data = [
            'name'  => str_random(5),
            'age'   => mt_rand(10,99),
            'email' => str_random(6) . '@gmail.com',
            'time'  => time()
        ];

        $id = UserModel::insertGetId($data);
        //$id = UserModel::insert($data);
        var_dump($id);
    }


    /**
     * 更新
     * 2019年1月1日23:09:06
     */
    public function update($id)
    {
        $data = [
            'email' => str_random(8).'@163.com'
        ];

        $where = [
            'id'  => $id
        ];

        $rs = UserModel::where($where)->update($data);
        var_dump($rs);

    }

    /**
     * 删除用户
     * @param $id
     */
    public function delete($id)
    {
        $where = [
            'id'   => $id
        ];
        $res=UserModel::where($where)->delete();
        var_dump($res);
    }

    public function userList()
    {
        $list = UserModel::all();
        $data = [
            'list'  => $list,
            'page'  => 999
        ];

        //echo '<pre>';print_r($list);echo '</pre>';die;
        return view('user.index',$data);
    }
}
