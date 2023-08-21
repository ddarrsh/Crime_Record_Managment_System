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

var country_arr = new Array("Bono Region", "Ahafo Region","Bono East Region");
var s_a = new Array();
s_a[0]="";
s_a[1]=
"Sunyani Municipal|Sunyani West Municipal|Berekum East District|Berekum West District|Dormaa Central Municipal|Dormaa West District|Dormaa East District|Jaman North District|Jaman South Municipal|Tain District|Banda District|Wenchi Municipal";
s_a[2]="Tano North Municipal|Tano South Municipal|Asunafo North District|Asunafo South District|Asutifi North District|Asutifi South District";
s_a[3]="Techiman Municipal|Techiman South District|Kintampo North Municipal|Kintampo South District|Nkoranza South Municipal|Nkoranza North District|Pru East District|Pru West District|Atebubu-Amantin District|Sene East District|Sene West District";

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
