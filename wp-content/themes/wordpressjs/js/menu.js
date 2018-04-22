//när dokumentet är klart så ger vi den en funktion att skriva
//vi ger den en klick funktion så när man trycker på menyn till navigationen
//så blir det en fin övergång med klasserna som jag har skrivit i html och css
//likadant när man trycker sen på krysset, så försvinner navigationen
$(document).ready(function(){
	$("#toggle").click(function(){
		$(".fa fa-angle-down").addClass("hide_menu");
    });
    
    $(".fa fa-angle-up").click(function(){
		$(".sidebar_menu").removeClass("hide_menu");
	});
});