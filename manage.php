<?php
include("config.php");
include("function.php");


if(isset($_GET['edit'])){
  $edit=$_GET['edit'];
  $qry="select * from contact_form_field where id=$edit";
  $row=edited($qry);
}

if(isset($_GET['delete'])){
  $del=$_GET['delete'];
  $Del="delete from contact_form_field where id=$del";
  del($Del);
}

if(isset($_REQUEST['update'])){
    if(empty($_POST['name'])){
      echo "which Field name you want to edit/update";
      }
    else{
      $Qry="update contact_form_field set field_name='".$_REQUEST['name']."',field_type='".$_REQUEST['type']."' where id='".$_REQUEST['edit']."'";
      update($Qry);
      }
    }

if(isset($_POST['submit'])){
      $field=$_POST['name'];
      $type=$_POST['type'];
      $manage=$_GET['manage'];
    if(empty($field)){
      echo "please insert Field name";
    }
    else{
      $data="insert into contact_form_field(field_name,field_type,contact_form_id)values('$field','$type','$manage')";
      $message =add($data)?"form field inserted successfully": "error";
      echo $message;
      }
}
?>

<html>
  <title>Contact form</title>
    <body>
        <form method="post" action="">
          Form field<input type="text" name="name" value="<?php if(isset($row['field_name'])){echo $row['field_name'];};?>">
              <select name="type">
                  <option value="text">Text</option>
                  <option value="email">Email</option>
                  <option value="textarea">Text area</option>
              </select>
                    <input type="submit" name="submit" value="save">
                    <input type="submit" name="update" value="update">
        </form>

    <table border=2 width=auto>
      <tr>
          <th>Field Name</th>
          <th>Field Type</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
  <?php
      $manage=$_GET['manage'];
      $fetchqry="select * from contact_form_field";
      $fetch_data=fetch($fetchqry);
      foreach($fetch_data as $key=>$row){
        if($manage==$row['contact_form_id']){
      ?>
        <tr>
          <td><?php echo $row['field_name']?></td>
          <td><?php echo $row['field_type']?></td>
          <td><a href="?edit=<?php echo $row['id'];?>&manage=<?php echo $manage;?>">Edit</a></td>
          <td><a href="?delete=<?php echo $row['id'];?>&manage=<?php echo $manage;?>">Delete</a></td>
        </tr>
    <?php }} ?>
    </table>
    <a href="index.php">Return to homepage</a>
    </body>
</html>
