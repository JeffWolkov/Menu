# Menu

<?
 if(isset($_POST['submit']))
 {
    $current_year = date('Y');
    $error = !checkdate($_POST['month'], $_POST['day'], $current_year);

    if (intval($current_year.$_POST['month'].$_POST['day']) < intval(date('Ynj')))
      $current_year = $current_year + 1;

    $filetype = $_FILES['file']['type'];
    if($filetype == "application/pdf")
    {
      $uploadDir = "pdf/";
      $uploadDir = $uploadDir.$_POST['month'].$_POST['day'].$current_year.".pdf";

      if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir))
      {
      }
    }
    else
      $error = TRUE;

    if ($error)
    {
      echo "Please pick a month and day and upload a pdf file";
    }
  }
?>

<!doctype html>
<html>
 <head>
  <title>Upload</title>
 </head>
 <body>

  <form method="post" enctype="multipart/form-data">
    <select name="month">
    <?
      for($i = 1; $i <= 12; $i++)
      {
        $yr = date('F', strtotime('2016-'.$i.'-01'));
    ?>
      <option value="<?=$i?>"><?=$yr?></option>
    <?
      }
    ?>
    </select>

    <select name="day">
    <?
for($i = 1; $i < 32; $i++)
      {
    ?>
      <option value="<? echo $i; ?>"><? echo $i; ?></option>
    <?
      }
    ?>
  </select>

  <br />
  <input type="file" name="file" id="file" />
  <br />

  <input type="submit" value="Upload" name="submit" />
  </form>
 </body>
</html>
