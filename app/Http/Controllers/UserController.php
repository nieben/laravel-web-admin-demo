<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function userBasicInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.baseinfo');
    }

    public function doctorBasicInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.doctorinfo');
    }

    public function basicInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateBasicInformation($request);

            $user = $request->user();

            if ($request->input('role') == 0) {
                $user->role = 0;
                $user->sex = $request->input('sex');
                $user->birthday = $request->input('birthday');
                $user->smoke_history = $request->input('smoke_history');
                $user->diagnosis_time = $request->input('diagnosis_time');
                $user->save();

                return response()->success([
                    'redirect' => '/user/pathological_information'
                ]);
            } elseif ($request->input('role') == 1) {
                $user->role = 1;
                $user->real_name = $request->input('real_name');
                $user->sex = $request->input('sex');
                $user->hospital = $request->input('hospital');
                $user->department = $request->input('department');
                $user->save();

                return response()->success([
                    'redirect' => '/home'
                ]);
            }
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateBasicInformation(Request $request)
    {
        if ($request->input('role') == '0') {   //患者或家属
            $this->validate($request, [
                'sex' => 'required|in:F,M',
                'birthday' => 'required|date_format:Y-m-d',
                'smoke_history' => 'required|in:1,2,3,4',
                'diagnosis_time' => 'required|date_format:Y-m-d',
            ]);
        } elseif ($request->input('role') == '1') {   //医生
            $this->validate($request, [
                'real_name' => 'required|max:255',
                'sex' => 'required|in:F,M',
                'hospital' => 'required',
                'department' => 'required',
            ]);
        } else {
            throw new \Exception(Config::get('constants.PARAM_ERROR_MESSAGE'));
        }
    }

    public function supplementaryInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.signinfo');
    }

    public function supplementaryInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateSupplementInformation($request);

            $user = $request->user();
            $user->nickname = $request->input('nickname');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return response()->success([
                'redirect' => '/user/basic_information'
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function roleSelection()
    {
        View::addExtension('html', 'php');

        return view('dist.usertype');
    }

    protected function validateSupplementInformation(Request $request)
    {
        $this->validate($request, [
            'nickname' => 'required|max:255|unique:ft2_users,nickname|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'password' => 'required|min:6',
        ]);
    }

    public function pathologicalInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.pathologyinfo');
    }

    public function pathologicalInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validatePathologicalInformation($request);

            $user = $request->user();
            $user->pathologic_type = $request->input('pathologic_type');
            $user->disease_stage = $request->input('disease_stage');
            $user->metastatic_lesion = json_encode($request->input('metastatic_lesion'));
            $user->genic_mutation = $request->input('genic_mutation');
            $user->test_method = $request->input('test_method');
            $user->save();

            return response()->success([
                'redirect' => '/user/tumor_function_index/first_add'
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validatePathologicalInformation(Request $request)
    {
        $this->validate($request, [
            'pathologic_type' => 'required',
            'disease_stage' => 'required',
            'metastatic_lesion' => 'required',
            'genic_mutation' => 'required',
            'test_method' => 'required',
        ]);
    }

    public function firstAddTumorIndexInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.tumour');
    }

    public function firstAddTumorIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $defaultDate = $this->addIndexInformation('tumour_function_index', $request->input('data'), $user->id);

            //标注用户注册信息填写完成
            $user->information_filled = 1;
            $user->save();

            return response()->success([
                'default_date' => $defaultDate,
                'redirect' => '/user/liver_function_index/first_add',
                'skip_redirect' => '/user/renal_function_index/first_add'
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function firstAddLiverIndexInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.liverfunction');
    }

    public function firstAddLiverIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $defaultDate = $this->addIndexInformation('liver_function_index', $request->input('data'), $user->id);

            return response()->success([
                'default_date' => $defaultDate,
                'redirect' => '/user/renal_function_index/first_add',
                'skip_redirect' => '/user/heart_function_index/first_add'
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function firstAddRenalIndexInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.renalfunction');
    }

    public function firstAddRenalIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $defaultDate = $this->addIndexInformation('renal_function_index', $request->input('data'), $user->id);

            return response()->success([
                'default_date' => $defaultDate,
                'redirect' => '/user/heart_function_index/first_add',
                'skip_redirect' => '/user/immunity_function_index/first_add'
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function firstAddHeartIndexInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.heart');
    }

    public function firstAddHeartIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $defaultDate = $this->addIndexInformation('heart_function_index', $request->input('data'), $user->id);

            return response()->success([
                'default_date' => $defaultDate,
                'redirect' => '/user/immunity_function_index/first_add',
                'skip_redirect' => '/home'
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function firstAddImmunityIndexInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.immune');
    }

    public function firstAddImmunityIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $defaultDate = $this->addIndexInformation('immunity_function_index', $request->input('data'), $user->id);

            return response()->success([
                'default_date' => $defaultDate,
                'redirect' => '/home',
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateFirstAddIndexInformation(Request $request)
    {
        $this->validate($request, [
            'data' => 'required',
        ]);
    }

    protected function addIndexInformation($field, $data, $userId)
    {
        $userInformation = $this->getUserInformation($userId);

        $fieldData = $userInformation->$field ? json_decode($userInformation->$field, true) : [];

        $defaultDate = '';

        foreach ($data as $key => $row) {
            if (trim($row['value']) != '' && trim($row['date']) != '') {  //如果时间和值都非空，则添加
                //都存为大写形式
                $index = strtoupper($row['index']);

                $fieldData[$index][$row['date']] = $row['value'];

                if ($index != '肿瘤大小 (最大直径)') {
                    $defaultDate = $row['date'];
                }
            }
        }

        //重新对index进行升序排序
        ksort($fieldData);

        $userInformation->$field = json_encode($fieldData);
        $userInformation->save();

        return $defaultDate;
    }

    protected function getUserInformation($userId)
    {
        $userInformation = UserInformation::where('user_id', $userId)->first();

        if (! empty($userInformation)) {
            return $userInformation;
        } else {
            $newUserInformation = new UserInformation();
            $newUserInformation->user_id = $userId;
            $newUserInformation->save();

            return $newUserInformation;
        }
    }

    public function homePage()
    {
        View::addExtension('html', 'php');

        return view('test');
    }

    public function getHomePageData()
    {
        try {
            $user = Auth::user();

            $data = [];

            if ($user->role == 0) {  //患者或家属
                $data['user'] = [
                    'avatar' => $user->avatar,
                    'nickname' => $user->nickname,
                    'birthday' => $user->birthday,
                    'sex' => $user->sex,
                    'smoke_history' => $user->smoke_history,
                    'diagnosis_time' => $user->diagnosis_time,
                    'diagnosis_time_generated' => getUserDiagnosisDuration(strtotime($user->diagnosis_time))
                ];

                $data['pathological_info'] = [
                    'pathologic_type' => $user->pathologic_type,
                    'disease_stage' => $user->disease_stage,
                    'metastatic_lesion' => json_decode($user->metastatic_lesion, true),
                    'genic_mutation' => $user->genic_mutation,
                    'test_method' => $user->test_method
                ];

                $data['index_data'] = $this->getUserIndexData($user->id);
            } elseif ($user->role == 1) {  //医生
                $data['user'] = [
                    'avatar' => $user->avatar,
                    'real_name' => $user->real_name,
                    'sex' => $user->sex,
                    'hospital' => $user->hospital,
                    'department' => $user->department
                ];
            }

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function getUserIndexData($useId)
    {
        $indexData = [];

        $functions = [
            'tumour_function_index' => '肿瘤',
            'liver_function_index' => '肝功能',
            'renal_function_index' => '肾功能',
            'heart_function_index' => '心脏功能',
            'immunity_function_index' => '免疫功能',
            'routine_blood_index' => '血常规'
        ];

        //获取所有index信息
        $indexes = indexDbSourcesWithColumn(DB::table('ft2_indexes')->get(), 'name');

        foreach ($functions as $key => $value) {
            $indexData[] = [
                'name' => $value,
                'selected' => ($key == 'tumour_function_index') ? true : false,  //默认选中肿瘤
                'data' => $this->getUserFunctionIndexData($useId, $key, $indexes)
            ];
        }

        return $indexData;
    }

    protected function getUserFunctionIndexData($userId, $field, $indexes)
    {
        $userInformation = UserInformation::where('user_id', $userId)->first();

        $indexData = json_decode($userInformation->$field, true);

        $indexDataGenerated = [];

        if (! empty($indexData)) {
            foreach ($indexData as $key => $row) {
                $indexDataGenerated[] = [
                    'name' => $key,
                    'opened' => false,
                    'alias' => $indexes[$key]->alias,
                    'important' => $indexes[$key]->important,
                    'data' => $this->generateIndexData($row)
                ];
            }
        }

        return $indexDataGenerated;
    }

    protected function generateIndexData($row)
    {
        $dataGenerated = [];

        foreach ($row as $key => $value) {
            $dataGenerated[] = [
                'time' => $key,
                'value' => $value
            ];
        }

        return $dataGenerated;
    }

    public function updateBasicInformation()
    {
        View::addExtension('html', 'php');

        return view('test');
    }

    public function updateBasicInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateBasicInformationUpdate($request);

            $user = $request->user();

            if ($user->role == 0) {  //病人或家属
                $user->sex = $request->input('sex');
                $user->birthday = $request->input('birthday');
                $user->smoke_history = $request->input('smoke_history');
                $user->diagnosis_time = $request->input('diagnosis_time');
                $user->save();

                return response()->success([]);
            } elseif ($user->role == 1) {
                $user->real_name = $request->input('real_name');
                $user->sex = $request->input('sex');
                $user->hospital = $request->input('hospital');
                $user->department = $request->input('department');
                $user->save();

                return response()->success([]);
            }
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateBasicInformationUpdate(Request $request)
    {
        $user = $request->user();

        if ($user->role == 0) {   //患者或家属
            $this->validate($request, [
                'sex' => 'required|in:F,M',
                'birthday' => 'required|date_format:Y-m-d',
                'smoke_history' => 'required|in:0,1',
                'diagnosis_time' => 'required|date_format:Y-m-d',
            ]);
        } elseif ($user->role == 1) {   //医生
            $this->validate($request, [
                'real_name' => 'required|max:255',
                'sex' => 'required|in:F,M',
                'hospital' => 'required',
                'department' => 'required',
            ]);
        } else {
            throw new \Exception(Config::get('constants.PARAM_ERROR_MESSAGE'));
        }
    }

    public function updatePathologicalInformation()
    {
        View::addExtension('html', 'php');

        return view('dist.pathologyinfo');
    }

    public function updatePathologicalInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validatePathologicalInformation($request);

            $user = $request->user();

            $user->pathologic_type = $request->input('pathologic_type');
            $user->disease_stage = $request->input('disease_stage');
            $user->metastatic_lesion = json_encode($request->input('metastatic_lesion'));
            $user->genic_mutation = $request->input('genic_mutation');
            $user->test_method = $request->input('test_method');
            $user->save();

            return response()->success([]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function addIndexData()
    {
        View::addExtension('html', 'php');

        return view('test');
    }

    public function addIndexDataSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateAddIndexData($request);

            $user = $request->user();

            switch ($request->function) {
                case 'tumor':
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
                case 'routine_blood':
                    $field = 'routine_blood_index';
                    break;
            }

            $defaultDate = $this->addIndexInformation($field, $request->input('data'), $user->id);

            return response()->success([
                'default_date' => $defaultDate
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateAddIndexData(Request $request)
    {
        $this->validate($request, [
            'function' => 'required|in:tumor,liver,renal,heart,immunity,routine_blood',
            'data' => 'required'
        ]);
    }

    public function updateIndexData()
    {
        View::addExtension('html', 'php');

        return view('test');
    }

    public function updateIndexDataSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateUpdateIndexData($request);

            $user = $request->user();

            switch ($request->function) {
                case 'tumor':
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
                case 'routine_blood':
                    $field = 'routine_blood_index';
                    break;
            }

            $this->updateIndexInformation($field, $request->index, $request->data, $user->id);

            return response()->success([]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateUpdateIndexData(Request $request)
    {
        $this->validate($request, [
            'function' => 'required|in:tumor,liver,renal,heart,immunity,routine_blood',
            'index' => 'required|exists:ft2_indexes,name,type,'.$request->function,
            'data' => 'required'
        ]);
    }

    protected function updateIndexInformation($field, $index, $data, $userId)
    {
        $userInformation = $this->getUserInformation($userId);

        $fieldData = $userInformation->$field ? json_decode($userInformation->$field, true) : [];

        $fieldData[$index] = $data;

        $userInformation->$field = json_encode($fieldData);

        $userInformation->save();
    }
}
