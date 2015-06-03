<?php
/**
 * @author Daniel Jones
 * @version 6/1/15
 */
ini_set('display_errors','on');
error_reporting(-1);
describe('Minery\Minery',function(){

    beforeEach(function(){
        require_once(dirname(__FILE__).'/../vendor/autoload.php');
        $this->suite = new Minery\Minery('/'.dirname(__FILE__).'/persistenceTest/');
        $this->report = new MockReport($this->suite->getEmptyResultSet(),'',new \Minery\Sift\Filters\FilterCollection\FilterCollection());
        $this->report->getResult();
    });

    describe('->getEmptyResultSet()',function(){
        it('should return an empty result set',function(){
            $actual = get_class($this->suite->getEmptyResultSet());
            $expected = 'Minery\Dig\Results\ReportResult';
            assert($actual == $expected, "Actual: $actual != Expected: $expected");
        });
    });

    describe('->storeToJSON()',function(){
        it('should persist a report to a JSON representation',function(){
            $this->suite->storeToJSON($this->report,'x1.json');
            assert(file_exists(dirname(__FILE__).'/persistenceTest/x1.json'));
        });
    });
    describe('->loadFromJSON()',function(){
       it('should retrieve a report from a JSON representation',function(){

       });
    });
});