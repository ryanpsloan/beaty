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
    private $foremanRate;
    private $laborRate;
    private $operatorRate;

    public function __construct($newId, $newJobId, $newDesc, $newBLRate, $newFMRate, $newLaborRate, $newOPRate)
    {
        try{
            $this->setId($newId);
            $this->setJobId($newJobId);
            $this->setDescription($newDesc);
            $this->setBricklayerRate($newBLRate);
            $this->setForemanRate($newFMRate);
            $this->setLaborRate($newLaborRate);
            $this->setOperatorRate($newOPRate);

        }catch(UnexpectedValueException $unexpectedValue){
            throw(new UnexpectedValueException("Unable to Construct Job", 0, $unexpectedValue));
        }catch(RangeException $range){
            throw(new RangeException("Unable to construct Job", 0, $range));
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

    public function getForemanRate()
    {
        return $this->foremanRate;
    }

    public function getLaborRate()
    {
        return $this->laborRate;
    }

    public function getOperatorRate()
    {
        return $this->operatorRate;
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
            throw(new RangeException("JobId must be formatted as XX-XXXX using only numbers"));
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
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+.[0-9]{2}$/"));
        if(filter_var($bricklayerRate, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Bricklayer Rate must be formatted as 00.00 using only numbers"));
        }
        $this->bricklayerRate = $bricklayerRate;
    }

    public function setForemanRate($foremanRate)
    {
        $foremanRate = trim($foremanRate);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+.[0-9]{2}$/"));
        if(filter_var($foremanRate, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Foreman Rate must be formatted as 00.00 using only numbers"));
        }
        $this->foremanRate = $foremanRate;
    }

    public function setLaborRate($laborRate)
    {
        $laborRate = trim($laborRate);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+.[0-9]{2}$/"));
        if(filter_var($laborRate, FILTER_VALIDATE_REGEXP, $filterOptions)=== false){
            throw(new RangeException("Labor Rate must be formatted as 00.00 using only numbers"));
        }
        $this->laborRate = $laborRate;
    }

    public function setOperatorRate($operatorRate)
    {
        $operatorRate = trim($operatorRate);
        $filterOptions = array("options" => array("regexp" => "/^[0-9]+.[0-9]{2}$/"));
        if(filter_var($operatorRate, FILTER_VALIDATE_REGEXP, $filterOptions) === false){
            throw(new RangeException("Operator Rate must be formatted as 00.00 using only numbers"));
        }
        $this->operatorRate = $operatorRate;
    }

    public function insert(&$mysqli){
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }

        if($this->id !== null){
            throw(new mysqli_sql_exception("not a new Job"));
        }

        $query = "INSERT INTO job(jobId, description, bricklayerRate, foremanRate, laborRate, operatorRate) VALUES (?,?,?,?,?,?)";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }

        $wasClean = $statement->bind_param("ssssss",$this->jobId, $this->description, $this->bricklayerRate, $this->foremanRate, $this->laborRate, $this->operatorRate);
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

        $query = "UPDATE job SET jobId = ?, description = ?, bricklayerRate = ?, foremanRate = ?, laborRate = ?, operatorRate = ? WHERE id = ?";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }

        $wasClean = $statement->bind_param("ssssssi",$this->jobId, $this->description, $this->bricklayerRate, $this->foremanRate, $this->laborRate, $this->operatorRate, $this->id);
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

        $query = "SELECT id, jobId, description, bricklayerRate, foremanRate, laborRate, operatorRate FROM job WHERE jobId = ?";
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
                $job = new Job($row["id"], $row["jobId"], $row["description"], $row["bricklayerRate"], $row["foremanRate"], $row["laborRate"], $row["operatorRate"]);
            }catch(Exception $ex){
                throw(new mysqli_sql_exception("Unable to convert row to Job", 0, $ex));
            }

            return $job;
        }else{
            return (null);
        }


    }

}
?>