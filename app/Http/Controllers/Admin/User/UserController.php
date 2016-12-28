<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $mobile = $request->input('mobile');
        $nickname = $request->input('nickname');
        $role = $request->input('role');

        $searchParams = [];
        $db = DB::table('ft2_users');

        if ($mobile != '') {
            $db->where('ft2_users.mobile', 'like', '%'.$mobile.'%');
            $searchParams['mobile'] = $mobile;
        }

        if ($nickname != '') {
            $db->where('ft2_users.nickname', 'like', '%'.$nickname.'%');
            $searchParams['nickname'] = $nickname;
        }

        if ($role != '') {
            $db->where('ft2_users.role', $role);
            $searchParams['role'] = $role;
        }

        $data['searchParams'] = $searchParams;

        $users = $db->orderBy('ft2_users.created_at', 'desc')
            ->paginate(10);
        $data['users'] = $users;

        $data['userRoles'] = [
            0 => '普通用户',
            1 => '医生(未认证)',
            2 => '医生(已认证)',
            3 => '管理员'
        ];

        $data['active'] = 'user';

        return view('admin.user.list', $data);
    }

    public function updateRemark(Request $request)
    {
        try {
            $id = $request->input('id');
            $user = User::find($id);

            if (empty($user)) {
                throw new \Exception('未找到该用户!');
            }

            $user->role = $request->input('role');
            $user->remark = $request->input('remark');
            $user->save();

            return array(
                'error' => 0,
                'message' => '修改成功！'
            );
        }catch (\Exception $e) {
            return array(
                'error' => 1,
                'message' => $e->getMessage()
            );
        }
    }

    public function edit($id)
    {

    }
}
