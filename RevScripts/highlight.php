<?php
# RevScripts Syntax Highlight
# highlight.php by H4ckHunt3r

class RevScriptsHighlight {
	
	//> Edit Area (Options)
	var $enableLineNumbers = false;					// Zeilen Nummern an der linken Seite des Code Blocks Anzeigen?; Show Linenumbers on left side of codeblock?
	var $highlightPath = "RevScripts/Highlight/";	// Wo liegen die Highlight Dateien (html.php, css.php,...)?; Where are the higlight files like (html.php, css.php,...)
	//> --------------------
	
	// DO NOT EDIT CODE BELOW, IF YOU DON'T KNOW WHAT YOU'RE DOING!!!
	var $code;
	var $type;
	var $title;
	
	// Constructor Methode
	function RevScriptsHighlight($code, $type, $title=NULL)
	{
		$this->code = $code;
		$this->type = $type;
		if($title!=NULL)
		{
			$this->title = $title;
		}
	}
	
	// Methode to Parse & return the highlighted code
	function parseCode()
	{
		if(file_exists($this->highlightPath.$this->type.".php"))
		{
			include($this->highlightPath.$this->type.".php");
			
		} else {
			return false; // If there is no file to highlight the code return false
		}
	}
	
}