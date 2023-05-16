<?php
    include("models.php");
    $conn = DB::DbConnect("localhost","root","");
    if(isset($_COOKIE['currentDB'])){
      DB::UseDataBase($conn,$_COOKIE['currentDB']);
    }
    if(!is_a($conn,"mysqli")){
        echo "<p>Failed to connection. Error: $conn<p>";
    }
    if(isset($_POST['createDB'])&&isset($_POST['dbName'])){
        if(!DB::CreateDataBase($conn,$_POST['dbName'])){
            echo "<p>Create database failed</p>";
        }
        else{
            DB::UseDataBase($conn,$_POST['dbName']);
        };
        setcookie("currentDB", $_POST['dbName']);
    }
    if(isset($_POST['connectDB'])&&isset($_POST['dbName'])){
            DB::UseDataBase($conn,$_POST['dbName']);
            setcookie("currentDB", $_POST['dbName']);
    }
    if(isset($_POST['createTable'])&&isset($_POST['tableName'])){
      $props = [];
      for ($i=0; $i < 100; $i++) { 
        if(isset($_POST["prop$i"])){
          $props[] = $_POST["prop$i"];
        }
        else{
          break;
        }
      }
     DB::CreateTable($conn,$_POST['tableName'],$props);
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <main>
    <p>Current db: <b><?php print_r(DB::CurrentDataBase($conn))?></b></p>
    <h4>Create / connect database</h4>
    <form action="" method="post">
        <input name='dbName' placeholder="DataBase name">
        <input type="submit" name="createDB" value="Create DataBase">
        <input type="submit" name="connectDB" value="Connect DataBase">
    </form>
    <hr/>
    <h4>Create table</h4>
    <form id="createTableForm" action="" method="post">
      <input type="text" name="tableName" placeholder="Table name">
      <div>
        <input id="propName" placeholder="Property name">
        <select id="propType">
          <optgroup label="Integer">
            <option value="TINYINT">tiny int</option>
            <option value="SMALLINT">small int</option>
            <option value="MEDIUMINT">medium int</option>
            <option value="INT">int</option>
            <option value="INTEGER">big int</option>
          </optgroup>
          <optgroup label="Fixed-Point">
            <option value="DECIMAL">decimal</option>
            <option value="NUMERIC">numeric</option>
          </optgroup>
          <optgroup label="Floating-Point">
            <option value="FLOAT">float</option>
            <option value="DOUBLE">double</option>
          </optgroup>
          <optgroup label="String">
            <option value="CHAR">char</option>
            <option value="VARCHAR(255)">varchar</option>
            <option value="BINARY">binary</option>
            <option value="VARBINARY(255)">varbinary</option>
            <option value="BLOB">blob</option>
            <option value="TEXT">text</option>
            <option value="ENUM">enum</option>
            <option value="SET">set</option>
          </optgroup>
          <optgroup label="Date/Time">
            <option value="DATE">date</option>
            <option value="TIME">time</option>
            <option value="DATETIME">datetime</option>
            <option value="TIMESTAMP">timestamp</option>
            <option value="YEAR">year</option>
          </optgroup>
        </select>
        <label>Is ID: <input id="propIsID" type="checkbox"></label>
        <label>Is not NULL: <input id="propIsNotNull" type="checkbox"></label>
        <input type="button" value="Add property" onclick="AddProperty()">
      </div>
      <div id="props">
        
      </div>
      <input type="submit" name="createTable" value="Create table">
    </form>

    <hr/>
    <h4>Alter table</h4>
    <form id="alterTableForm" action="" method="post">
      <input type="text" name="tableName" placeholder="Table name">
      <div>
        <select name="typeAlter">
          <option value="ADD">add</option>
          <option value="MODIFY">modify</option>
          <option value="CHANGE">change</option>
          <option value="DROP">drop</option>
        </select>
        <input id="propName" placeholder="Property name">
        <select id="propType">
          <optgroup label="Integer">
            <option value="TINYINT">tiny int</option>
            <option value="SMALLINT">small int</option>
            <option value="MEDIUMINT">medium int</option>
            <option value="INT">int</option>
            <option value="INTEGER">big int</option>
          </optgroup>
          <optgroup label="Fixed-Point">
            <option value="DECIMAL">decimal</option>
            <option value="NUMERIC">numeric</option>
          </optgroup>
          <optgroup label="Floating-Point">
            <option value="FLOAT">float</option>
            <option value="DOUBLE">double</option>
          </optgroup>
          <optgroup label="String">
            <option value="CHAR">char</option>
            <option value="VARCHAR(255)">varchar</option>
            <option value="BINARY">binary</option>
            <option value="VARBINARY(255)">varbinary</option>
            <option value="BLOB">blob</option>
            <option value="TEXT">text</option>
            <option value="ENUM">enum</option>
            <option value="SET">set</option>
          </optgroup>
          <optgroup label="Date/Time">
            <option value="DATE">date</option>
            <option value="TIME">time</option>
            <option value="DATETIME">datetime</option>
            <option value="TIMESTAMP">timestamp</option>
            <option value="YEAR">year</option>
          </optgroup>
        </select>
        <label>Is ID: <input id="propIsID" type="checkbox"></label>
        <label>Is not NULL: <input id="propIsNotNull" type="checkbox"></label>
        <input type="button" value="Add property" onclick="AddProperty()">
      </div>
      <div id="props">
        
      </div>
      <input type="submit" name="createTable" value="Create table">
    </form>

  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    function AddProperty(){
      var props = document.getElementById("props");
      var propName = document.getElementById("propName");
      var propType = document.getElementById("propType");
      var propIsID = document.getElementById("propIsID");
      var propIsNotNull = document.getElementById("propIsNotNull");
      var propsCount = props.children.length-1;
      
      var inputValue = ""+propName.value+" "+propType.value;
      if(propIsID.checked){
        inputValue+=" KEY AUTO_INCREMENT";
      }
      if(propIsNotNull.checked){
        inputValue+=" NOT NULL";
      }

      var div = document.createElement("div");
      div.setAttribute("id","prop"+(propsCount+1));
      
      var input = document.createElement("input");
      input.setAttribute("type","text");
      input.setAttribute("name","prop"+(propsCount+1));
      input.setAttribute("id","prop"+(propsCount+1));
      input.setAttribute("readonly","true");
      input.setAttribute("value",inputValue);
      div.appendChild(input);
      
      var deleteButton = document.createElement("input");
      deleteButton.setAttribute("type","button");
      deleteButton.setAttribute("id","button"+input.id);
      deleteButton.setAttribute("value","-");
      deleteButton.addEventListener("click",()=>{DeleteProp(div.id)})
      
      div.appendChild(deleteButton);
      props.appendChild(div);
    }

    function DeleteProp(divId, id){
      var props = document.getElementById("props");
      var div = document.getElementById(divId);
      props.removeChild(div);
    }
  </script>
</body>

</html>