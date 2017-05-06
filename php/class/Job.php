<?php

/**
 * Created by PhpStorm.
 * User: ryan
 * Date: 3/23/2017
 * Time: 9:35 PM
 */
class Job
{
    private $id;
    private $jobId;
    private $description;
    private $bricklayerRate;
    private $bricklayerMP;
    private $bricklayerM1;
    private $foremanRate;
    private $foremanMP;
    private $laborRate;
    private $laborMP;
    private $laborM1;
    private $operatorRate;
    private $operatorMP;
    private $operatorM1;
    private $beneco;
    private $perdiem;

    public function __construct($newId, $newJobId, $newDesc, $newBLRate, $newBLMP, $newBLM1, $newFMRate, $newFMMP, $newLaborRate, $newLaborMP, $newLaborM1, $newOPRate, $newOPMP, $newOPM1, $newBeneco, $newPerdiem)
    {
        try{
            $this->setId($newId);
            $this->setJobId($newJobId);
            $this->setDescription($newDesc);
            $this->setBricklayerRate($newBLRate);
            $this->setBricklayerMP($newBLMP);
            $this->setBricklayerM1($newBLM1);
            $this->setForemanRate($newFMRate);
            $this->setForemanMP($newFMMP);
            $this->setLaborRate($newLaborRate);
            $this->setLaborMP($newLaborMP);
            $this->setLaborM1($newLaborM1);
            $this->setOperatorRate($newOPRate);
            $this->setOperatorMP($newOPMP);
            $this->setOperatorM1($newOPM1);
            $this->setBeneco($newBeneco);
            $this->setPerdiem($newPerdiem);

        }catch(UnexpectedValueException $unexpectedValue){
            throw(new UnexpectedValueException($unexpectedValue->getMessage(). ": Unable to Construct Job", 0, $unexpectedValue));
        }catch(RangeException $range){
            throw(new RangeException($range->getMessage() .": Unable to Construct Job", 0, $range));
        }

    }

    public function getId()
    {
        return $this->id;
    }

    public function getJobId()
    {
        return $this->jobId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getBricklayerRate()
    {
        return $this->bricklayerRate;
    }

    public function getBricklayerMP()
    {
        return $this->bricklayerMP;
    }

    public function getBricklayerM1()
    {
        return $this->bricklayerM1;
    }

    public function getForemanRate()
    {
        return $this->foremanRate;
    }

    public function getForemanMP()
    {
        return $this->foremanMP;
    }

    public function getLaborRate()
    {
        return $this->laborRate;
    }

    public function getLaborMP()
    {
        return $this->laborMP;
    }

    public function getLaborM1()
    {
        return $this->laborM1;
    }

    public function getOperatorRate()
    {
        return $this->operatorRate;
    }

    public function getOperatorMP()
    {
        return $this->operatorMP;
    }

    public function getOperatorM1()
    {
        return $this->operatorM1;
    }

    public function getBeneco()
    {
        return $this->beneco;
    }

    public function getPerdiem()
    {
        return $this->perdiem;
    }

    public function setId($id)
    {
        if($id === null){
            $this->id = null;
            return;
        }

        if(filter_var($id, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("Id $id is not numeric"));
        }

        $id = intval($id);
        if($id <= 0){
            throw(new RangeException("Id $id is not positive"));
        }

        $this->id = $id;

    }

    public function setJobId($jobId)
    {
        $jobId = trim($jobId);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]{2}-[0-9]{4}$/"));
        if(filter_var($jobId, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("JobId $jobId must be formatted as XX-XXXX using only numbers"));
        }
        $this->jobId = $jobId;
    }

    public function setDescription($description)
    {
        $description = trim($description);
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $this->description = $description;
    }

    public function setBricklayerRate($bricklayerRate)
    {
        $bricklayerRate = trim($bricklayerRate);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($bricklayerRate, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Bricklayer Rate $bricklayerRate must be formatted as 0.00 or 00.00 using only numbers"));
        }
        $this->bricklayerRate = $bricklayerRate;
    }

    public function setBricklayerMP($bricklayerMP)
    {
        $bricklayerMP = trim($bricklayerMP);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($bricklayerMP, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Bricklayer MP $bricklayerMP must be formatted as 0.000 or 00.000 using only numbers"));
        }
        $this->bricklayerMP = $bricklayerMP;
    }

    public function setBricklayerM1($bricklayerM1)
    {
        $bricklayerM1 = trim($bricklayerM1);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($bricklayerM1, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Bricklayer M1 $bricklayerM1 must be formatted as 0.00 or 00.00 using only numbers"));
        }
        $this->bricklayerM1 = $bricklayerM1;
    }

    public function setForemanRate($foremanRate)
    {
        $foremanRate = trim($foremanRate);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($foremanRate, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Foreman Rate $foremanRate must be formatted as 0.00 or 00.00 using only numbers"));
        }
        $this->foremanRate = $foremanRate;
    }

