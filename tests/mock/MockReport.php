<?php
/**
 * @author Daniel Jones
 * @version 6/1/15
 */

class MockReport extends \Minery\Dig\Report\ReportBase{

    public function run(){

        //doing a bunch of stuff in here just to test that each save function works.
        $this->addFilter('Name',new \Minery\Sift\Filters\Equals\TextFilter('test.name','Josh Walker'));
        $this->db = new \Minery\Minery('');

        return [
            0 => [
                'name'=>'Josh Walker',
                'job' =>'Developer'
            ],
            1 => [
                'name'=>'Fluffy',
                'job'=>'Destroyer Of Worlds'
            ],
            2 => [
                'name'=>'Neil Degrasse Tyson',
                'job' =>'GOAT',
            ]
        ];
    }
}