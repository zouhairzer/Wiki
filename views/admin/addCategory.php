<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | CodingLab</title>
  <link rel="stylesheet" href="/assets/styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style=" background-color: #1111;">
<div class="container ">
    <div class="wrapper">
    <div class="title" style="background-color:#343a40;"><span>New Category</span></div>
    <form  method="POST" action="?route=addCategory" >
      <div class="row">
        <input type="text" name="nom" placeholder="nom" required>
      </div>
      <div class="row button" >
          <input type='Submit' style='background-color:#343a40;' name='submit' > 
      </div>