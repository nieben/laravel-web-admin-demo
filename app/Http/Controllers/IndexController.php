<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getIndexes($type)
    {
        try {
            $indexes = DB::table('ft2_indexes')->where('type', $type)
                ->orderBy('important', 'desc')
                ->orderby('id', 'asc')
                ->get();

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
