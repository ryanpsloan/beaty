<?php
include_once("/var/www/html/beaty/php/class/Job.php");
include_once("/var/www/html/beaty/php/class/dbConnect.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Jobs</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <script>
        $(document).ready(function() {
            var select = $("select[id='jobList']");
            var selectB = $("select[id='jobListB']");

            var id = $("input[id='id1']");
            var jobId = $("input[id='jobId1']");
            var jobDesc = $("input[id='desc1']");
            var blRate = $("input[id='blRate1']");
            var blMP = $("input[id='blMP1']");
            var blM1 = $("input[id='blM11']");
            var frRate = $("input[id='frRate1']");
            var frMP = $("input[id='frMP1']");
            var lbRate = $("input[id='lbRate1']");
            var lbMP = $("input[id='lbMP1']");
            var lbM1 = $("input[id='lbM11']");
            var opRate = $("input[id='opRate1']");
            var opMP = $("input[id='opMP1']");
            var opM1 = $("input[id='opM11']");
            var beneco = $("input[id='beneco1']");
            var perdiem = $("input[id='perdiem1']");
            var lsRate = $("input[id='lsRate1']");
            var lsMP = $("input[id='lsMP1']");
            var blApp1Rate = $("input[id='blApp1Rate1']");
            var blApp1MP = $("input[id='blApp1MP1']");
            var blApp1M1 =  $("input[id='blApp1M11']");
            var blApp2Rate = $("input[id='blApp2Rate1']");
            var blApp2MP = $("input[id='blApp2MP1']");
            var blApp2M1 =  $("input[id='blApp2M11']");
            var blApp3Rate = $("input[id='blApp3Rate1']");
            var blApp3MP = $("input[id='blApp3MP1']");
            var blApp3M1 =  $("input[id='blApp3M11']");
            var carpRate = $("input[id='carpRate1']");
            var carpMP = $("input[id='carpMP1']");
            var carpM1 = $("input[id='carpM11']");
            /*console.log(id);
            console.log(jobId);
            console.log(jobDesc);
            console.log(blRate);
            console.log(frRate);
            console.log(lbRate);
            console.log(opRate);
            console.log(lsRate);
            console.log(lsMP);*/

            select.on('change',function(){

                var data = $(this).find(':selected').data('id');
                var jId = $(this).find(':selected').data('job');
                var desc = $(this).find(':selected').data('desc');
                var bRate = $(this).find(':selected').data('blrate');
                var bMP = $(this).find(':selected').data('blmp');
                var bM1 = $(this).find(':selected').data('blm1');
                var fRate = $(this).find(':selected').data('frrate');
                var fMP = $(this).find(':selected').data('frmp');
                var lRate = $(this).find(':selected').data('lbrate');
                var lMP = $(this).find(':selected').data('lbmp');
                var lM1 = $(this).find(':selected').data('lbm1');
                var oRate = $(this).find(':selected').data('oprate');
                var oMP = $(this).find(':selected').data('opmp');
                var oM1 = $(this).find(':selected').data('opm1');
                var ben = $(this).find(':selected').data('beneco');
                var per = $(this).find(':selected').data('perdiem');
                var landRate = $(this).find(':selected').data('lsrate');
                var landMP = $(this).find(':selected').data('lsmp');
                var blApp1RateData = $(this).find(':selected').data('blapp1rate');
                var blApp1MPData = $(this).find(':selected').data('blapp1mp');
                var blApp1M1Data = $(this).find(':selected').data('blapp1m1');
                var blApp2RateData = $(this).find(':selected').data('blapp2rate');
                var blApp2MPData = $(this).find(':selected').data('blapp2mp');
                var blApp2M1Data = $(this).find(':selected').data('blapp2m1');
                var blApp3RateData = $(this).find(':selected').data('blapp3rate');
                var blApp3MPData = $(this).find(':selected').data('blapp3mp');
                var blApp3M1Data = $(this).find(':selected').data('blapp3m1');
                var carpRateData = $(this).find(':selected').data('carprate');
                var carpMPData = $(this).find(':selected').data('carpmp');
                var carpM1Data = $(this).find(':selected').data('carpm1');
                /*console.log(data);
                console.log(jId);
                console.log(desc);
                console.log(bRate);
                console.log(fRate);
                console.log(lRate);
                console.log(oRate);*/
                id.val(data);
                jobId.val(jId);
                jobDesc.val(desc);
                blRate.val(bRate);
                blMP.val(bMP);
                blM1.val(bM1);
                frRate.val(fRate);
                frMP.val(fMP);
                lbRate.val(lRate);
                lbMP.val(lMP);
                lbM1.val(lM1);
                opRate.val(oRate);
                opMP.val(oMP);
                opM1.val(oM1);
                lsRate.val(landRate);
                lsMP.val(landMP);
                blApp1Rate.val(blApp1RateData);
                blApp1MP.val(blApp1MPData);
                blApp1M1.val(blApp1M1Data);
                blApp2Rate.val(blApp2RateData);
                blApp2MP.val(blApp2MPData);
                blApp2M1.val(blApp2M1Data);
                blApp3Rate.val(blApp3RateData);
                blApp3MP.val(blApp3MPData);
                blApp3M1.val(blApp3M1Data);
                carpRate.val(carpRateData);
                carpMP.val(carpMPData);
                carpM1.val(carpM1Data);
                //console.log(landRate);
                //console.log(landMP);
                if(ben === 1){
                    beneco.prop('checked', true);
                }else{
                    beneco.prop('checked', false);
                }

                if(per === 1){
                    perdiem.prop('checked', true);
                }else{
                    perdiem.prop('checked', false);
                }
                $("input[id='idhidden']").val(data);
            });

            selectB.on('change', function(){
                var value = $(this).find(':selected').val();
                console.log("B",value);
                $("input[id='idhiddenB']").val(value);

            });
        });
    </script>
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"></a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<main>
    <div><?php if(isset($_SESSION['output'])){ echo $_SESSION['output']; $_SESSION['output'] = null; echo "<hr/>";} ?></div>
    <ul class="nav nav-tabs center" id="myTabs">
        <li class="active"><a data-toggle="tab" href="#home">Add Job</a></li>
        <li><a data-toggle="tab" href="#menu1">Update Job</a></li>
        <li><a data-toggle="tab" href="#menu2">Delete Job</a></li>
        <li><a data-toggle="tab" href="#menu3">View Job</a></li>
    </ul>
    <script>
        $(document).ready(function(){
            var tabList = $("ul.nav.nav-tabs.center > li > a");

            tabList.click(function(){

                var id = $(this).attr("href");
                localStorage.setItem('hash', id);
                //console.log(localStorage);


            });

            var hash = localStorage.getItem('hash');
            //console.log(has);
            $('#myTabs a[href="' + hash + '"]').tab('show');



        });

    </script>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active center">
            <h3>Add Job</h3>
            <p>All fields are required.</p>
            <p>Example: Job Id - 01-1418 / Job Description - Churchrock Elem / Bricklayer Rate - 22.85 / Foreman Rate - 24.85 / Labor Rate - 15.91 / Operator Rate - 29.07</p>
            <p>The page will not accept blank values for empty fields, instead use '0.00'</p>
            <form action="processJob.php" method="POST">
                <table>
                    <tr>
                        <td><label for="jobId">Job Id</label></td><td><input type="text" id="jobId" name="jobId" required></td>
                    </tr>
                    <tr>
                        <td><label for="desc">Job Description</label></td><td><input type="text" id="desc" name="desc" required></td>
                    </tr>
                    <tr>
                        <td><label for="blRate">Bricklayer Rate</label></td><td><input type="text" id="blRate" name="blRate" required></td>
                    </tr>
                    <tr>
                        <td><label for="blMP">Bricklayer MP</label></td><td><input type="text" id="blMP" name="blMP" required></td>
                    </tr>
                    <tr>
                        <td><label for="blM1">Bricklayer M1</label></td><td><input type="text" id="blM1" name="blM1" required></td>
                    </tr>
                    <tr>
                        <td><label for="frRate">Foreman Rate</label></td><td><input type="text" id="frRate" name="frRate" required></td>
                    </tr>
                    <tr>
                        <td><label for="frMP">Foreman MP</label></td><td><input type="text" id="frMP" name="frMP" required></td>
                    </tr>
                    <tr>
                        <td><label for="lbRate">Labor Rate</label></td><td><input type="text" id="lbRate" name="lbRate" required></td>
                    </tr>
                    <tr>
                        <td><label for="lbMP">Labor MP</label></td><td><input type="text" id="lbMP" name="lbMP" required></td>
                    </tr>
                    <tr>
                        <td><label for="lbM1">Labor M1</label></td><td><input type="text" id="lbM1" name="lbM1" required></td>
                    </tr>
                    <tr>
                        <td><label for="opRate">Operator Rate</label></td><td><input type="text" id="opRate" name="opRate" required></td>
                    </tr>
                    <tr>
                        <td><label for="opMP">Operator MP</label></td><td><input type="text" id="opMP" name="opMP" required></td>
                    </tr>
                    <tr>
                        <td><label for="opM1">Operator M1</label></td><td><input type="text" id="opM1" name="opM1" required></td>
                    </tr>
                    <tr>
                        <td><label for="lsRate">Landscaper Rate</label></td><td><input type="text" id="lsRate" name="lsRate" required></td>
                    </tr>
                    <tr>
                        <td><label for="lsMP">Landscaper MP</label></td><td><input type="text" id="lsMP" name="lsMP" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp1Rate">Bricklayer Apprentice I Rate</label></td><td><input type="text" id="blApp1Rate" name="blApp1Rate" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp1MP">Bricklayer Apprentice I MP</label></td><td><input type="text" id="blApp1MP" name="blApp1MP" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp1M1">Bricklayer Apprentice I M1</label></td><td><input type="text" id="blApp1M1" name="blApp1M1" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp2Rate">Bricklayer Apprentice II Rate</label></td><td><input type="text" id="blApp2Rate" name="blApp2Rate" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp2MP">Bricklayer Apprentice II MP</label></td><td><input type="text" id="blApp2MP" name="blApp2MP" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp2M1">Bricklayer Apprentice II M1</label></td><td><input type="text" id="blApp2M1" name="blApp2M1" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp3Rate">Bricklayer Apprentice III Rate</label></td><td><input type="text" id="blApp3Rate" name="blApp3Rate" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp3MP">Bricklayer Apprentice III MP</label></td><td><input type="text" id="blApp3MP" name="blApp3MP" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp3M1">Bricklayer Apprentice III M1</label></td><td><input type="text" id="blApp3M1" name="blApp3M1" required></td>
                    </tr>
                    <tr>
                        <td><label for="carpRate">Carpenter Rate</label></td><td><input type="text" id="carpRate" name="carpRate" required></td>
                    </tr>
                    <tr>
                        <td><label for="carpMP">Carpenter MP</label></td><td><input type="text" id="carpMP" name="carpMP" required></td>
                    </tr>
                    <tr>
                        <td><label for="carpM1">Carpenter M1</label></td><td><input type="text" id="carpM1" name="carpM1" required></td>
                    </tr>
                    <tr>
                        <td><label for="beneco">Beneco</label></td><td><input type="checkbox" id="beneco" name="beneco"></td>
                    </tr>
                    <tr>
                        <td><label for="perdiem">Perdiem</label></td><td><input type="checkbox" id="perdiem" name="perdiem"></td>
                    </tr>
                    <tr><td></td><td><input type="submit" value="Add Job" id="submit" name="submit"></td><td></td></tr>
                </table>
            </form>
        </div>
        <div id="menu1" class="tab-pane fade in center">
            <h3>Update Job</h3>
            <p>This page will not accept empty values, use '0.00' instead</p>
            <form action="processJob.php" method="POST">
                <select id="jobList" name="jobList">
                    <option value="None">None Selected</option>
                    <?php
                    try {
                        $mysqli = MysqliConfiguration::getMysqli();
                        $jobs = Job::getAllJobs($mysqli);

                        if ($jobs !== null) {
                            foreach ($jobs as $object) {
                                $id = $object->getId();
                                $jobId = $object->getJobId();
                                $jobDesc = $object->getDescription();
                                $blRate = $object->getBricklayerRate();
                                $blMP = $object->getBricklayerMP();
                                $blM1 = $object->getBricklayerM1();
                                $frRate = $object->getForemanRate();
                                $frMP = $object->getForemanMP();
                                $lbRate = $object->getLaborRate();
                                $lbMP = $object->getLaborMP();
                                $lbM1 = $object->getLaborM1();
                                $opRate = $object->getOperatorRate();
                                $opMP = $object->getOperatorMP();
                                $opM1 = $object->getOperatorM1();
                                $beneco = $object->getBeneco();
                                $perdiem = $object->getPerdiem();
                                $lsRate = $object->getLandscaperRate();
                                $lsMP = $object->getLandscaperMP();
                                $blApp1Rate = $object->getBricklayerApprenticeIRate();
                                $blApp1MP = $object->getBricklayerApprenticeIMP();
                                $blApp1M1 = $object->getBricklayerApprenticeIM1();
                                $blApp2Rate = $object->getBricklayerApprenticeIIRate();
                                $blApp2MP = $object->getBricklayerApprenticeIIMP();
                                $blApp2M1 = $object->getBricklayerApprenticeIIM1();
                                $blApp3Rate = $object->getBricklayerApprenticeIIIRate();
                                $blApp3MP = $object->getBricklayerApprenticeIIIMP();
                                $blApp3M1 = $object->getBricklayerApprenticeIIIM1();
                                $carpRate = $object->getCarpenterRate();
                                $carpMP = $object->getCarpenterMP();
                                $carpM1= $object->getCarpenterM1();

                                //var_dump($lsRate, $lsMP);
                                echo <<<HTML

                        <option data-id="$id" data-job="$jobId" data-desc="$jobDesc" data-blRate="$blRate" data-blMP="$blMP" data-blM1="$blM1" data-frRate="$frRate" data-frMP="$frMP" data-lbRate="$lbRate" data-lbMP="$lbMP" data-lbM1="$lbM1" data-opRate="$opRate" data-opMP="$opMP" data-opM1="$opM1" data-beneco="$beneco" data-perdiem="$perdiem" data-lsRate="$lsRate" data-lsMP="$lsMP" data-blApp1Rate="$blApp1Rate" data-blApp1MP="$blApp1MP" data-blApp1M1="$blApp1M1" data-blApp2Rate="$blApp2Rate" data-blApp2MP="$blApp2MP" data-blApp2M1="$blApp2M1" data-blApp3Rate="$blApp3Rate" data-blApp3MP="$blApp3MP" data-blApp3M1="$blApp3M1" data-carpRate="$carpRate" data-carpMP="$carpMP" data-carpM1="$carpM1" value="$jobId">$jobId / $jobDesc</option>

HTML;
                            }
                        }
                    }catch(Exception $e){
                        echo $e->getMessage();
                    }
                    ?></select>
                <input type="hidden" id="idhidden" name="idhidden" value="">

                <table>
                    <tr>
                        <td><label for="id1">Database Id</label><input type="text" id="id1" name="id1" disabled></td>
                        <td><label for="jobId1">Job Id</label><input type="text" id="jobId1" name="jobId1" required></td>
                        <td><label for="desc1">Description</label><input type="text" id="desc1" name="desc1" required></td>
                    </tr>
                    <tr>
                        <td><label for="blRate1">Bricklayer Rate</label><input type="text" id="blRate1" name="blRate1" required></td>
                        <td><label for="blMP1">Bricklayer MP</label><input type="text" id="blMP1" name="blMP1" required></td>
                        <td><label for="blM11">Bricklayer M1</label><input type="text" id="blM11" name="blM11" required></td>
                    </tr>
                    <tr>
                        <td><label for="frRate1">Foreman Rate</label><input type="text" id="frRate1" name="frRate1" required></td>
                        <td><label for="frMP1">Foreman MP</label><input type="text" id="frMP1" name="frMP1" required></td>
                    </tr>
                    <tr>
                        <td><label for="lbRate1">Labor Rate</label><input type="text" id="lbRate1" name="lbRate1" required></td>
                        <td><label for="lbMP1">Labor MP</label><input type="text" id="lbMP1" name="lbMP1" required></td>
                        <td><label for="lbM11">Labor M1</label><input type="text" id="lbM11" name="lbM11" required></td>
                    </tr>
                    <tr>
                        <td><label for="opRate1">Operator Rate</label><input type="text" id="opRate1" name="opRate1" required></td>
                        <td><label for="opMP1">Operator MP</label><input type="text" id="opMP1" name="opMP1" required></td>
                        <td><label for="opM11">Operator M1</label><input type="text" id="opM11" name="opM11" required></td>
                    </tr>
                    <tr>
                        <td><label for="lsRate1">Landscaper Rate</label><input type="text" id="lsRate1" name="lsRate1" required></td>
                        <td><label for="lsMP1">Landscaper MP</label><input type="text" id="lsMP1" name="lsMP1" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp1Rate1">Bricklayer Apprentice I Rate</label><input type="text" id="blApp1Rate1" name="blApp1Rate1" required></td>
                        <td><label for="blApp1MP1">Bricklayer Apprentice I MP</label><input type="text" id="blApp1MP1" name="blApp1MP1" required></td>
                        <td><label for="blApp1M11">Bricklayer Apprentice I M1</label><input type="text" id="blApp1M11" name="blApp1M11" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp2Rate1">Bricklayer Apprentice II Rate</label><input type="text" id="blApp2Rate1" name="blApp2Rate1" required></td>
                        <td><label for="blApp2MP1">Bricklayer Apprentice II MP</label><input type="text" id="blApp2MP1" name="blApp2MP1" required></td>
                        <td><label for="blApp2M11">Bricklayer Apprentice II M1</label><input type="text" id="blApp2M11" name="blApp2M11" required></td>
                    </tr>
                    <tr>
                        <td><label for="blApp3Rate1">Bricklayer Apprentice III Rate</label><input type="text" id="blApp3Rate1" name="blApp3Rate1" required></td>
                        <td><label for="blApp3MP1">Bricklayer Apprentice III MP</label><input type="text" id="blApp3MP1" name="blApp3MP1" required></td>
                        <td><label for="blApp3M11">Bricklayer Apprentice III M1</label><input type="text" id="blApp3M11" name="blApp3M11" required></td>
                    </tr>
                    <tr>
                        <td><label for="carpRate1">Carpenter Rate</label><input type="text" id="carpRate1" name="carpRate1" required></td>
                        <td><label for="carpMP1">Carpenter MP</label><input type="text" id="carpMP1" name="carpMP1" required></td>
                        <td><label for="carpM11">Carpenter M1</label><input type="text" id="carpM11" name="carpM11" required></td>
                    </tr>
                    <tr>
                        <td><label for="beneco1">Beneco</label><input type="checkbox" id="beneco1" name="beneco1"></td>
                        <td><label for="perdiem1">Perdiem</label><input type="checkbox" id="perdiem1" name="perdiem1"></td>
                    </tr>
                    <tr><td></td><td><input type="submit" value="Update Job" id="submit1" name="submit1"></td><td></td></tr>
                </table>
            </form>
        </div>
        <div id="menu2" class="tab-pane fade center">
            <h3>Delete Job</h3>
            <form action="processJob.php" method="POST">
                <table><tr><td>Select Job to Delete:</td><td>
                            <select id="jobListB" name="jobListB" required>
                                <option value="None">None Selected</option>
                                <?php
                                $mysqli = MysqliConfiguration::getMysqli();
                                $jobs = Job::getAllJobs($mysqli);

                                if($jobs !== null) {
                                    foreach ($jobs as $object) {

                                        $id = $object->getId();
                                        $jobId = $object->getJobId();
                                        $jobDesc = $object->getDescription();
                                        echo <<<HTML

                        <option value="$id">$jobId / $jobDesc</option>
HTML;


                                    }
                                }

                                ?></select></td>


                        <td><input type="submit" value="Delete Job" id="submit2" name="submit2"></td>
                    </tr>

                </table>
                <input type="hidden" id="idhiddenB" name="idhiddenB" value="">
            </form>
        </div>
        <div id="menu3" class="tab-pane fade in">
            <h3>View Jobs</h3>
            <table id="viewJobsTable">

                <?php
                $mysqli = MysqliConfiguration::getMysqli();
                $jobs = Job::getAllJobs($mysqli);
                if($jobs !== null) {
                    echo "<tr><td>Database Id</td><td>Job Id</td><td>Description</td><td>Bricklayer Rate</td><td>Bricklayer MP</td><td>Bricklayer M1</td><td>Foreman Rate</td><td>Foreman MP</td><td>Labor Rate</td><td>Labor MP</td><td>Labor M1</td><td>Operator Rate</td><td>Operator MP</td><td>Operator M1</td><td>Landscaper Rate</td><td>Landscaper MP</td><td>Beneco</td><td>Perdiem</td><td>Bricklayer Apprentice I Rate</td><td>Bricklayer Apprentice I MP</td><td>Bricklayer Apprentice I M1</td><td>Bricklayer Apprentice II Rate</td><td>Bricklayer Apprentice II MP</td><td>Bricklayer Apprentice II M1</td><td>Bricklayer Apprentice III Rate</td><td>Bricklayer Apprentice III MP</td><td>Bricklayer Apprentice III M1</td><td>Carpenter Rate</td><td>Carpenter MP</td><td>Carpenter M1</td></tr>";
                    foreach ($jobs as $object) {
                        $id = $object->getId();
                        $jobId = $object->getJobId();
                        $jobDesc = $object->getDescription();
                        $blRate = $object->getBricklayerRate();
                        $blMP = $object->getBricklayerMP();
                        $blM1 = $object->getBricklayerM1();
                        $frRate = $object->getForemanRate();
                        $frMP = $object->getForemanMP();
                        $lbRate = $object->getLaborRate();
                        $lbMP = $object->getLaborMP();
                        $lbM1 = $object->getLaborM1();
                        $opRate = $object->getOperatorRate();
                        $opMP = $object->getOperatorMP();
                        $opM1 = $object->getOperatorM1();
                        $beneco = $object->getBeneco();
                        $perdiem = $object->getPerdiem();
                        $lsRate = $object->getLandscaperRate();
                        $lsMP = $object->getLandscaperMP();
                        $blApp1Rate = $object->getBricklayerApprenticeIRate();
                        $blApp1MP = $object->getBricklayerApprenticeIMP();
                        $blApp1M1 = $object->getBricklayerApprenticeIM1();
                        $blApp2Rate = $object->getBricklayerApprenticeIIRate();
                        $blApp2MP = $object->getBricklayerApprenticeIIMP();
                        $blApp2M1 = $object->getBricklayerApprenticeIIM1();
                        $blApp3Rate = $object->getBricklayerApprenticeIIIRate();
                        $blApp3MP = $object->getBricklayerApprenticeIIIMP();
                        $blApp3M1 = $object->getBricklayerApprenticeIIIM1();
                        $carpRate = $object->getCarpenterRate();
                        $carpMP = $object->getCarpenterMP();
                        $carpM1= $object->getCarpenterM1();
                        if($beneco === 1){
                            $beneco = 'YES';
                        }else{
                            $beneco = 'NO';
                        }
                        if($perdiem === 1){
                            $perdiem = 'YES';
                        }else{
                            $perdiem = 'NO';
                        }
                        echo <<<HTML

                    <tr><td>$id</td><td>$jobId</td><td>$jobDesc</td><td>$blRate</td><td>$blMP</td><td>$blM1</td><td>$frRate</td><td>$frMP</td><td>$lbRate</td><td>$lbMP</td><td>$lbM1</td><td>$opRate</td><td>$opMP</td><td>$opM1</td><td>$lsRate</td><td>$lsMP</td><td>$beneco</td><td>$perdiem</td><td>$blApp1Rate</td><td>$blApp1MP</td><td>$blApp1M1</td><td>$blApp2Rate</td><td>$blApp2MP</td><td>$blApp2M1</td><td>$blApp3Rate</td><td>$blApp3MP</td><td>$blApp3M1</td><td>$carpRate</td><td>$carpMP</td><td>$carpM1</td></tr>
HTML;

                    }
                }else{
                    echo "<tr><td>No jobs to list</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

</main>
</body>
</html>