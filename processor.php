<?php
session_start();
include_once("/var/www/html/beaty/php/class/Job.php");
include_once("/var/www/html/beaty/php/class/dbConnect.php");

if(isset($_FILES['file'])){
    try{
        if (($log = fopen("log.txt", "w")) === false) { //open a log file
            //if unable to open throw exception
            throw new RuntimeException("Log File Did Not Open.");
        }

        $today = new DateTime('now'); //create a date for now
        fwrite($log, $today->format("Y-m-d H:i:s") . PHP_EOL); //post the date to the log
        fwrite($log, "--------------------------------------------------------------------------------" . PHP_EOL); //post to log

        $name = $_FILES['file']['name']; //get file name
        fwrite($log, "FileName: $name" . PHP_EOL); //write to log
        $type = $_FILES["file"]["type"];//get file type
        fwrite($log, "FileType: $type" . PHP_EOL); //write to log
        $tmp_name = $_FILES['file']['tmp_name']; //get file temp name
        fwrite($log, "File TempName: $tmp_name" . PHP_EOL); //write to log
        $tempArr = explode(".", $_FILES['file']['name']); //set file name into an array
        $extension = end($tempArr); //get file extension
        fwrite($log, "Extension: $extension" . PHP_EOL); //write to log

        //If any errors throw an exception
        if (!isset($_FILES['file']['error']) || is_array($_FILES['file']['error'])) {
            fwrite($log, "Invalid Parameters - No File Uploaded." . PHP_EOL);
            throw new RuntimeException("Invalid Parameters - No File Uploaded.");
        }

        //switch statement to determine action in relationship to reported error
        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                fwrite($log, "No File Sent." . PHP_EOL);
                throw new RuntimeException("No File Sent.");
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                fwrite($log, "Exceeded Filesize Limit." . PHP_EOL);
                throw new RuntimeException("Exceeded Filesize Limit.");
            default:
                fwrite($log, "Unknown Errors." . PHP_EOL);
                throw new RuntimeException("Unknown Errors.");

        }

        //check file size
        if ($_FILES['file']['size'] > 2000000) {
            fwrite($log, "Exceeded Filesize Limit." . PHP_EOL);
            throw new RuntimeException('Exceeded Filesize Limit.');
        }

        //define accepted extensions and types
        $goodExts = array("txt", "csv");
        $goodTypes = array("text/plain", "text/csv", "application/vnd.ms-excel");

        //test to ensure that uploaded file extension and type are acceptable - if not throw exception
        if (in_array($extension, $goodExts) === false || in_array($type, $goodTypes) === false) {
            fwrite($log, "This page only accepts .txt and .csv files, please upload the correct format." . PHP_EOL);
            throw new Exception("This page only accepts .txt and .csv files, please upload the correct format.");
        }

        //move the file from temp location to the server - if fail throw exception
        $directory = "/var/www/html/beaty/Files";
        if (move_uploaded_file($tmp_name, "$directory/$name")) {
            fwrite($log, "File Successfully Uploaded." . PHP_EOL);

        } else {
            fwrite($log, "Unable to Move File to /Files." . PHP_EOL);
            throw new RuntimeException("Unable to Move File to /Files.");
        }

        //rename the file using todays date and time
        $month = $today->format("m");
        $day = $today->format('d');
        $year = $today->format('y');
        $time = $today->format('H-i-s');

        $newName = "$directory/BeatyData-$month-$day-$year-$time.$extension";
        if ((rename("$directory/$name", $newName))) {
            fwrite($log, "File Renamed to: $newName" . PHP_EOL);

        } else {
            fwrite($log, "Unable to Rename File: $name" . PHP_EOL);
            throw new RuntimeException("Unable to Rename File: $name");
        }

        //open the stream for file reading
        $handle = fopen($newName, "r");
        if ($handle === false) {
            fwrite($log, "Unable to Open Stream." . PHP_EOL);
            throw new RuntimeException("Unable to Open Stream.");
        } else {
            fwrite($log, "Stream Opened Successfully." . PHP_EOL);

        }

        $fileData = array();
        //read the data in line by line
        while (!feof($handle)) {
            $line_of_data = fgets($handle); //gets data from file one line at a time
            $line_of_data = trim($line_of_data); //trims the data
            $fileData[] = explode(",", $line_of_data); //breaks the line up into pieces that the array can store
        }

        //close file reading stream

        fclose($handle);
        //var_dump($fileData);
        $mysqli = MysqliConfiguration::getMysqli();
        $data = $fileData;
        $benecoArr = $perdiemArr = array();

        foreach($data as $key => $line){
            if(count($line) === 29){
                $jobId = trim($line[3]);
                $job = Job::getJobByJobId($mysqli, $jobId);
                $description = trim($line[28]);
                $dept = trim($line[2]);
                if($job !== null){
                    $beneco = $job->getBeneco();
                    $perdiem = $job->getPerdiem();
                    if($beneco){
                        $isLine = false;
                        $rate = '';

                        switch($description) {
                            case 'Bricklayer':
                                $rate = $job->getBricklayerMP();
                                $isLine = true;
                                break;
                            case 'Foreman':
                                $rate = $job->getForemanMP();
                                $isLine = true;
                                break;
                            case 'LB III':
                                $rate = $job->getLaborMP();
                                $isLine = true;
                                break;
                            case 'Fork Lift Op II':
                                $rate = $job->getOperatorMP();
                                $isLine = true;
                                break;
                            case 'Landscaper':
                                $rate = $job->getLandscaperMP();
                                $isLine = true;
                                break;
                            default:
                        }
                        if($isLine) {
                            $benecoArr[$line[0]][$jobId][$dept][] = array($line[0], $line[1], $line[2], $jobId, $line[4], 'M', 'P', $rate, $line[8], $line[9], $line[10], $line[11], $line[12], '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $line[28]);
                        }
                    }elseif($perdiem){
                        $isLine = false;
                        $rate = '';

                        switch($description) {
                            case 'Bricklayer':
                                $rate = $job->getBricklayerMP();
                                $isLine = true;
                                break;
                            case 'Foreman':
                                $rate = $job->getForemanMP();
                                $isLine = true;
                                break;
                            case 'LB III':
                                $rate = $job->getLaborMP();
                                $isLine = true;
                                break;
                            case 'Fork Lift Op II':
                                $rate = $job->getOperatorMP();
                                $isLine = true;
                                break;
                            default:
                        }
                        if($isLine) {
                            $rate = (float)$rate;
                            $hours = (float)$line[8];
                            $amount = $rate * $hours;
                            $roundedAmount = round($amount, 3);
                            /*if($jobId != '03-1622') {
                                $jobId = $jobId . "NC";
                            }*/
                            $perdiemArr[$line[0]][$jobId][$dept][] = array($line[0], $line[1], $line[2], $jobId, $line[4], 'E', '21', (string)$rate, '', $line[9], $line[10], $line[11], $line[12], '', (string) $roundedAmount, '', '', '', '', '', '', '', '', '', '', '', '', '', $line[28]);
                        }
                    }
                }
            }
        }
        $apprenticeArr = array();
        foreach($data as $key => $line){
            if(count($line) === 29) {
                $jobId = trim($line[3]);
                $job = Job::getJobByJobId($mysqli, $jobId);
                $description = trim($line[28]);

                if($job !== null){
                    $isLine = false;
                    $rate = '';
                    switch($description) {
                        case 'Bricklayer':
                            $rate = $job->getBricklayerM1();
                            $isLine = true;
                            break;
                        case 'LB III':
                            $rate = $job->getLaborM1();
                            $isLine = true;
                            break;
                        case 'Fork Lift Op II':
                            $rate = $job->getOperatorM1();
                            $isLine = true;
                            break;
                        default:
                    }
                    if($isLine && $rate !== '0.00') {
                        $apprenticeArr[$line[0]][$jobId][] = array($line[0], $line[1], $line[2], $jobId, $line[4], 'M', '1', $rate, $line[8], $line[9], $line[10], $line[11], $line[12], '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $line[28]);
                    }
                }
            }
        }
        //var_dump('BENECO',$benecoArr);
        //var_dump('PERDIEM', $perdiemArr);
        //var_dump('APPRENTICE', $apprenticeArr);

        $output = array();
        foreach($benecoArr as $ee => $array) {
            //var_dump($ee);
            foreach ($array as $jobId => $a){

                foreach($a as $dept => $arr) {
                    //var_dump($arr, count($arr));
                    //var_dump("**",$arr[0][9], $arr[0][10], $arr[0][11]);
                    $hoursSum = array_sum(array_column($arr, 8));
                    $output[] = array($arr[0][0], $arr[0][1], $arr[0][2], $arr[0][3], $arr[0][4], $arr[0][5], $arr[0][6], $arr[0][7], (string)$hoursSum, $arr[count($arr) - 1][9], $arr[count($arr) - 1][10], $arr[count($arr) - 1][11], '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $arr[0][28]);
                }
            }
        }


        foreach ($perdiemArr as $ee => $array) {
            //var_dump($ee);
            foreach ($array as $jobId => $a) {
                //var_dump($jobId);
                foreach($a as $dept => $arr){
                    //var_dump($dept, $arr);
                    $amountSum = array_sum(array_column($arr, 14));
                    $output[] = array($arr[0][0], $arr[0][1], $arr[0][2], $arr[0][3], $arr[0][4], $arr[0][5], $arr[0][6], $arr[0][7], $arr[0][8], $arr[count($arr) - 1][9], $arr[count($arr) - 1][10], $arr[count($arr) - 1][11], '', '', (string)$amountSum, '', '', '', '', '', '', '', '', '', '', '', '', '', $arr[0][28]);
                }
            }
        }


        foreach($apprenticeArr as $ee => $array){
            //var_dump($array);
            foreach($array as $jobId => $arr){
                    //var_dump($arr);
                    $sumHours = array_sum(array_column($arr, 8));
                    $output[] = array($arr[0][0], $arr[0][1], $arr[0][2], $arr[0][3], $arr[0][4], $arr[0][5], $arr[0][6], $arr[0][7], (string)$sumHours, $arr[count($arr) - 1][9], $arr[count($arr) - 1][10], $arr[count($arr) - 1][11], '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $arr[0][28]);

            }
        }

        //var_dump("OUTPUT", $output);

        foreach($fileData as $key => &$line){
           if(count($line) === 29) {
                $jobId = trim($line[3]);
                $job = Job::getJobByJobId($mysqli, $jobId);
                $description = trim($line[28]);
                if($job !== null){
                    if($description === "Bricklayer") {
                        $line[7] = $job->getBricklayerRate();
                    } elseif ($description === "Foreman") {
                        $line[7] = $job->getForemanRate();
                    } elseif ($description === "LB III") {
                        $line[7] = $job->getLaborRate();
                    } elseif ($description === "Fork Lift Op II") {
                        $line[7] = $job->getOperatorRate();
                    }
                }
            }
        }

        $today = new DateTime('now');
        $month = $today->format("m");
        $day = $today->format('d');
        $year = $today->format('y');
        $time = $today->format('H-i-s');


        $fileName = "/var/www/html/beaty/Files/Beaty_Processed_File_" .$month . "-" . $day . "-" . $year . "-" . $time . ".csv";
        $handle = fopen($fileName, 'wb');

        if($handle === false){
            throw(new RuntimeException("Unable to Open Stream for writing"));
        }
        foreach($fileData as $line){
            fputcsv($handle, $line);
        }
        foreach($output as $line){
            fputcsv($handle, $line);
        }

        fclose($handle);
        $_SESSION['output'] = "Successfully created File.";
        $_SESSION['fileName'] = $fileName;
        header("Location: format.php");

    } catch (Exception $e) {
        $_SESSION['output'] = $e->getMessage();
        header('Location: format.php?');

    }
}else{
    $_SESSION['output'] = "<p>No File Was Selected</p>";
    header('Location: format.php');
}

?>