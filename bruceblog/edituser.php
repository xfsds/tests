<?php
include 'header.php';

echo <<<END

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">�û�����</li>
              <li class="active"><a href="createuser.php">�½��û�</a></li>
              <li><a href="userlist.php">�û��б�</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">
END;

$username = $password = $email = $stauts=$remark=$error= "";

if (isset($_POST['username']))
 {
	$username = sanitizeString ( $_POST ['username'] );
	$password = sanitizeString ( $_POST ['password'] );
	$email = sanitizeString ( $_POST ['email'] );
	$status = sanitizeString ( $_POST ['status'] );
	$remark = sanitizeString ( $_POST ['remark'] );
	
	
	if ($username == "" || $password == "" || $status == "")
		$error = "�����ֶβ���Ϊ��";
	else {
		queryMysql ( "update user set password = '$password',email='$email',status='$status',remark ='$remark' where account='$username' " );
		$error = "�û��޸ĳɹ�";
			//redirect('userlist.php');
	}
}
else
{
	if(isset($_GET['account']))
	{
		$username = sanitizeString ( $_GET['account'] );
	
		if ($username == "") {
			$error = "����Ϊ�գ�";
		} else {
			$query = " select account,nickname,email,status,remark  from user where account = '$username'";
	
			$result = queryMysql($query);
			if (mysql_num_rows($result))
			{
				$row  = mysql_fetch_row($result);
				$username = stripslashes($row[0]);
				$password = stripslashes($row[1]);
				$email =  stripslashes($row[2]);
				$stauts=  stripslashes($row[3]);
				$remark= stripslashes($row[4]);
			}
			else $error = "��ѯ�������û���";
	
		}
	}
}
		
		
echo <<<END
<div class="well">
<form class="form-horizontal" action='edituser.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">�޸��û�</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">����</label>
      <div class="controls">
        <input type="text" id="username" name="username" value="$username" placeholder="" class="input-xlarge" >
        <p class="help-block"></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">����</label>
      <div class="controls">
        <input type="password" id="password" name="password" value="$password" placeholder="" class="input-xlarge" required>
        <p class="help-block">����������</p>
      </div>
    </div>
 
	    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">����</label>
      <div class="controls">
        <input id="email" name="email" value="$email" placeholder="" class="input-xlarge" type="email">
        <p class="help-block">����������</p>
      </div>
    </div>

    <div class="control-group">
		  <label class="control-label" for="status" >״̬</label>
          <div class="controls">
            <select id="status" name="status" class="input-xlarge">
              <option value="1">����</option>
              <option value="0">ͣ��</option>
            </select>
          </div>
	</div>
		
   <div class="control-group">
      <!-- remark -->
      <label class="control-label"  for="remark">��ע</label>
	  <div class="controls">
        <textarea rows="4" class="" id="remark" name="remark" value="$remark" placeholder="" > </textarea>
		<p class="help-block">�����뱸ע��Ϣ</p>
      </div>
    </div>
		
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit" class="btn btn-primary">��  ��</button> &nbsp;&nbsp;
        <a class="btn" href='userlist.php'>�� ��</a>
        <span class='error'>$error</span> 
      </div>
    </div>
  </fieldset>
</form>
</div>

END;

include 'bottom.php';
?>