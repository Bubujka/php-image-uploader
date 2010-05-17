<table>
<tr>
<td>
<a href='/img<?php echo $name;?>' target='_blank'>
<img src='/small<?php echo $name;?>'>
</a>
</td>
</tr>
<tr>
<td>
Original image:<br>
<input type'text' 
       class='link_text_field'
       onclick='javascript:highlight(this)' 
       value='http://<?php echo HTTP_HOST;?>/img<?php echo $name;?>'><br>
Small image:<br>
<input type'text' 
       class='link_text_field' 
       onclick='javascript:highlight(this)' 
       value='http://<?php echo HTTP_HOST;?>/small<?php echo $name;?>'><br>

<?php
$bbCodeLink = htmlspecialchars('[url=http://'.HTTP_HOST.'/img'.$name.'][img]http://'.HTTP_HOST.'/small'.$name.'[/img][/url]');
$htmlCodeLink = htmlspecialchars('<a href="http://'.HTTP_HOST.'/img'.$name.'"><img src="http://'.HTTP_HOST.'/small'.$name.'"></a>');
?>
BB code:<br>
<input type'text' 
       class='link_text_field' 
       onclick='javascript:highlight(this)' 
       value='<?php echo $bbCodeLink;?>'><br>
HTML code:<br>
<input type'text' 
       class='link_text_field' 
       onclick='javascript:highlight(this)' 
       value='<?php echo $htmlCodeLink;?>'><br>
</td>
<tr>
</table>
