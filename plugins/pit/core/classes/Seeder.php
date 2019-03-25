<?php

namespace Pit\Core\Classes;


class Seeder
{

    const CONN_IS_EMPTY = 'is_empty';

    public static function seed($model, $data, $condition = self::CONN_IS_EMPTY) {

        $shouldRun = false;
        if($condition === static::CONN_IS_EMPTY) {
            $shouldRun = !$model::all()->count();
        }

        if($shouldRun) {
            foreach($data as $row) {
                if(is_string($row)) {
                    $row = ['name' => $row];
                }

                $entity = new $model();
                foreach($row as $columnName => $columnValue) {
                    $entity->{$columnName} = $columnValue;
                }
                $entity->save();
            }
            return 'DONE: ' . $model;
        }

        return 'SKIPP: ' . $model;
    }

}