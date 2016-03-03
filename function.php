<?php
function add($data){
      return mysql_query($data);
}
function del($del1){
  return mysql_query($del1);
}

function update($qry){
  return mysql_query($qry);
}


function fetch($fqry){
    $data=array();
    $qry=mysql_query($fqry);
    while(($row=mysql_fetch_assoc($qry))!=null)
    $data[]=$row;
    return $data;
}


function edited($query){
    $data=mysql_query($query);
    $edit=mysql_fetch_assoc($data);
    return $edit;
}

function duplicate($qry){
  $data=mysql_query($query);
  $edit=mysql_num_rows($data);
  return $edit;
}
/*
function edit($edit){
    $id=$_GET['edit'];
    $qry="select * from contact_form where id=$id";
    $query=mysql_query($qry);
    if($result=mysql_fetch_assoc($query)){
    $name=$result['name'];
    return $name;
    }
}
*/
/*function update(){
  $id=$_GET['edit'];
  $qry="update contact_form set name='".$_REQUEST['name']."' where id=$id";
  $query=mysql_query($qry);
  return $query;
}
*/

/*function del(){
    $del=$_GET['delete'];
    $delete="delete from contact_form where id=$del";
    return mysql_query($delete);
}
*/
?>
