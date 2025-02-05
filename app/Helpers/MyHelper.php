<?php

if (!function_exists('resolveInstance')) {
    function resolveInstance(string $model = '', string $modelFolder = '', string $folder = 'Services', string $interface = 'Service') {
        $interfaceNamespace = "\\App\\$folder\\$model$interface";
        if ($modelFolder != '') {
            $interfaceNamespace = "\\App\\$folder\\$modelFolder\\$model$interface";
        }
        
        if (!class_exists($interfaceNamespace)) {
            return response()->json([
                'error' => 'Interface not found: ' . $interfaceNamespace
            ], 404);
        }
        
        return app($interfaceNamespace);
    }
}

if (!function_exists('splitStringByUpperCase')) {
    function splitStringByUpperCase($string) {
        $parts = preg_split('/(?=[A-Z])/', $string);
        $parts = array_filter($parts);
        return array_values($parts);
    }
}

if (!function_exists('convertDateTime')) {
    function convertDateTime($dateTime, $stringFormatDate = 'd/m/Y H:i:s')
    {
        return \Carbon\Carbon::parse($dateTime)->format($stringFormatDate);
    }
}

if (!function_exists('convertDateToDatabaseFormat')) {
    function convertDateToDatabaseFormat($date) {
        $dateObject = DateTime::createFromFormat('d/m/Y', $date);
        
        if ($dateObject) {
            return $dateObject->format('Y-m-d');
        } else {
            return null;
        }
    }
}