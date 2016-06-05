<?=form_open(base_url()."blog/login")?>
<div id="error"></div>
<table>
		<td>სახელი:
		<td><?=form_input(array("name"=>"email" , "value"=>set_value("email")))?><?=form_error("mail")?></tr></td>
			<tr>
		<td>გვარი:
		<td><?=form_password(array("name"=>"pass"))?><?=form_error("pass")?></tr></td>
			<tr>
	<td><?=form_submit(array("value"=>"ავტორიზაცია"))?></td>
</table>

<?=form_close()?>