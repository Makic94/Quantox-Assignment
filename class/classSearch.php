<?php
include_once("classBase.php");
class Search{
    public function research($search)
        {
            $clean_search=filter_var($search, FILTER_SANITIZE_STRING);
            if($clean_search!="")
                {
                            $db=new Base();
                            if(!$db->connect())exit();
                            $upit="SELECT * FROM users WHERE username LIKE '%$clean_search%'";
                            $rez=$db->query($upit);
                            $rows=$db->num_rows($rez);
                            if($rows!=0)
                                {
                                    $i=1;
                                    echo "<p>Found $rows users in total:</p>";
                                    while($red=$db->fetch_object($rez))
                                        {
                                            echo "User number $i: ".$red->username."<br>";
                                            $i++;
                                        }
                                }
                            else echo "Unknown username, please try again.</p>";
                }
            else echo "<p>Invalid search, please try again.</p>";
        }
}
?>