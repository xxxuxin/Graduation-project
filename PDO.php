<?php

 try {
   $dbName = "sqlsrv:Server=127.0.0.1;Database=lccee";   //������IP
   $dbUser = "sa";    //��½�˺�
   $dbPassword = "111111";    //��½����

   $db = new PDO($dbName, $dbUser, $dbPassword);   
    
   if ($db)   
  {       
     echo "��ϲ�㣡���ݿ����ӳɹ��ˣ���<br />";   
   }


     }
        catch (Exception $e){ echo "���ݿ�����ʧ�ܣ���";   }

?>

