
function val(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==8 || x==32)
            return true;
        else
            return false;
    }

function onlyAlphabets(e){
		var x=e.which||e.keycode;
		if((x>=97 && x<=122) || (x>=65 && x<=90))
			return true;
		else
			return false;
	}
	function onlyNumexp(e){
        var x=e.which||e.keycode;
        if((x>=48 && x<=57) || x==47)
            return true;
        else
            return false;
    }
    

	

	function onlyNumbers(e){
		var x=e.which||e.keycode;
		if(x>=48 && x<=57)
			return true;
		else
			return false;
	}
 
    function emailId(e){
		var x=e.which||e.keycode;
		if((x>=48 && x<=57) || (x>=97 && x<=122) || x==64 || x==46 || x==33 || x==35 || x==36 || x==37 || x==38 || x==39 || x==42 || x==43 || x==45 || x==47 || x==61 || x==63 || x==94 || x==95 || x==96 ||x==123 || x==124 || (x>=65 && x<=90))
			return true;
		else
			return false;
	}

function valAddress(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==35 || x==44 || x==32)
            return true;
        else
            return false;
    }

function userName(e){
		var x=e.which||e.keycode;
		if((x>=97 && x<=122) || (x>=65 && x<=90) || x==8 || x==95 || (x>=48 && x<=57) ||
			 x==46)
			return true;
		else
			return false;
	}

function btnVal()
{
 if(document.getElementById('usernameval1').value == '')
 {
 
 	 document.getElementById('btn1').disabled = true;
      document.getElementById('emibtn').disabled = true; 
   
   }
   else
   {
   	document.getElementById('msg').style.visibility = 'hidden';
   }

   }





       function function1()
       {
        if(document.getElementById('usernameval').value == '')
        {
             element = document.getElementById('logoutlink');
          element.style.visibility='hidden';
        }else
        {
            element1 = document.getElementById('loginlink');
            element1.style.visibility='hidden';
        }
    }

    

    function onemonemi()
{
	var bikeprice = document.getElementById('bikeprice').value;
	        downpay = bikeprice * .15;
			loanamt = parseInt(bikeprice) - parseInt(downpay);
			intamt = loanamt * .03;
			totamt = parseInt(loanamt) + parseInt(intamt);
			montotpay = totamt / 1;
            document.getElementById('buymoncost').innerHTML ="₹ " + Math.round(montotpay);
	
}

function downpay()
{
var bikeprice = document.getElementById('bikeprice').value;
var downpay = bikeprice * .15;
document.getElementById('downpaybuy').innerHTML = "₹ " + downpay;
 
}


function oneplan()
	
		{
			var plan = document.getElementById('onebut').value;
			document.getElementById('plan').innerHTML = plan + "<span class='text-muted'> Month</span>";
	        document.getElementById('plan1').value = plan;
	
	}
/*function onemon()
	
		{
			var price = document.getElementById('onemonp').value;
			tot = price * 1 * .25;
			montot = tot / 1;
			var montotpay = parseInt(montot) + parseInt(price);
			document.getElementById('disp').innerHTML ="₹ " + montotpay ;
			document.getElementById('moncost').innerHTML ="₹ " + montotpay;
			document.getElementById('amt').value = montotpay;
        }*/