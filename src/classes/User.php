<?php
require "DB.php";
class User extends DB
{
    public string $username;
    public string $password;
    public string $email;

    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function addUser()
    {
        $sql = "INSERT INTO `users` (`id`, `userName`, `email`, `password`, `type`, `approved`) VALUES (NULL,'$this->username', '$this->email', '$this->password', 'customer', '0')";
        try {
            DB::getInstance()->exec($sql);
          // return true;
         // header("location:customers.php");
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }



//display user and apply pagination in customer field
    public static function user_display()
    {
        $sql1 = "select count(*) from users";
        $total_records = DB::getInstance()->query($sql1)->fetchColumn();
        $limit = 3;
        $total_page = ceil($total_records / $limit);

        if(isset($_GET["page"]))
        {
        $current_page = $_GET["page"];
        }
        else{
            $current_page = 1;
        }
        $offset= ($current_page - 1) * $limit;

        $sql = "select * from users LIMIT $offset , $limit";
        $data = DB::getInstance()->query($sql);
        $html = "<br>";
        $btn1= "";
        
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            if ($row->approved == '1')
            {
                $btn1 = "<form action='adminApproval.php' method='get'><input type=hidden name='uid' value='$row->id'><button class='btn btn-success' type='submit' name='btnid' value='$row->approved'>Approved</button> </form>";
            }
            else{
                $btn1 = "<form action='adminApproval.php' method='get'><input type=hidden name='uid' value='$row->id'><button class='btn btn-warning' type='submit' name='btnid' value='$row->approved'>Pending</button> </form>";
            }
            $html.= '<tr><td>'.$row->id.'</td><td>'.$row->userName.'</td><td>'.$row->email.'</td><td>'.$row->password.'</td><td>'.$row->type.'</td><td>'.$btn1.'</td><td><a href = "../editUser.php?id='.$row->id.'">EDIT</a>&nbsp;&nbsp;<a href = "../delete_user.php?id='.$row->id.'">DELETE</a></td>
            </tr>';
        }
        $html .= '<nav aria-label="Page navigation example"><ul class="pagination">';
        if($current_page > 1)
        {
            $html .= '<li class="page-item"><a class="page-link" href="customers.php?page='.($current_page-1).'">Previous</a></li>';
        }
        for($i=1 ; $i<= $total_page; $i++)
        {
            if($i == $current_page)
            {
                $active = "active";
            }
            else
            {
                $active = "";
            }
          $html .='<li class="page-item '.$active.'"><a class="page-link" href="customers.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($current_page < $total_page)
        {
            $html .= '<li class="page-item"><a class="page-link" href="customers.php?page='.($current_page+1).'">Next</a></li>';
        }
        $html .= '</ul> </nav>';
        echo $html;

    }




    public static function delete($id)
    {
      echo "i am inside delete function";
      echo "id = $id";

      $sql = "DELETE FROM users WHERE id=$id";
      echo $sql;
      DB::getInstance()->query($sql);
      header("location:customers.php");


    }



    public static function updateUser($uid ,$uname, $uemail, $upassword)
    {
       $sql = "UPDATE users SET userName = '$uname', email= '$uemail', password= '$upassword' WHERE id = '$uid'";
       $data = DB::getInstance()->query($sql);
       header("location:customers.php");
  
    }


}
