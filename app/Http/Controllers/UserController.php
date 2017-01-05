<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function basicInformation()
    {
        View::addExtension('html', 'php');

        return view('test');
    }

    public function basicInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateBasicInformation($request);

            $user = $request->user();

            if ($request->input('role') == 0) {
                $user->sex = $request->input('sex');
                $user->birthday = $request->input('birthday');
                $user->smoke_history = $request->input('smoke_history');
                $user->diagnosis_time = $request->input('diagnosis_time');
                $user->save();
            } elseif ($request->input('role') == 1) {
                $user->real_name = $request->input('real_name');
                $user->sex = $request->input('sex');
                $user->hospital = $request->input('hospital');
                $user->department = $request->input('department');
                $user->save();
            }

            return response()->success([
                'redirect' => '/user/pathological_information'
            ]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateBasicInformation(Request $request)
    {
        if ($request->input('role') == '0') {   //患者或家属
            $this->validate($request, [
                'sex' => 'required|in:F,M',
                'birthday' => 'required|date_format:YYYY-mm-dd',
                'smoke_history' => 'required|in:0,1',
                'diagnosis_time' => 'required|date_format:YYYY-mm-dd',
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

        return view('test');
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

    protected function validateSupplementInformation(Request $request)
    {
        $this->validate($request, [
            'nickname' => 'required|max:255', 'password' => 'required',
        ]);
    }

    public function pathologicalInformation()
    {
        View::addExtension('html', 'php');

        return view('test');
    }

    public function pathologicalInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validatePathologicalInformation($request);

            $user = $request->user();
            $user->pathologic_type = $request->input('pathologic_type');
            $user->disease_stage = $request->input('disease_stage');
            $user->metastatic_lesion = $request->input('metastatic_lesion');
            $user->genic_mutation = $request->input('genic_mutation');
            $user->test_method = $request->input('test_method');
            $user->save();

            return response()->success([
                'redirect' => '/user/basic_information'
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

        return view('test');
    }

    public function firstAddTumorIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $this->addIndexInformation('tumour_function_index', $request->input('data'), $user->id);

            return response()->success([
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

        return view('test');
    }

    public function firstAddLiverIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $this->addIndexInformation('liver_function_index', $request->input('data'), $user->id);

            return response()->success([
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

        return view('test');
    }

    public function firstAddRenalIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $this->addIndexInformation('renal_function_index', $request->input('data'), $user->id);

            return response()->success([
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

        return view('test');
    }

    public function firstAddHeartIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $this->addIndexInformation('heart_function_index', $request->input('data'), $user->id);

            return response()->success([
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

        return view('test');
    }

    public function firstAddImmunityIndexInformationSubmit(Request $request)
    {
        try {
            //验证参数
            $this->validateFirstAddIndexInformation($request);

            $user = $request->user();

            $this->addIndexInformation('immunity_function_index', $request->input('data'), $user->id);

            return response()->success([
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

        $fieldData = $userInformation->$field ? json_decode($userInformation, true) : [];

        foreach ($data as $key => $row) {
            //都存为大写形式
            $index = strtoupper($row['index']);

            $fieldData[$index][] = [$row['date'] => $row['value']];
        }

        //重新对index进行升序排序
        ksort($fieldData);

        $userInformation->$field = $fieldData;
        $userInformation->save();
    }

    protected function getUserInformation($userId)
    {
        $userInformation = UserInformation::where('user_id', $userId)->first();

        if (! empty($userInformation)) {
            return $userInformation;
        } else {
            return UserInformation::create([
                'user_id' => $userId
            ]);
        }
    }
}
