<?php
include("../Connection/Connection.php");
session_start();

    $insQry="insert into tbl_chat (from_userid,to_userid,chat_content,chat_datetime) values('".$_SESSION["uid"]."','".$_GET["id"]."','".$_GET["chat"]."',DATE_FORMAT(sysdate(), '%M %d %Y, %h:%i %p'))";
    if($con->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
    }
    $selQry="SELECT * from tbl_chatlist where (from_id='".$_SESSION['uid']."' or to_id='".$_SESSION['uid']."') and (from_id='".$_GET["id"]."' or to_id='".$_GET["id"]."')";
    $result=$con->query($selQry);
    if($result->num_rows>0)
    {
         $updQry="UPDATE tbl_chatlist set chat_content='".$_GET['chat']."', chat_datetime=CURRENT_TIMESTAMP() where (from_id='".$_SESSION['uid']."' or to_id='".$_SESSION['uid']."') and (from_id='".$_GET["id"]."' or to_id='".$_GET["id"]."')";
        if($con->query($updQry))
        {
            echo "List Updated";
        }
        else
        {
            echo "List Updation failed";
        } 
    }
    else
    {
         $insQryL="insert into tbl_chatlist(from_id, to_id, chat_content, chat_datetime, chat_type) values('".$_SESSION['uid']."','".$_GET['id']."','".$_GET['chat']."',CURRENT_TIMESTAMP(), 'USER')";
        if($con->query($insQryL))
        {
            echo "List Inserted";
        }
        else
        {
            echo "List Insertion Failed";
        }
    }
    
?>