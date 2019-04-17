window.onload = main;

function today(i)
    {
        var today = new Date();
        var dd = today.getDate()+1;
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();

        today = dd+'/'+mm+'/'+yyyy;

        return today;   
    }
    
    function calbill()
    {
        var today = new Date();
        var dd = today.getDate()+1;
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();

        bill = dd+yyyy;

        return bill;   
    }
    
function main(){
    
}