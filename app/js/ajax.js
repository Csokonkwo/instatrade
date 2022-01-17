function checkLength(x){
    if(x.value.length <= 4 ){
        x.style.border= "1px solid red";
        document.querySelector('#receiverResponse').innerHTML = "ID must be atleast 4 Digits, Transfer Fee is 5%";
    }

    if(x.value.length > 4 ){
        x.style.border = "1px solid green";

        checkUser();
    }
}

function checkUser(){
        
    var url = "checkUser.php";
    var receiverResponse = document.querySelector('#receiverResponse');
    var receiver_id =  document.querySelector('#receiver_id').value;

    var xhttp = new XMLHttpRequest();
    
    receiverResponse.innerHTML = "Checking Username..."; 
    
    xhttp.onload = function(){
        receiverResponse.innerHTML = this.responseText;
    }
    
    xhttp.open("POST",url,true);
    
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("receiver_id="+receiver_id+"&user_check=submitted"); 
    return false;
    
}

var Name;

var footer = document.querySelector(".fine-dashboard");


if (navigator.userAgent.indexOf("Win") != -1) Name =  
"Windows OS"; 
if (navigator.userAgent.indexOf("Mac") != -1) Name =  
"Macintosh"; 
if (navigator.userAgent.indexOf("Linux") != -1) Name =  
"Linux OS"; 
if (navigator.userAgent.indexOf("Android") != -1) Name =  
"Android OS"; 
if (navigator.userAgent.indexOf("like Mac") != -1) Name =  
"iOS"; 


if(Name == "iOS"){
    footer.style.backgroundAttachment = "initial";
}