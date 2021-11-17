function showTime(){
    var date=new Date();
    var h=date.getHours();
    var m=date.getMinutes();
    // var s=date.getSeconds();
    var dd=date.getDate();
    var mm=date.getMonth()+1;
    var yyy=date.getFullYear();


    var time=h+"h"+m;
    document.getElementById("relogio").innerText=time;
    document.getElementById("relogio").innerContent=time;
    
    setTimeout(showTime,1000);
}
showTime();