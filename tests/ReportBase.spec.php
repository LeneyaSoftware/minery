<?php
/**
 * @author Daniel Jones
 * @version 6/1/15
 */
ini_set('display_errors','on');
error_reporting(-1);
describe('ReportBase',function(){

    beforeEach(function(){
        require_once(dirname(__FILE__).'/../vendor/autoload.php');
        $this->suite = new Minery\Minery('/'.dirname(__FILE__).'/persistenceTest/');
        $this->report = new MockReport($this->suite->getEmptyResultSet(),'',new \Minery\Sift\Filters\FilterCollection\FilterCollection());
        $this->report->getResult();
    });

    describe('->getResult()',function(){
        it('should return the results of the report run() function wrapped in a result set class.',function(){
            //since get result is called in the beforeEach, lets just test that result.
            $resultSet = $this->report->getResult();
            assert($resultSet->data() == $this->report->run());
            assert($resultSet->headers() == ['name','job']);
        });
    });

    describe('->addFilter()',function(){
       it('should add a filter to the reports filter collection',function(){
           $filter = new \Minery\Sift\Filters\Equals\TextFilter('job','Josh Walker');
           $this->report->addFilter('Job',$filter,'AND');
           $report = $this->report->toArray();
           assert(array_key_exists('Job',$report['filterCollection']['filters']));
       });
        it('should add a filter to the a filter to the reports filter collection with a contraction condition',function(){
            $filter = new \Minery\Sift\Filters\Equals\TextFilter('job','Josh Walker');
            $this->report->addFilter('Job',$filter,'AND');

            $report = $this->report->toArray();
            assert($report['filterCollection']['filters']['Job']['condition'] == 'AND');
        });
    });

    describe('->removeFilter()',function(){
        it('should remove a filter from the reports filter collection',function(){
            $this->report->removeFilter('Name');
            $report = $this->report->toArray();
            assert(!array_key_exists('Name',$report['filterCollection']['filters']));
        });
        it('should not explode lives when you are trying to remove a key that is not there',function(){
            $this->report->removeFilter('YRNFS');
        });
    });

    describe('->clearFilters()',function(){
        it('should remove all filters from the filter collection',function(){
            $this->report->clearFilters();
            $report = $this->report->toArray();
            assert(count($report['filterCollection']['filters']) == 0);
        });
    });

    describe('->toArray()',function(){
        it('should convert the report into array format',function(){
            $this->report->clearFilters();
            $report = $this->report->toArray();
            assert($report['class']=='MockReport');
            assert($report['resultSet']['headers'][0]=='name');
            assert($report['resultSet']['data'][0]['name'] == 'Josh Walker');
        });
    });

    describe('fromArray()',function(){
        it('should create a new report object from an array',function(){
            $compare = $this->report->toArray();
            $report = new MockReport($this->suite->getEmptyResultSet());
            $report->fromArray($compare);
            assert($report->toArray() == $this->report->toArray());
        });
    });

});