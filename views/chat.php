<?php
if(!isset($_SESSION)) session_start();

if(isset($_POST['response'])){
      $response = "\n<".$_SESSION['ChatNick'].">" .  $_POST['response'];
      file_put_contents("chatHistory.txt",$response,FILE_APPEND);
}



if(isset($_POST['ChatNick'])){
    $_SESSION['ChatNick'] = $_POST['ChatNick'];
}

if(!isset($_SESSION['ChatNick'])){

  echo "

      <form action='' method='post'>
          Please Enter a Chat Nick:
          <input type='text' name='ChatNick'>
          <input type='submit' value='Enter Chat Room'>

      </form>

  ";
}
else{

     echo "Welcome ".$_SESSION['ChatNick']."!  ";
      echo "<a href='logout.php'> Log Out</a> <br>";

    $chatContent = file_get_contents("chatHistory.txt");

     echo "

          <textarea id='display' disabled rows='20' cols='100'>$chatContent</textarea>
          <br>
          <form action='' method='post'>

                 <input type='text' name='response' size='105'>

                 <input type='submit' value='►'>

           </form>


     ";



}