    public function setForemanMP($foremanMP)
    {
        $foremanMP = trim($foremanMP);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($foremanMP, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Foreman MP $foremanMP must be formatted as 0.000 or 00.000 using only numbers"));
        }
        $this->foremanMP = $foremanMP;
    }

    public function setLaborRate($laborRate)
    {
        $laborRate = trim($laborRate);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($laborRate, FILTER_VALIDATE_REGEXP, $filterOptions)=== false){
            throw(new RangeException("Labor Rate $laborRate must be formatted as 0.00 or 00.00 using only numbers"));
        }
        $this->laborRate = $laborRate;
    }

    public function setLaborMP($laborMP)
    {
        $laborMP = trim($laborMP);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($laborMP, FILTER_VALIDATE_REGEXP, $filterOptions)=== false){
            throw(new RangeException("Labor MP $laborMP must be formatted as 0.000 or 00.000 using only numbers"));
        }
        $this->laborMP = $laborMP;
    }

    public function setLaborM1($laborM1)
    {
        $laborM1 = trim($laborM1);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($laborM1, FILTER_VALIDATE_REGEXP, $filterOptions)=== false){
            throw(new RangeException("Labor M1 $laborM1 must be formatted as 0.00 or 00.00 using only numbers"));
        }
        $this->laborM1 = $laborM1;
    }

    public function setOperatorRate($operatorRate)
    {
        $operatorRate = trim($operatorRate);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($operatorRate, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Operator Rate $operatorRate must be formatted as 0.00 or 00.00 using only numbers"));
        }
        $this->operatorRate = $operatorRate;
    }

    public function setOperatorMP($operatorMP)
    {
        $operatorMP = trim($operatorMP);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($operatorMP, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Operator MP $operatorMP must be formatted as 0.000 or 00.000 using only numbers"));
        }
        $this->operatorMP = $operatorMP;
    }

    public function setOperatorM1($operatorM1)
    {
        $operatorM1 = trim($operatorM1);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+[.][0-9]+$/"));
        if(filter_var($operatorM1, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Operator M1 $operatorM1 must be formatted as 0.00 or 00.00 using only numbers"));
        }
        $this->operatorM1 = $operatorM1;
    }

    public function setBeneco($beneco)
    {
        if($beneco === 1 || $beneco === 0){
            $this->beneco = $beneco;
        }else{
            throw(new RangeException("Beneco $beneco may only have a value of 1 or 0"));
        }

    }

    public function setPerdiem($perdiem)
    {
        if($perdiem === 1 || $perdiem === 0) {
            $this->perdiem = $perdiem;
        }else{
            throw(new RangeException("Perdiem $perdiem may only have a value of 1 or 0"));
        }
    }

    public function insert(&$mysqli){
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }

        if($this->id !== null){
            throw(new mysqli_sql_exception("not a new Job"));
        }

        $query = "INSERT INTO job(jobId, description, bricklayerRate, bricklayerMP, bricklayerM1, foremanRate, foremanMP, laborRate, laborMP, laborM1, operatorRate, operatorMP, operatorM1, beneco, perdiem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }

        $wasClean = $statement->bind_param("sssssssssssssii",$this->jobId, $this->description, $this->bricklayerRate, $this->bricklayerMP, $this->bricklayerM1, $this->foremanRate, $this->foremanMP, $this->laborRate, $this->laborMP, $this->laborM1, $this->operatorRate, $this->operatorMP, $this->operatorM1, $this->beneco, $this->perdiem);
        if($wasClean === false){
            throw(new mysqli_sql_exception("Unable to bind parameters"));
        }

        if($statement->execute() === false){
            throw(new mysqli_sql_exception("unable to execute mySQL statement"));
        }

        $this->id = $mysqli->insert_id;
    }

    public function delete(&$mysqli){
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }

        if($this->id === null){
            throw(new mysqli_sql_exception("Unable to delete a Job that does not exist"));
        }

        $query = "DELETE FROM job WHERE id = ?";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }

        $wasClean = $statement->bind_param("i",$this->id);
        if($wasClean === false){
            throw(new mysqli_sql_exception("Unable to bind parameters"));
        }

        if($statement->execute() === false){
            throw(new mysqli_sql_exception("unable to execute mySQL statement"));
        }
    }

    public function update(&$mysqli){
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }

        if($this->id === null){
            throw(new mysqli_sql_exception("Unable to update a Job that does not exist"));
        }

        $query = "UPDATE job SET jobId = ?, description = ?, bricklayerRate = ?, bricklayerMP = ?, bricklayerM1 = ?, foremanRate = ?, foremanMP = ?, laborRate = ?, laborMP = ?, laborM1 = ?, operatorRate = ?, operatorMP = ?, operatorM1 = ?, beneco = ?, perdiem = ? WHERE id = ?";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }

        $wasClean = $statement->bind_param("sssssssssssssiii",$this->jobId, $this->description, $this->bricklayerRate, $this->bricklayerMP, $this->bricklayerM1, $this->foremanRate, $this->foremanMP, $this->laborRate, $this->laborMP, $this->laborM1, $this->operatorRate, $this->operatorMP, $this->operatorM1, $this->beneco, $this->perdiem, $this->id);
        if($wasClean === false){
            throw(new mysqli_sql_exception("Unable to bind parameters"));
        }

        if($statement->execute() === false){
            throw(new mysqli_sql_exception("unable to execute mySQL statement"));
        }
    }

    public static function getJobByJobId(&$mysqli, $jobId){
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }

        $jobId = trim($jobId);
        $jobId = filter_var($jobId, FILTER_SANITIZE_STRING);

        $query = "SELECT id, jobId, description, bricklayerRate, bricklayerMP, bricklayerM1, foremanRate, foremanMP, laborRate, laborMP, laborM1, operatorRate, operatorMP, operatorM1, beneco, perdiem FROM job WHERE jobId = ?";
        $statement = $mysqli->prepare($query);
        if($statement === false) {
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        // bind the email to the place holder in the template
        $wasClean = $statement->bind_param("s", $jobId);
        if($wasClean === false) {
            throw(new mysqli_sql_exception("Unable to bind parameters"));
        }
        // execute the statement
        if($statement->execute() === false) {
            throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
        }

        $result = $statement->get_result();
        if($result === false){
            throw(new mysqli_sql_exception("Unable to get result set"));
        }

        $row = $result->fetch_assoc();
        if($row !== null){
            try{
                $job = new Job($row["id"], $row["jobId"], $row["description"], $row["bricklayerRate"], $row["bricklayerMP"], $row["bricklayerM1"], $row["foremanRate"], $row["foremanMP"], $row["laborRate"], $row["laborMP"], $row["laborM1"], $row["operatorRate"], $row["operatorMP"], $row["operatorM1"], $row["beneco"], $row["perdiem"]);
            }catch(Exception $ex){
                throw(new mysqli_sql_exception("Unable to convert row to Job", 0, $ex));
            }

            return $job;
        }else{
            return (null);
        }


    }

    public static function getJobById(&$mysqli, $id){
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }

        if(filter_var($id, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("Id $id is not numeric"));
        }

        $id = intval($id);
        if($id <= 0){
            throw(new RangeException("Id $id is not positive"));
        }

        $query = "SELECT id, jobId, description, bricklayerRate, bricklayerMP, bricklayerM1, foremanRate, foremanMP, laborRate, laborMP, laborM1, operatorRate, operatorMP, operatorM1, beneco, perdiem FROM job WHERE id = ?";
        $statement = $mysqli->prepare($query);
        if($statement === false) {
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        // bind the email to the place holder in the template
        $wasClean = $statement->bind_param("s", $id);
        if($wasClean === false) {
            throw(new mysqli_sql_exception("Unable to bind parameters"));
        }
        // execute the statement
        if($statement->execute() === false) {
            throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
        }

        $result = $statement->get_result();
        if($result === false){
            throw(new mysqli_sql_exception("Unable to get result set"));
        }

        $row = $result->fetch_assoc();
        if($row !== null){
            try{
                $job = new Job($row["id"], $row["jobId"], $row["description"], $row["bricklayerRate"], $row["bricklayerMP"], $row["bricklayerM1"], $row["foremanRate"], $row["foremanMP"], $row["laborRate"], $row["laborMP"], $row["laborM1"], $row["operatorRate"], $row["operatorMP"], $row["operatorM1"], $row["beneco"], $row["perdiem"]);
            }catch(Exception $ex){
                throw(new mysqli_sql_exception("Unable to convert row to Job", 0, $ex));
            }

            return $job;
        }else{
            return (null);
        }


    }

    public static function getAllJobs(&$mysqli){
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("Input is not a valid mysqli object"));
        }

        $query = "SELECT id, jobId, description, bricklayerRate, bricklayerMP, bricklayerM1, foremanRate, foremanMP, laborRate, laborMP, laborM1, operatorRate, operatorMP, operatorM1, beneco, perdiem FROM job ORDER BY jobId ASC";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }

        if($statement->execute() === false){
            throw(new mysqli_sql_exception("Unable to execute mysqli statement"));
        }

        $result = $statement->get_result();

        if($result === false){
            throw(new mysqli_sql_exception("Unable to get result set"));
        }

        $jobArray = array();
        while(($row = $result->fetch_assoc()) !== null){

            try{
                $jobArray[] = new Job($row["id"], $row["jobId"], $row["description"], $row["bricklayerRate"], $row["bricklayerMP"], $row["bricklayerM1"], $row["foremanRate"], $row["foremanMP"], $row["laborRate"], $row["laborMP"], $row["laborM1"], $row["operatorRate"], $row["operatorMP"], $row["operatorM1"], $row["beneco"], $row["perdiem"]);
            }catch(Exception $exception){
                throw(new mysqli_sql_exception("Unable to convert row to Job Object", 0, $exception));
            }


        }
        if($result->num_rows === 0){
            return null;
        }else{
            return $jobArray;
        }
    }

}
?>