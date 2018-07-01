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
            /*console.log(id);
            console.log(jobId);
            console.log(jobDesc);
            console.log(blRate);
            console.log(frRate);
            console.log(lbRate);
            console.log(opRate);*/


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
                var landRate = $(this).find(':selected').data('lsRate');
                var landMP = $(this).find(':selected').data('lsMP');
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
                console.log(ben);
                console.log(per);
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

                                echo <<<HTML

                        <option data-id="$id" data-job="$jobId" data-desc="$jobDesc" data-blRate="$blRate" data-blMP="$blMP" data-blM1="$blM1" data-frRate="$frRate" data-frMP="$frMP" data-lbRate="$lbRate" data-lbMP="$lbMP" data-lbM1="$lbM1" data-opRate="$opRate" data-opMP="$opMP" data-opM1="$opM1" data-beneco="$beneco" data-perdiem="$perdiem" value="$jobId">$jobId / $jobDesc</option>

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
                    echo "<tr><td>Database Id</td><td>Job Id</td><td>Description</td><td>Bricklayer Rate</td><td>Bricklayer MP</td><td>Bricklayer M1</td><td>Foreman Rate</td><td>Foreman MP</td><td>Labor Rate</td><td>Labor MP</td><td>Labor M1</td><td>Operator Rate</td><td>Operator MP</td><td>Operator M1</td><td>Beneco</td><td>Perdiem</td></tr>";
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

                    <tr><td>$id</td><td>$jobId</td><td>$jobDesc</td><td>$blRate</td><td>$blMP</td><td>$blM1</td><td>$frRate</td><td>$frMP</td><td>$lbRate</td><td>$lbMP</td><td>$lbM1</td><td>$opRate</td><td>$opMP</td><td>$opM1</td><td>$beneco</td><td>$perdiem</td></tr>
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