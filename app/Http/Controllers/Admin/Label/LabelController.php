<?php

namespace App\Http\Controllers\Admin\Label;

use App\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    public function index(Request $request)
    {
        $keyWord = $request->input('key_word');
        $categoryId = $request->input('category_id');

        $searchParams = [];
        $db = DB::table('ft2_labels');

        if ($categoryId != '') {
            $db->where('ft2_labels.label_category_id', $categoryId);
            $searchParams['category_id'] = $categoryId;
        }
        if ($keyWord != '') {
            $db->where('ft2_labels.name', 'like', '%'.$keyWord.'%');
            $searchParams['key_word'] = $keyWord;
        }
        $data['searchParams'] = $searchParams;

        $labels = $db->join('ft2_label_categories', 'ft2_label_categories.id', '=', 'ft2_labels.label_category_id')
            ->orderBy('ft2_labels.created_at', 'desc')
            ->select('ft2_labels.*', 'ft2_label_categories.name as category_name')
            ->paginate(3);
        $data['labels'] = $labels;

        $data['label_categories'] = DB::table('ft2_label_categories')->get();

        $data['active'] = 'label';

        return view('admin.label.list', $data);
    }

    public function add()
    {
        $data['label_categories'] = DB::table('ft2_label_categories')->get();

        $data['active'] = 'label';

        return view('admin.label.add', $data);
    }

    public function addSubmit(Request $request)
    {
        try {
            $label = new Label();
            $label->name = $request->input('name');
            $label->label_category_id = $request->input('label_category_id');
            $label->save();

            return array(
                'error' => 0,
                'message' => '添加成功！'
            );
        }catch (\Exception $e) {
            return array(
                'error' => 1,
                'message' => $e->getMessage()
            );
        }
    }

    public function edit($type, $id)
    {
        try {
            if ($type == 'enable') {
                $label = Label::find($id);

                if (empty($label)) {
                    throw new \Exception('未找到该标签！');
                }

                $label->disabled = 0;
                $label->save();
            } elseif ($type == 'disable') {
                $label = Label::find($id);

                if (empty($label)) {
                    throw new \Exception('未找到该标签！');
                }

                $label->disabled = 1;
                $label->save();
            } else {
                throw new \Exception('参数错误！');
            }

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
}
