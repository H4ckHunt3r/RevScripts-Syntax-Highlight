<?php
# RevScripts Syntax Highlight
# css.php by H4ckHunt3r

class RevScriptsCodeParser {

/*

Stylesheet-Classes to set:
--------------------------------------------------
CodeContainer(CodeBox): 	.code-css
Strings(Text): 				.code-css .str
Values(Werte): 				.code-css .val
Properetys(Eigenschaften): 	.code-css .egs
!important:					.code-css .important
---------------------------------------------------

*/

	function parseCode($code)
	{
		
		$cssRx1 = "/([A-z-_]*)\:([A-z0-9#()-_,\/\"'!.\%\\ ]*);/";
		$cssRx2 = "/\'(.*)\'/siU";
		$cssRx3 = "/\"(.*)\"/siU";
			
			$cssCode = str_replace("<", "&lt;", $code);
			$cssCode = str_replace(">", "&gt;", $cssCode);
			
			$cssCode = preg_replace($cssRx3, "<span class=\"str\">&quot;$1&quot;</span>", $cssCode);
			$cssCode = preg_replace($cssRx1, "<span class=\"egs\">$1</span>:<span class=\"val\">$2</span>;", $cssCode);
			$cssCode = preg_replace($cssRx2, "<span class=\"str\">'$1'</span>", $cssCode);
		
			$cssCode = str_replace("!important", "<span class=\"important\">!important</span>", $cssCode);
		
		return $cssCode;
	}
	
}