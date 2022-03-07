<?php
require "DB.php";
class Util extends DB
{
    public function login($email, $password)
    {
        $sql = "SELECT * FROM users";
        try {
            $conn = DB::getInstance();
            $stmt = $conn->prepare("SELECT * FROM users where email = '$email' AND password = '$password'");
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            if (count($res) == 1) {

                if($res[0]["type"] == "admin")
                {
                   // echo "admin block";
                     //now check if its admin is approved or not
                     if ($res[0]["approved"] == 1) 
                     {
                      session_start();
                      $_SESSION["id"] = $res[0]["id"];
                      $_SESSION["userName"] = $res[0]["userName"];
                      $_SESSION["user"] = $res[0]["email"];
                      $_SESSION["password"] = $res[0]["password"];
                      $_SESSION["type"] = $res[0]["type"];
                      $_SESSION["approved"] = $res[0]["approved"];
                      
                     return "okadmin";
                     } 
                     else 
                     {
                      return "notapproved";
                     }
                }
                else{

                     //now check if user is approved or not
                     if ($res[0]["approved"] == 1) 
                     {
                      session_start();
                      $_SESSION["id"] = $res[0]["id"];
                      $_SESSION["userName"] = $res[0]["userName"];
                      $_SESSION["user"] = $res[0]["email"];
                      $_SESSION["password"] = $res[0]["password"];
                      $_SESSION["type"] = $res[0]["type"];
                      $_SESSION["approved"] = $res[0]["approved"];
                      
                     return "okuser";
                     } 
                     else 
                     {
                      return "notapproved";
                     }
                }

                      
            } 
            else 
            {
                return "incorrect";
            }
        } catch (PDOException $e) {
            echo $e;
            return "error";
        }
    }
}
