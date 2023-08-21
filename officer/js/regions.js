/*
	*	Original script by: Shafiul Azam
	*	ishafiul@gmail.com
	*	Version 3.0
	*	Modified by: Luigi Balzano

	*	Description:
	*	Inserts Countries and/or States as Dropdown List
	*	How to Use:

		In Head section:
		<script type= "text/javascript" src = "countries.js"></script>
		In Body Section:
		Select Country:   <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>
		<br />
		City/District/State: <select name ="state" id ="state"></select>
		<script language="javascript">print_country("country");</script>	

	*
	*	License: OpenSource, Permission for modificatin Granted, KEEP AUTHOR INFORMATION INTACT
	*	Aurthor's Website: http://shafiul.progmaatic.com
	*
*/

var country_arr = new Array("Gadag Region", "Mysore Region","Banglore Region","Indi Region","Belgaum Region");
var s_a = new Array();
s_a[0]="";
s_a[1]="Gadag West Municipal|Gadag East District|Gadag West District|Gadag Central Municipal|Haveri|VimlaDevi Nagar|Jamaz North District";
s_a[2]="Mysore North Municipal|Mysore South District|Mysore District Hospital|Dr Ambedkar Nagar";
s_a[3]="Banglore Municipal|Babglore Urban District|Banglore North Municipal|Banglore South|High tech city|Pru West District|Senator East District";
s_a[4]="Indi Muncipal Corporation|Indi Central";
s_a[5]="Belgaum Central|Belgaum West|Belgaum city hospital";
function print_country(country_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(country_id);
	option_str.length=0;
	option_str.options[0] = new Option('Select Region','');
	option_str.selectedIndex = 0;
	for (var i=0; i<country_arr.length; i++) {
		option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
	}
}

function print_state(state_id, state_index){
	var option_str = document.getElementById(state_id);
	option_str.length=0;	// Fixed by Julian Woods
	option_str.options[0] = new Option('Select District','');
	option_str.selectedIndex = 0;
	var state_arr = s_a[state_index].split("|");
	for (var i=0; i<state_arr.length; i++) {
		option_str.options[option_str.length] = new Option(state_arr[i],state_arr[i]);
	}
}
