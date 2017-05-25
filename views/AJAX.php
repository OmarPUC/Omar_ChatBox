<!DOCTYPE html>
<html>

<head>

    <script src="../resources/jquery.js"></script>


</head>
<body>

<h1>The XMLHttpRequest Object</h1>

<textarea rows="20" cols="100" id="display" disabled>Let AJAX change this text.</textarea>
<br>
<script>

    jQuery("document").ready(function(){

        setInterval(function(){
              loadDoc();
        },1000);
    });


    function loadDoc() {
        var xhttp;

        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        // alert(typeof xhttp);
        xhttp.open("POST", "chatHistory.txt", true);

        xhttp.send();

        xhttp.onreadystatechange = function() {

            //if(this.status == 404) alert("File Not Found!");

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("display").innerHTML =  this.responseText ;
            }
        };
    }


</script>

</body>
</html>