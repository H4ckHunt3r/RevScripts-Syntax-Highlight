<?php
# RevScripts Syntax Highlight
# css.php by H4ckHunt3r

class RevScriptsCodeParser {

/*

Stylesheet-Classes to set:
--------------------------------------------------
CodeContainer(CodeBox): 	.code-css
Strings(Text): 				.code-css .str

!important:					.code-css .important
---------------------------------------------------

*/

	var $code;

	function parseTags($array)
	{
		for($ti = 0;$ti<sizeof($array)-1;$ti++)
		{
			for($i = 0;$i<sizeof($array[$ti])-1;$i++)
			{
				$this->code = preg_replace("/&lt;".$array[$ti][$i]."(.*)\/&gt;/", "<span class=\"tags-".$ti."\">&lt; $1/&gt;</span>", $this->code);
				$this->code = preg_replace("/&lt;".$array[$ti][$i]."(.*)&gt;(.*)&lt;/".$array[$ti][$i]."&gt;/", "<span class=\"tags-".$ti."\">&lt; $1/&gt;</span>", $this->code);
				$this->code = preg_replace("/$lt;".$array[$ti][$i]."(.*)/","$lt;<a href=\"http://www.quackit.com/html_5/tags/html_".$array[$ti][$i]."_tag.cfm\">".$array[$ti][$i]."</a>$1",$this->code);
			}
		}
	}

	function parseCode($code)
	{
		
		$this->code = $code;
				
		$tags = array(		
			0 => array('img', 'object', 'audio', 'video', 'embed',
					   'iframe', 'canvas'), // OBJECTS
			
			1 => array('form', 'fieldset', 'option', 'label', 'legend',
					   'select', 'textarea', 'button', 'input'), // FORM
					   
			2 => array('table', 'tbody', 'td', 'tr', 'text', 'tfoot',
					   'thead', 'th', 'colgroup', 'col', 'caption','optgroup'), // TABLE
			
			3 => array('a'), // LINKS & Anker
			
			4 => array('style'),  // style
			
			5 => array('script'), // script
			
			6 => array('html', 'body', 'head', 'title'), // Grundgerüst
			
			7 => array('h1','h2','h3','h4','h5','h6'), // Überschriften
			
			8 => array('li','ol','ul'), // listen
			
			9 => array('abbr','address', 'area', 'article', 'aside',
					   'b', 'base','bdo','blockquote','br',
					   'cite','code','command','datalist','dd',
					   'del','details','dfn','div','dl',
					   'dt','em','eventsource','figcapture','figure',
					   'footer','hgroup','hr','i','ins','kbd','keygen',
					   'link','mark','map','menu','meta','meter','nav',
					   'noscript','output','p','param','pre','progress',
					   'q', 'ruby', 'rp','rt','samp','section','small',
					   'source','span','strong','sub','sup','summary',
					   'time','var','wbr') // MISC
		);
		
		$str = array("/\'(.*)\'/siU", "/\"(.*)\"/siU"); // String regex
		
		$regex = array(); // OWN REGEX Spezifies everyone gets his own css class (.code-html .rx-<id_in_array>)
		
			
			$cssCode = str_replace("<", "&lt;", $code);
			$cssCode = str_replace(">", "&gt;", $cssCode);
			
			// Replaces un so..
			// Tag-Links: http://www.quackit.com/html_5/tags/html_<TagName>_tag.cfm
		
		return $cssCode;
	}
	
}