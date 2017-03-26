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
        //read first line headers
        $headers = fgets($handle);

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

        foreach($fileData as $key => &$line){

            if(count($line) === 29) {
                $job = Job::getJobByJobId($mysqli, trim($line[3]));
                if (trim($line[28]) === "BL" || $line[28] === "bl") {
                    $line[7] = $job->getBricklayerRate();
                } elseif ($line[28] === "BF" || $line[28] === "bf") {
                    $line[7] = $job->getForemanRate();
                } elseif ($line[28] === "L" || $line[28] === "l") {
                    $line[7] = $job->getLaborRate();
                } elseif ($line[28] === "LO" || $line[28] === "lo") {
                    $line[7] = $job->getOperatorRate();
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