<?php
session_start();
include_once ("/var/www/html/beaty/php/class/dbConnect.php");
include_once ("/var/www/html/beaty/php/class/Job.php");

$mysqli = MysqliConfiguration::getMysqli();

if(isset($_POST['submit'])) {
    $jobId = $_POST['jobId'];
    $desc = $_POST['desc'];
    $blRate = $_POST['blRate'];
    $blMP = $_POST['blMP'];
    $blM1 = $_POST['blM1'];
    $frRate = $_POST['frRate'];
    $frMP = $_POST['frMP'];
    $lbRate = $_POST['lbRate'];
    $lbMP = $_POST['lbMP'];
    $lbM1 = $_POST['lbM1'];
    $opRate = $_POST['opRate'];
    $opMP = $_POST['opMP'];
    $opM1 = $_POST['opM1'];
    $lsRate = $_POST['lsRate'];
    $lsMP = $_POST['lsMP'];
    $blApp1Rate = $_POST['blApp1Rate'];
    $blApp1MP = $_POST['blApp1MP'];
    $blApp1M1 = $_POST['blApp1M1'];
    $blApp2Rate = $_POST['blApp2Rate'];
    $blApp2MP = $_POST['blApp2MP'];
    $blApp2M1 = $_POST['blApp2M1'];
    $blApp3Rate = $_POST['blApp3Rate'];
    $blApp3MP = $_POST['blApp3MP'];
    $blApp3M1 = $_POST['blApp3M1'];
    $carpRate = $_POST['carpRate'];
    $carpMP = $_POST['carpMP'];
    $carpM1 = $_POST['carpM1'];
    $beneco = isset($_POST['beneco']) ? 1 : 0;
    $perdiem = isset($_POST['perdiem']) ? 1 : 0;

    try {
        $newJob = new Job(null, $jobId, $desc, $blRate, $blMP, $blM1, $frRate, $frMP, $lbRate, $lbMP, $lbM1, $opRate, $opMP, $opM1, $beneco, $perdiem, $lsRate, $lsMP, $blApp1Rate, $blApp1MP, $blApp1M1, $blApp2Rate, $blApp2MP, $blApp2M1, $blApp3Rate, $blApp3MP, $blApp3M1, $carpRate, $carpMP, $carpM1);
        $newJob->insert($mysqli);
        $_SESSION['output'] = $jobId . " / ". $desc ." has been inserted";
    }catch(Exception $e){
        $_SESSION['output'] = $jobId . " / ". $desc ." was not inserted: " . $e->getMessage();
    }

    header("Location: addJob.php");
}
else if(isset($_POST['submit1'])){
    $id = intval($_POST['idhidden']);
    $jobId= $_POST['jobId1'];
    $desc = $_POST['desc1'];
    $blRate = $_POST['blRate1'];
    $blMP = $_POST['blMP1'];
    $blM1 = $_POST['blM11'];
    $frRate = $_POST['frRate1'];
    $frMP = $_POST['frMP1'];
    $lbRate = $_POST['lbRate1'];
    $lbMP = $_POST['lbMP1'];
    $lbM1 = $_POST['lbM11'];
    $opRate = $_POST['opRate1'];
    $opMP = $_POST['opMP1'];
    $opM1 = $_POST['opM11'];
    $lsRate = $_POST['lsRate1'];
    $lsMP = $_POST['lsMP1'];
    $blApp1Rate = $_POST['blApp1Rate1'];
    $blApp1MP = $_POST['blApp1MP1'];
    $blApp1M1 = $_POST['blApp1M11'];
    $blApp2Rate = $_POST['blApp2Rate1'];
    $blApp2MP = $_POST['blApp2MP1'];
    $blApp2M1 = $_POST['blApp2M11'];
    $blApp3Rate = $_POST['blApp3Rate1'];
    $blApp3MP = $_POST['blApp3MP1'];
    $blApp3M1 = $_POST['blApp3M11'];
    $carpRate = $_POST['carpRate1'];
    $carpMP = $_POST['carpMP1'];
    $carpM1 = $_POST['carpM11'];
    $beneco = isset($_POST['beneco1']) ? 1 : 0;
    $perdiem = isset($_POST['perdiem1']) ? 1 : 0;
    try {

        $job = Job::getJobById($mysqli,$id);
        $job->setJobId($jobId);
        $job->setDescription($desc);
        $job->setBricklayerRate($blRate);
        $job->setBricklayerMP($blMP);
        $job->setBricklayerM1($blM1);
        $job->setForemanRate($frRate);
        $job->setForemanMP($frMP);
        $job->setLaborRate($lbRate);
        $job->setLaborMP($lbMP);
        $job->setLaborM1($lbM1);
        $job->setOperatorRate($opRate);
        $job->setOperatorMP($opMP);
        $job->setOperatorM1($opM1);
        $job->setLandscaperRate($lsRate);
        $job->setLandscaperMP($lsMP);
        $job->setBricklayerApprenticeIRate($blApp1Rate);
        $job->setBricklayerApprenticeIMP($blApp1MP);
        $job->setBricklayerApprenticeIM1($blApp1M1);
        $job->setBricklayerApprenticeIIRate($blApp2Rate);
        $job->setBricklayerApprenticeIIMP($blApp2MP);
        $job->setBricklayerApprenticeIIM1($blApp2M1);
        $job->setBricklayerApprenticeIIIRate($blApp3Rate);
        $job->setBricklayerApprenticeIIIMP($blApp3MP);
        $job->setBricklayerApprenticeIIIM1($blApp3M1);
        $job->setCarpenterRate($carpRate);
        $job->setCarpenterMP($carpMP);
        $job->setCarpenterM1($carpM1);
        $job->setBeneco($beneco);
        $job->setPerdiem($perdiem);

        $job->update($mysqli);
        $_SESSION['output'] = $jobId . " / ". $desc ." has been updated";
    }catch(Exception $e){
        $_SESSION['output'] = $jobId . " / ". $desc ." was not updated: " . $e->getMessage();
    }

    header("Location: addJob.php");

}else if(isset($_POST['submit2'])){
    //var_dump($_POST['idhiddenB']);
    $id = intval($_POST['idhiddenB']);

    try {
        $job = Job::getJobById($mysqli,$id);
        $jobId = $job->getJobId();
        $desc = $job->getDescription();

        $job->delete($mysqli);
        $_SESSION['output'] = $jobId . " / " . $desc . " has been deleted";
    }catch(Exception $e){
        $_SESSION['output'] = $jobId . " / " . $desc . " has not been deleted: " . $e->getMessage();
    }

    header("Location: addJob.php");
}