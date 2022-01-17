var aside = document.querySelector("aside");
var main = document.querySelector("main");
var menu_btn = document.querySelector(".menu-btn");
var log = document.querySelector("#log");

menu_btn.addEventListener("click", function(){
    aside.classList.toggle("showing")
    menu_btn.classList.toggle("btn_effect")
});

main.addEventListener("click", function(){
    aside.classList.remove("showing")
    main.classList.remove("showing")
});

setTimeout(
    function(){
        log.style = 'display: none';
    }, 7000
);


function showDepWallet(){

    var method = document.querySelector("#payment-method");
    var address = document.querySelector("#wallet-address"); 

    if(method.value == 'bitcoin'){
        address.style.display = "block"
        address.innerHTML = 'Send Bitcoin to : <br> <input id="btcAdd" value ="bc1qjuas3czprl62tu8tg0r74zqjmeplhtuhszznkm"> <br> <a onclick="copyBtc()"> Copy </a> <br> <br> '
    }

    if(method.value == 'eth'){
        address.style.display = "block"
        address.innerHTML = 'Send Eth to : <br> <input id="ethAdd" value ="0x4E0E288b76664D7C1624bB9Cd4bDF9915195e626"> <br> <a onclick="copyEth()"> Copy </a> <br> <br> '
    }

    if(method.value == 'usdt'){
        address.style.display = "block"
        address.innerHTML = 'Send USDT to : <br> <input id="usdtAdd" value ="0x4E0E288b76664D7C1624bB9Cd4bDF9915195e626"> <br> <a onclick="copyUsdt()"> Copy </a> <br> <br> '
    }

    if(method.value == 'other'){
        address.style.display = "block"
        address.innerHTML = "Please contact our Online support for other payment options. <br> <br> "
    }


    if(method.value == ""){
        address.style.display = "none"
        refer.style.display = "none"
    }

}


function copyItem() { 
    var copyText = document.querySelector("#myInput");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy");
  
    alert("Copied : " + copyText.value);
}

function copyUsdt() { 
    var copyText = document.querySelector("#usdtAdd");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy"); 
  
    alert("Copied : " + copyText.value);
}

function copyBtc() {
    var copyText = document.querySelector("#btcAdd");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy");
  
    alert("Copied : " + copyText.value);
}

function copyEth() {
    var copyText = document.querySelector("#ethAdd");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy");
  
    alert("Copied : " + copyText.value);
}

function inputMax(){
    document.querySelector('.max-input').value = balance
}