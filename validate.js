// JavaScript Document

//Google Analytics
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22864126-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


function checkEmailValidity(emailAddress){
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var emailPass = pattern.test(emailAddress);
	if (!emailPass){
		alert("Please enter a valid email address.");
		return false;
	} 
	else return true;
}
	
function checkQuestionFormsFilled(){
	var len1 = $('#firstname').val().length;
	var len2 = $('#lastname').val().length;
	var len3 = $('#email').val().length;
	var len4 = $('#schoolname').val().length;
	var region = $('#region').val();
	var len5 = true;
	if (region=="none"){
		len5 = false;
	}
	var categories = $('#categories').val();
	var len6 = true;
	if (categories=="none"){
		len6 = false;
	}
	var difficulty = $('#difficulty').val();
	var len7 = true;
	if (region=="none"){
		len7 = false;
	}
	var len8 = $('#question').val().length;
	var len9 = $('#W').val().length;
	var len10 = $('#X').val().length;
	var len11 = $('#Y').val().length;
	var len12= $('#Z').val().length;
	var len13 = $('#answer').val().length;
	if (!(len1 && len2 && len3 && len4 && len5 && len6 && len7 && len8 && len9 && len10 && len11 && len12 && len12)){
		alert("Please fill out all fields in the form.");
		return false;
	} 
	else return true;
}

function checkContactFormsFilled(){
	var len1 = $('#firstname').val().length;
	var len2 = $('#lastname').val().length;
	var len3 = $('#email').val().length;
	var len4 = $('#comment').val().length;
	if (!(len1 && len2 && len3 && len4)){
		alert("Please fill out all fields in the form.");
		return false;
	} 
	else return true;
}