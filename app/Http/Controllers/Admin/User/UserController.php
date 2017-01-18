<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use App\UserInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
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

        $data['doctorRoles'] = [
            1 => '医生(未认证)',
            2 => '医生(已认证)'
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
        $user = User::find($id);

        if (empty($user)) {
            return redirect('/admin/user/list');
        }

        $data['user'] = $this->generateUser($user);
        $data['defaultAvatar'] = Config::get('constants.DEFAULT_AVATAR');

        $data['active'] = 'user';

        if ($user->role == 0) {
            $userInformation = UserInformation::where('user_id', $id)->first();
            $data['userInformation'] = $this->extractUserInformation($userInformation);

            return view('admin.user.normalEdit', $data);
        } else {
            return view('admin.user.doctorEdit', $data);
        }
    }

    protected function generateUser($user)
    {
        $user->age = $this->getAgeByBirthday($user->birthday);

        $user->metastatic_lesion = $user->metastatic_lesion == null ? '' : implode(' ', json_decode($user->metastatic_lesion, true));

        return $user;
    }

    protected function getAgeByBirthday($birthday)
    {
        if($birthday == null) {
            return '';
        }

        $datetimeNow = new \DateTime();
        $datetimeBirthday = new \DateTime($birthday);
        $interval = date_diff($datetimeNow, $datetimeBirthday, TRUE);

        return $interval->format('%y');
    }

    protected function extractUserInformation($userInformation, $function = null)
    {
        $userInformationGenerated = [
            'functions' => [],
            'indexes' => [],
            'data' => []
        ];

        if (empty($userInformation)) {
            return $userInformationGenerated;
        }

        if ($userInformation->tumour_function_index != null) {
            $userInformationGenerated['functions']['tumour'] = '肿瘤';
            if (empty($userInformationGenerated['indexes']) && ($function == null or $function == 'tumour')) {
                $userInformationGenerated['indexes'] = $this->extractIndexes($userInformation->tumour_function_index);
                $userInformationGenerated['data'] = json_decode($userInformation->tumour_function_index, true);
            }
        }

        if ($userInformation->liver_function_index != null) {
            $userInformationGenerated['functions']['liver'] = '肝功能';
            if (empty($userInformationGenerated['indexes'])  && ($function == null or $function == 'liver')) {
                $userInformationGenerated['indexes'] = $this->extractIndexes($userInformation->liver_function_index);
                $userInformationGenerated['data'] = json_decode($userInformation->liver_function_index, true);
            }
        }

        if ($userInformation->renal_function_index != null) {
            $userInformationGenerated['functions']['renal'] = '肾功能';
            if (empty($userInformationGenerated['indexes'])  && ($function == null or $function == 'renal')) {
                $userInformationGenerated['indexes'] = $this->extractIndexes($userInformation->renal_function_index);
                $userInformationGenerated['data'] = json_decode($userInformation->renal_function_index, true);
            }
        }

        if ($userInformation->heart_function_index != null) {
            $userInformationGenerated['functions']['heart'] = '心脏功能';
            if (empty($userInformationGenerated['indexes'])  && ($function == null or $function == 'heart')) {
                $userInformationGenerated['indexes'] = $this->extractIndexes($userInformation->heart_function_index);
                $userInformationGenerated['data'] = json_decode($userInformation->heart_function_index, true);
            }
        }

        if ($userInformation->immunity_function_index != null) {
            $userInformationGenerated['functions']['immunity'] = '免疫功能';
            if (empty($userInformationGenerated['indexes'])  && ($function == null or $function == 'immunity')) {
                $userInformationGenerated['indexes'] = $this->extractIndexes($userInformation->immunity_function_index);
                $userInformationGenerated['data'] = json_decode($userInformation->immunity_function_index, true);
            }
        }

        if ($userInformation->routine_blood_index != null) {
            $userInformationGenerated['functions']['blood'] = '血常规';
            if (empty($userInformationGenerated['indexes'])  && ($function == null or $function == 'blood')) {
                $userInformationGenerated['indexes'] = $this->extractIndexes($userInformation->routine_blood_index);
                $userInformationGenerated['data'] = json_decode($userInformation->routine_blood_index, true);
            }
        }

        return $userInformationGenerated;
    }

    protected function extractIndexes($jsonData)
    {
        $indexes = [];
        $data = json_decode($jsonData, true);

        foreach ($data as $key => $row) {
            $indexes[] = $key;
        }

        return $indexes;
    }

    protected function extractData($jsonData, $index)
    {
        $data = json_decode($jsonData, true);

        return $data[$index];
    }

    public function getIndexData(Request $request)
    {
        $type = $request->input('type');
        $function = $request->input('function');
        $index = $request->input('index');
        $userId = $request->input('id');

        $userInformation = UserInformation::where('user_id', $userId)->first();

        //改变了功能选项
        if ($type == 'function') {
            $data['id'] = $userId;

            $data['function'] = $function;

            $data['userInformation'] = $this->extractUserInformation($userInformation, $function);

            return view('admin.user.indexDataChangeFunction', $data);
        } elseif ($type == 'index') {
            $data['index'] = $index;

            switch ($function) {
                case 'tumour':
                    $field = 'tumour_function_index';
                    break;
                case 'liver':
                    $field = 'liver_function_index';
                    break;
                case 'renal':
                    $field = 'renal_function_index';
                    break;
                case 'heart':
                    $field = 'heart_function_index';
                    break;
                case 'immunity':
                    $field = 'immunity_function_index';
                    break;
                case 'blood':
                    $field = 'routine_blood_index';
                    break;
            }

            $data['data'] = json_decode($userInformation->$field, true);

            return view('admin.user.indexDataChangeIndex', $data);
        }
    }

    public function disableUser($id)
    {
        try {
            $user = User::find($id);

            if (empty($user)) {
                throw new \Exception('未找到该用户！');
            }

            $user->disabled = 1;
            $user->save();

            return array(
                'error' => 0,
                'message' => '拉黑成功！'
            );
        }catch (\Exception $e) {
            return array(
                'error' => 1,
                'message' => $e->getMessage()
            );
        }
    }
}
