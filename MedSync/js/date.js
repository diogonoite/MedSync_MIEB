function data(id)
{
    date=new Date;
    year=date.getFullYear();
    month=date.getMonth();
    months=new Array('janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro');
    d=date.getDate();
    day=date.getDay();
    days=new Array('Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado');
    
    result= days[day]+', '+d+' de '+months[month]+' de '+year;
    document.getElementById(id).innerHTML=result;
    return true;
}