<!DOCTYPE html>
<html lang="{if $lang == "tw"} zh-TW {elseif $lang == "en"} en {elseif $lang == "cn"} zh-Hans {/if}">
<head>
  {include file="head.tpl"}
</head>

<body>
	{if $Seo.seo}<div style="display: none">{$Seo.seo}</div>{/if}
	{include file="header.tpl"}
			

	{* {include file="message.tpl"} *}
	{$layout->content}

	
	{include file="footer.tpl"}	
	
	{include file="js.tpl"}
</body>
</html>

{if $smarty.const.SmartyDebug == true} {debug} {/if}