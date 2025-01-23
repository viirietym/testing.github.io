<?php

$jobDetailquery = "SELECT jobdetail.jobDetailID, jobdetail.jobTitle, jobdetail.jobLocation, jobdetail.salaryRate, jobdetail.experienceLevel, jobdetail.jobIndustry, 
LEFT(jobdetail.jobSkillsDescription, 100) , LEFT(jobdetail.fullDescription, 100) 
AS shortenedDesc, jobdetail.companyName, jobdetail.jobSkillsDescription, jobdetail.fullDescription, post.datePosted 
FROM jobdetail LEFT JOIN post ON jobdetail.jobDetailID = post.jobDetailID;";



$jobDetailresult = executeQuery($jobDetailquery);

$jobTitle = '';
$salaryRate = '';
$expLevel = '';
$companyName = '';
$location = '';
$industry = '';
$skillRequirements = '';
$jobDescription = '';
$datePosted = '';

$salary = isset($_GET['salary']) ? $_GET['salary'] : null;
$industry = isset($_GET['industry']) ? $_GET['industry'] : null;
$location = isset($_GET['location']) ? $_GET['location'] : null;
$expLevel = isset($_GET['expLevel']) ? $_GET['expLevel'] : null;
$datePosted = isset($_GET['datePosted']) ? $_GET['datePosted'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'datePosted';
$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';

$search = isset($_GET['search']) ? trim($_GET['search']) : null;

$jobEntry = "SELECT jobdetail.*, post.userID, post.datePosted 
             FROM jobdetail 
             INNER JOIN post ON jobdetail.jobDetailID = post.jobDetailID 
             WHERE 1=1";


if (!empty($search)) {
    $jobEntry .= " AND jobdetail.jobTitle LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
}

if ($salary) {
    $salaryMap = [
        'Below 10,000 php' => 'jobdetail.salaryRate < 10000',
        '10,000 - 30,000 php' => 'jobdetail.salaryRate BETWEEN 10000 AND 30000',
        'Above 30000' => 'jobdetail.salaryRate > 30000',
    ];
    $salaryCondition = isset($salaryMap[$salary]) ? $salaryMap[$salary] : null;
    if ($salaryCondition) {
        $jobEntry .= " AND $salaryCondition";
    }
}

if ($industry) {
    $industryMap = [
        'it' => 'Information Technology',
        'business' => 'Business and Administration',
        'manufacturing' => 'Manufacturing and Logistics',
    ];
    $industryValue = isset($industryMap[$industry]) ? $industryMap[$industry] : null;
    if ($industryValue) {
        $jobEntry .= " AND jobdetail.jobIndustry LIKE '%$industryValue%'";
    }
}

if ($location) {
    $locationMap = [
        'san_antonio' => 'San Antonio',
        'san_vicente' => 'San Vicente',
        'san_roque' => 'San Roque',
        'san_miguel' => 'San Miguel',
        'san_pedro' => 'San Pedro',
    ];
    $locationValue = isset($locationMap[$location]) ? $locationMap[$location] : null;
    if ($locationValue) {
        $jobEntry .= " AND jobdetail.jobLocation LIKE '%$locationValue%'";
    }
}

if ($expLevel) {
    $expLevelMap = [
        'entry' => 'Entry Level',
        'mid' => 'Mid Level',
        'senior' => 'Senior Level',
    ];
    $expLevelValue = isset($expLevelMap[$expLevel]) ? $expLevelMap[$expLevel] : null;
    if ($expLevelValue) {
        $jobEntry .= " AND jobdetail.experienceLevel LIKE '%$expLevelValue%'";
    }
}

if ($datePosted) {
    $jobEntry .= " AND post.datePosted >= DATE_SUB(CURDATE(), INTERVAL $datePosted DAY)";
}


$sortColumnMap = [
    'datePosted' => 'post.datePosted',
    'salary' => 'jobdetail.salaryRate',
];
$sortColumn = isset($sortColumnMap[$sort]) ? $sortColumnMap[$sort] : 'post.datePosted';
$jobEntry .= " ORDER BY $sortColumn $order";

// Execute the query
$fetchJobEntry = executeQuery($jobEntry);

?>