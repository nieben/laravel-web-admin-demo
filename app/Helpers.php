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
            $sourcesGenerated[$row['id']] = $row;
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
                    $values[] = $array[$index[$field]];
                } else {
                    $values[] = $array[$index];
                }
            }
        }

        return $values;
    }
}