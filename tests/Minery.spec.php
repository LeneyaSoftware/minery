<?php
/**
 * @author Daniel Jones
 * @version 6/1/15
 */
ini_set('display_errors','on');
error_reporting(-1);
describe('Minery',function(){

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
        it('should persist and retrieve a report to/from JSON',function(){
            $this->suite->storeToJSON($this->report,'x1.json');
            assert(file_exists(dirname(__FILE__).'/persistenceTest/x1.json'));
            $report = $this->suite->loadFromJSON('x1.json');
            $report = $report->toArray();
            assert($report['class'] == 'MockReport');
            assert(array_key_exists('Name',$report['filterCollection']['filters']));
            assert($report['resultSet']['headers'][0] == 'name');
            unlink(dirname(__FILE__).'/persistenceTest/x1.json');
        });
    });
});