<?php
class Orm
{
    protected $id;
    protected $tableName;
    protected $conn;

    public function __construct($id, $table, PDO $conn)
    {
        $this->id = $id;
        $this->tableName = $table;
        $this->conn = $conn;
    }

    public function getAll()
    {
        $statementToExecute = $this->conn->prepare("SELECT * FROM {$this->tableName}");
        $statementToExecute->execute();
        return $statementToExecute->fetchAll();
    }

    public function getById($rowId)
    {
        $statementToExecute = $this->conn->prepare("SELECT * FROM {$this->tableName} WHERE {$this->id}=$rowId");
        $statementToExecute->execute();
        return $statementToExecute->fetch();
    }

    public function updateById($dataArray, $rowId)
    {
        $strForStm = "UPDATE {$this->tableName} SET ";
        foreach($dataArray as $key=>$value){
            $strForStm.="{$key}=:{$key},";
        }
        $strForStm=rtrim($strForStm,",");
        $strForStm.=" WHERE {$this->id}={$rowId}"; 
        //echo $strForStm;
       $stmExec = $this->conn->prepare($strForStm);
        foreach ($dataArray as $key => $value) {
            $stmExec->bindValue(":{$key}", $value);
        }
        $stmExec->execute();
    }

    public function deleteById($rowId)
    {
        $stmExec = $this->conn->prepare("DELETE FROM {$this->tableName} WHERE {$this->id} = {$rowId}");
        $stmExec->execute();
    }

    public function save($dataArray)
    {
        $strForStm = "INSERT INTO {$this->tableName} VALUES (null, ?,?,?,?)";
        $stmExec = $this->conn->prepare($strForStm);
        $stmExec->bindParam(1, $dataArray[0][0]);
        $stmExec->bindParam(2, $dataArray[0][1]);
        $stmExec->bindParam(3, $dataArray[0][2]);
        $stmExec->bindParam(4, $dataArray[0][3]);
        $stmExec->execute();
    }
}
