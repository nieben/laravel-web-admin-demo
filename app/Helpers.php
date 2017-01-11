<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/27
 * Time: 19:28
 */

if ( ! function_exists('indexDbSourcesWithPrimarykey'))
{
    function indexDbSourcesWithPrimarykey($sources)
    {
        $sourcesGenerated = [];

        foreach ($sources as $key => $row) {
            $sourcesGenerated[$row->id] = $row;
        }

        return $sourcesGenerated;
    }
}

if ( ! function_exists('indexDbSourcesWithColumn'))
{
    function indexDbSourcesWithColumn($sources, $column)
    {
        $sourcesGenerated = [];

        foreach ($sources as $key => $row) {
            $sourcesGenerated[$row->$column] = $row;
        }

        return $sourcesGenerated;
    }
}

if ( ! function_exists('arrayValuesWithIndex'))
{
    function arrayValuesWithIndex($array, $indexes, $field = null)
    {
        $values = [];

        foreach ($indexes as $key => $index) {
            if (isset($array[$index])) {
                if ($field !== null) {
                    $values[] = $array[$index]->$field;
                } else {
                    $values[] = $array[$index];
                }
            }
        }

        return $values;
    }
}

if ( ! function_exists('getDifferDate'))
{
    //两个时间距隔多少年多少个月多少天 例如：2年三个月10天
    function getDifferDate($time1, $time2)
    {
        if ($time1 > $time2){
            $tmp = $time2;
            $time2 = $time1;
            $time1 = $tmp;
        }

        $date1 = date('Y-m-d', $time1);
        $date2 = date('Y-m-d', $time2);

        list($Y1,$m1,$d1)=explode('-',$date1);
        list($Y2,$m2,$d2)=explode('-',$date2);

        $Y=$Y2-$Y1;
        $m=$m2-$m1;
        $d=$d2-$d1;

        if ($d<0){
            $d+=(int)date('t',strtotime("-1 month $date2"));
            $m--;
        }

        if ($m<0){
            $m+=12;
            $Y--;
        }

        return array('year'=>$Y,'month'=>$m,'day'=>$d);
    }
}

if ( ! function_exists('getDiagnosisDuration'))
{
    //获得确诊时长 例如：2年三个月10天
    function getDiagnosisDuration($diagnosisTime)
    {
        $diffDate = getDifferDate($diagnosisTime, time());

        $diagnosisTime = '';
        $diagnosisTime .= $diffDate['year'] > 0 ? $diffDate['year'].'年' : '';
        $diagnosisTime .= $diffDate['month'] > 0 ? $diffDate['year'].'个月' : '';

        if ($diagnosisTime) {
            return $diagnosisTime;
        } else {
            return $diffDate['day'] > 0 ? $diffDate['year'].'天' : '';
        }
    }
}