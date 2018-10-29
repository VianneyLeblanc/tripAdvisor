
function datePicker(date) {
  if (document.getElementById('calendarSelector2').className == 'show') { 
   document.getElementsByName('dateDepart')[0].value = date;
  }
  else{
   document.getElementsByName('dateArrivee')[0].value = date; 
  }
}

function showCalendarArrive() {
  document.getElementById('calendarSelector2').className = 'hidden';
  var div = document.getElementById('calendarSelector1');
  if (div.className == 'hidden') {
  	div.className = 'show';
  	document.querySelector('#calendarSelector1 > #mois_'+document.querySelector("#calendarSelector1 > #previous").dataset.nb).style.display = 'contents';	
  }
  else{
  	div.className = 'hidden';	
  }
  
}

function showCalendarDepart() {
  document.getElementById('calendarSelector1').className = 'hidden';
  var div = document.getElementById('calendarSelector2');
  if (div.className == 'hidden') {
    div.className = 'show';
    document.querySelector('#calendarSelector2 > #mois_'+document.querySelector("#calendarSelector2 > #previous").dataset.nb).style.display = 'contents';  
  }
  else{
    div.className = 'hidden'; 
  }
}

function nextMonth(parent) {
  var nb = document.querySelector("#"+parent+" > #next").dataset.nb;
  if (nb < 6) { 
    document.querySelector("#"+parent+" > #mois_"+(nb-1)).style.display = "none";
    document.querySelector("#"+parent+" > #mois_"+nb).style.display = "contents";
    document.querySelector("#"+parent+" > #next").dataset.nb = parseInt(nb)+1;
    document.querySelector('#'+parent+" > #previous").dataset.nb = nb;
  }
}

function previousMonth(parent) {
  var nb = document.querySelector("#"+parent+" > #previous").dataset.nb;
  if (nb > 0) { 
    document.querySelector('#'+parent+" > #mois_"+nb).style.display = "none";
    document.querySelector('#'+parent+" > #mois_"+(nb-1)).style.display = "contents";
    document.querySelector('#'+parent+" > #next").dataset.nb = nb;
    document.querySelector('#'+parent+" > #previous").dataset.nb = parseInt(nb)-1;
  }
}