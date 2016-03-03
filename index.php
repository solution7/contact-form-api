<?php
include("config.php");
include("function.php");

if(isset($_GET['edit'])){
  $qry="select name from contact_form where id='".$_GET['edit']."'";
  $row=edited($qry);
}

if(isset($_GET['delete'])){
  $del1="delete from contact_form where id='".$_GET['delete']."'";
  $del2="delete from contact_form_field where contact_form_id='".$_GET['delete']."'";
  del($del1)& del($del2);
  //header("location:index.php");
}

if(isset($_REQUEST['update'])){
  if(empty($_GET['edit'])){
    echo "Which name you want to edit/update";
  }
  else{
  $Qry="update contact_form set name='".$_REQUEST['name']."' where id='".$_REQUEST['edit']."'";
  update($Qry);
  //header("location:index.php");
}
}

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  if(empty($name)){
    echo "please insert name";
    }
  else{
    $data="insert into contact_form(name)values('$name')";
    $message =add($data)?"data inserted successfully":"error";
    echo $message;
    }
}

?>

<html>
  <title>Contact form</title>
   <body>
     <form method="post" action="">
          Name<input type="text" name="name" value="<?php if(isset($row['name'])){echo $row['name'];}?>">
          <input type="submit" name="submit" value="save">
          <input type="submit" name="update" value="update">
      </form>

    <table border=2 width=auto>
      <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>Manage Field</th>
      </tr>
  <?php
      $fetchqry="select * from contact_form";
      $fetch_data=fetch($fetchqry);
      foreach($fetch_data as $key=>$row){
  ?>
        <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['name'];?></td>
          <td><a href=?edit=<?php echo $row['id'];?>>Edit</a></td>
          <td><a href=?delete=<?php echo $row['id'];?>>Delete</a></td>
          <td><a href=manage.php?manage=<?php echo $row['id'];?>>Manage field</a></td>
        </tr>
    <?php }?>
    </table>
    </body>
</html>
