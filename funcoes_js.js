var timer = 0;
function set_interval() {
  // the interval 'timer' is set as soon as the page loads
  timer = setInterval("auto_logout()", 300000*6);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  //resets the timer. The timer is reset on each of the below events:
  // 1. mousemove   2. mouseclick   3. key press 4. scroliing
  //first step: clear the existing timer

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    // second step: implement the timer again
    timer = setInterval("auto_logout()", 300000*6);
    // completed the reset of the timer
  }
}

function auto_logout() {
  // this function will redirect the user to the logout script
  window.location = "logout.php";
}

// Add the following attributes into your BODY tag
onload="set_interval()"
onmousemove="reset_interval()"
onclick="reset_interval()"
onkeypress="reset_interval()"
onscroll="reset_interval()"

//função somente numeros
function SomenteNumero(e){
	var tecla=(window.event)?event.keyCode:e.which;
	if((tecla>47 && tecla<58)) return true;
	else{ 
		if (tecla==8 || tecla==0)return true;
		else return false;
	}
}

function up(campo)
{
    val = campo.value;
    newVal = val
        .toLowerCase()
        .replace(/[^A-Za-záâàãäéêèëíîìïóõòôöúùûüç][A-Za-záâàãäéêèëíîìïóõòôöúùûüç]/g, function(m){return m.toUpperCase()})
        .replace(/[0-9][A-Za-záâàãäéêèëíîìïóõòôöúùûü]/g, function(m){return m.toUpperCase()})
        .replace(/( (da|das|e|de|do|dos|para|na|nas|no|nos) )/gi, function(m){return m.toLowerCase()})
        .replace(/^./, function(m){return m.toUpperCase()})
    if (val != newVal)
    {
        campo.value = newVal;
    }
}

function upfirst(frase)
{
    val = frase.value;
    newVal = val
        .toLowerCase()
        .replace(/.^/, function(m){return m.toUpperCase()})
        .replace(/^./, function(m){return m.toUpperCase()})
    if (val != newVal)
    {
        frase.value = newVal;
    }
}