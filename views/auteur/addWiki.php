<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
<style>
    textarea {
        width: 100%;
        min-height:120px;
        resize : none;   
        height: 40px; /* Set the height to your preference */
        padding: 8px; /* Adjust padding as needed */
        box-sizing: border-box;
        font-size: 14px; /* Adjust font size as needed */
    }

    #divTags{
      height: 100px;
      overflow-y: scroll;
    }


</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wiki</title>
  <link rel="stylesheet" href="/assets/styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style=" background-color: #1111;">
  <div class="container ">
    <div class="wrapper">
      <div class="title" style="background-color:black;"><span>New Wiki</span></div>
        <form method="POST" action="?route=addWiki" enctype="multipart/form-data">
          <input type="file" name="image">
          <div class="row">
              <input type="text" name="titre" placeholder="title" required>
          </div>
          <div class="row" style="min-height:120px; margin-bottom:10px;">
              <textarea type="text" name="description" placeholder="Description" required></textarea>
          </div>
          <div class="row">
            <select name = "categoryID">
            <?php foreach ($categories as $row):?>
              <option value="<?= $row['id'] ?>"><?= $row['nom'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div id="divTags" >
            <?php foreach ($resultTags As $tag):?>
            <input type="checkbox" name="check_<?= $tag['id'] ?>" value='check_<?= $tag['id'] ?>'>
            <label for="check_<?= $tag['id'] ?>"><?= $tag['name'] ?></label>
            <br>
            <?php endforeach ?>
          </div>
          <br>
          <div class="row button">
              <input type="submit" style="background-color:#343a40;" name="submit">
          </div>
          <div class="row button">
              <a href="?route=homeauteur">Back</a>
          </div>
        </form>
