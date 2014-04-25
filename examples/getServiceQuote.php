<?php

/**
 * Returns credit quote and unit count for text based on content, tier, and
 * language pair for job or jobs submitted.
 */

require_once '../init.php';

// TODO: this example assumes you set the 2 values below.
$api_key = 'public_81912';
$private_key = 'private_81912';

// Get an instance of an Service Client
$service = Gengo_Api::factory('service', $api_key, $private_key);

$job1 = array(
        'type' => 'file',
        'file_key' => 'file_01',
        'lc_src' => 'en',
        'lc_tgt' => 'es',
        'tier' => 'standard',
        );

$files['file_01'] = 'examples/testfiles/test_file1.txt';

// The parameter is an array of jobs. If you set custom keys, they will be
// mirrored in the response. Otherwise, default numerical keying applies. This
// helps to keep track of which job corresponds to which quote.

$jobs = array('job_01' => $job1);

$service->quote($jobs, $files);

// Display server response.
echo $service->getResponseBody();

/**
 * Typical response: a list with unit count and credits the job would cost.
 {"opstat":"ok","response":{"jobs":{
    "key 1":{"unit_count":1,"credits":0.05},
    "key 2":{"unit_count":2,"credits":0.2}}}}j
 */

?>
