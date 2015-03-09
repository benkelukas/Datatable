<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 9.3.2015
 * Time: 15:08
 */

namespace Chumper\Datatable\Columns;


use View;

class FilterColumn {

    protected $allowedTypes = [
        'text',
        'select'
    ];

    protected $name;
    protected $type;

    /**
     * @param Name of column $name
     * @param Filter type (text, select) $type
     *
     * @throws \Exception
     */
    function __construct (
        $name,
        $type
    )
    {
        $this->checkColumnType($type);
        $this->type = $type;
        $this->name = $name;
    }

    public function run ()
    {
        $view = View::make('datatable::filters.text', [
            'name' => $this->name
        ]);
        return (string)$view;
    }

    /**
     * @param $type
     * @throws \Exception
     */
    private function checkColumnType ($type)
    {
        if ( !in_array($type, $this->allowedTypes) )
        {
            throw new \Exception("Invalid column type for {$this->name}, allowed types: ".implode(', ', $this->allowedTypes)." ");
        }

    }


}