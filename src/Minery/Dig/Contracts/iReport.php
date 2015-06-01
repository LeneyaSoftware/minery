<?php
/**
 * Interface iReport
 *
 * All reports that need to interface with Minery should implement this report. The function ->run() is what is
 * required to run a report, and any report should implement run.
 *
 * @author Joshua Walker
 * @version 5/27/15
 */

namespace Minery\Dig\Contracts;

interface iReport {

    /**
     * Runs the report
     */
    public function run();
} 