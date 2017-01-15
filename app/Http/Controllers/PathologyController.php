<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PathologyController extends Controller
{
    public function getPathologicData()
    {
        try {
            $genicMutations = DB::table('ft2_genic_mutations')->get();

            $data['genic_mutations'] = $this->generateGenicMutations($genicMutations);

            $diseaseStages = DB::table('ft2_disease_stages')->get();

            $data['disease_stages'] = $this->generateDiseaseStages($diseaseStages);

            $pathologicTypes = DB::table('ft2_pathologic_types')->get();

            $data['pathologic_types'] = $this->generateSingleChoiceData($pathologicTypes);

            $testMethods = DB::table('ft2_test_methods')->get();

            $data['test_method'] = $this->generateSingleChoiceData($testMethods);

            $metastaticLesions = DB::table('ft2_metastatic_lesions')->get();

            $data['metastatic_lesion'] = $this->generateSingleChoiceData($metastaticLesions);

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function generateSingleChoiceData($data)
    {
        $dataGenerated = [];

        foreach ($data as $key => $row) {
            $dataGenerated[] = [
                'name' => $row->name,
                'selected' => false
            ];
        }

        return $dataGenerated;
    }

    protected function generateGenicMutations($genicMutations)
    {
        $genicMutationsGenerated = [];

        foreach ($genicMutations as $key => $row) {
            $genicMutationsGenerated[] = [
                'name' => $row->name,
                'selected' => false,
                'childs' => $this->generateChild($row->sub_names)
            ];
        }

        return $genicMutationsGenerated;
    }

    protected function generateDiseaseStages($diseaseStages)
    {
        $diseaseStagesGenerated = [];

        foreach ($diseaseStages as $key => $row) {
            $diseaseStagesGenerated[] = [
                'name' => $row->name,
                'selected' => false,
                'childs' => $this->generateChild($row->sub_names)
            ];
        }

        return $diseaseStagesGenerated;
    }

    protected function generateChild($subNames)
    {
        if ($subNames) {
            $childs = json_decode($subNames, true);

            $childsGenerated = [];

            foreach ($childs as $value) {
                $childsGenerated[] = [
                    'name' => $value,
                    'selected' => false
                ];
            }

            return $childsGenerated;
        } else {
            return [];
        }
    }

}
