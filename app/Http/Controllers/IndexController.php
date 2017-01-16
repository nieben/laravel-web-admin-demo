<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function getIndexes($type, $important)
    {
        try {
            $db = DB::table('ft2_indexes');
            $db->where('type', $type);

            if ($important == 1) {
                $db->where('important', 1);

                //注册肿瘤页面，需要肿瘤大小这个次重要项
                if ($type == 'tumor') {
                    $db->orWhere('alias', 'TUMOR SIZE');
                }
            } elseif ($important == 2) {
                $db->where('important', 0);
            }

            $db->orderBy('important', 'desc')
                ->orderby('id', 'asc');

            $indexes = $db->get();

            return response()->success($this->generateIndexes($indexes));
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function generateIndexes($indexes)
    {
        $indexesGenerated = [];

        foreach ($indexes as $key => $row) {
            $indexesGenerated[] = [
                'id' => $row->id,
                'name' => $row->name,
                'alias' => $row->alias,
                'important' => $row->important
            ];
        }

        return $indexesGenerated;
    }
}
