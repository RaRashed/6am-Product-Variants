<?php

if(!function_exists('combinations')) {
function combinations($arrays)
{
    $result = [[]];

    foreach ($arrays as $property => $property_values) {
        $tmp = [];
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $tmp[] = array_merge($result_item, [$property => $property_value]);
            }
        }
        $result = $tmp;

    }
    return $result;
}
}




