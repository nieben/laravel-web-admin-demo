<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LabelController extends Controller
{
    public function getActiveLabels()
    {
        try {
            $labels = Label::where('ft2_labels.disabled', 0)
                ->join('ft2_label_categories', 'ft2_labels.label_category_id', '=', 'ft2_label_categories.id')
                ->orderBy('ft2_labels.label_category_id', 'asc')
                ->orderBy('ft2_labels.id', 'asc')
                ->select('ft2_labels.*', 'ft2_label_categories.name as category_name')
                ->get();

            $data['label_groups'] = $this->generateLabels($labels);

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function generateLabels($labels)
    {
        $labelsGenerated = [];

        foreach ($labels as $key => $row) {
            if (! isset($labelsGenerated[$row->label_category_id]['category_name'])) {
                $labelsGenerated[$row->label_category_id]['category_name'] = $row->category_name;
            }

            $labelsGenerated[$row->label_category_id]['labels'][] = [
                'id' => $row->id,
                'name' => $row->name
            ];
        }

        //重新建立从0开始的索引
        return array_values($labelsGenerated);
    }
}
