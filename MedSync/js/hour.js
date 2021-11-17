function hora(id)
{
    date=new Date;
    h=date.getHours();
    if(h<10)
    {
        h="0"+h;
    }
    m=date.getMinutes();
    if(m<10){
        m="0"+m;
    }
    s=date.getSeconds();
    if(s<10){
        s="0"+s;
    }
    result=''+h+'h'+m;
    document.getElementById(id).innerHTML=result;
    setTimeout('hora("'+id+'");','1000');
    return true;
}