<?php 

class DatabaseManager
{
    // These are private: only this class needs them
    private string $host;
    private string $user;
    private string $password;
    private string $dbname;
    // This one is public, so we can use it outside of this class
    // We could also use a private variable and a getter (but let's not make things too complicated at this point)
    public PDO $connection;

    public function __construct(string $host, string $user, string $password, string $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect():void
    {
        try{
        // TODO: make the connection to the database
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $this->connection = new PDO($dsn,$this->user,$this->password);
        //we need to set the attributes of the connection
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connection established!!!";
    }
    catch (PDOException $ex) {
        echo "Connection Error -->>", $ex->getMessage();
        echo "<br>Error Code -->>", $ex->getCode();
        echo "<br>Error occur in File -->>", $ex->getFile();
        echo "<br>Error occur in Line on -->>", $ex->getLine();

    }
}

}

