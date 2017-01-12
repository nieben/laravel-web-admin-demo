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
            switch ($type) {
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
                default:
                    throw new \Exception(Config::get('constants.PARAM_ERROR_MESSAGE'));
            }

            $indexes = DB::table('ft2_indexes')->where('type', $field)
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
