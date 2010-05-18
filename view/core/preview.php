<table>
<tr>
<td>
<div id='previewBlock'>
    <a href='/img<?php echo $name;?>' target='_blank' class='previewImage'>
        <img src='/small<?php echo $name;?>'>
    </a>
</div>
</td>
</tr>
<tr>
<td>
<?php echo bu::lang('originalImageLegend')?><br>
<input type'text' 
       class='link_text_field'
       onclick='javascript:highlight(this)' 
       value='http://<?php echo HTTP_HOST;?>/img<?php echo $name;?>'><br>
<?php echo bu::lang('smallImageLegend')?><br>
<input type'text' 
       class='link_text_field' 
       onclick='javascript:highlight(this)' 
       value='http://<?php echo HTTP_HOST;?>/small<?php echo $name;?>'><br>

<?php
$bbCodeLink = htmlspecialchars('[url=http://'.HTTP_HOST.'/img'.$name.'][img]http://'.HTTP_HOST.'/small'.$name.'[/img][/url]');
$htmlCodeLink = htmlspecialchars('<a href="http://'.HTTP_HOST.'/img'.$name.'"><img src="http://'.HTTP_HOST.'/small'.$name.'"></a>');
?>
<?php echo bu::lang('BBCodeLegend')?><br>
<input type'text' 
       class='link_text_field' 
       onclick='javascript:highlight(this)' 
       value='<?php echo $bbCodeLink;?>'><br>
<?php echo bu::lang('htmlLinkLegend')?><br>
<input type'text' 
       class='link_text_field' 
       onclick='javascript:highlight(this)' 
       value='<?php echo $htmlCodeLink;?>'><br>
</td>
<tr>
</table>
