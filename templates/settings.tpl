{include file='modules_header.tpl'}

  <div class="title">{$L.word_settings|upper}</div>

  {include file='messages.tpl'}

  <div class="margin_bottom_large">
    {$L.text_settings_page}
  </div>

  <form action="{$same_page}" method="post">

	  <table cellspacing="0" cellpadding="1">
	  <tr>
	    <td class="nowrap pad_right_large">{$L.phrase_enter_any_string}</td>
	    <td><input type="text" name="demo_setting" value="{$demo_setting|escape}" maxlength="50" /></td>
	  </tr>
	  </table>

	  <p>
	    <input type="submit" name="update" value="{$LANG.word_update|upper}" />
    </p>
  </form>

{include file='modules_footer.tpl'}