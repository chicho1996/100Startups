 <?=form_open_multipart(base_url()."register")?>
<?php $arr=["iliauni","TSU","Free University"];?>
<table>
	<tr>
		<td>სახელი:
		<td><?=form_input(array("name"=>"firstname" , "value"=>set_value("firstname")))?><?=form_error("firstname")?></tr></td>
			<tr>
		<td>გვარი:
		<td><?=form_input(array("name"=>"lastname" , "value"=>set_value("lastname")))?><?=form_error("lastname")?></tr></td>
			<tr>
		<td>პაროლი:
		<td><?=form_password(array("name"=>"password"))?><?=form_error("password")?></tr></td>
			<tr>
		<td>გაიმეორეთ პაროლი:
		<td><?=form_password(array("name"=>"repassword"))?><?=form_error("repassword")?></tr></td>
			<tr>
		<td>პირადი ნომერი:
		<td><?=form_input(array("name"=>"idnum" , "value"=>set_value("idnum")))?><?=form_error("idnum")?></tr></td>
			<tr>
		<td>უნივერსიტეტი:
		<td><?=form_dropdown("uni",$arr)?><?=form_error("uni")?></tr></td>
			<tr>
		<td>პროფესია:
		<td><?=form_input(array("name"=>"prof" , "value"=>set_value("prof")))?><?=form_error("prof")?></tr></td>
			<tr>
		<td>დაბადების თარიღი:
		<td><input type="date" name="databirth"></tr></td>
			<tr>
		<td> E-Mail:
		<td><?=form_input(array("name"=>"mail" , "value"=>set_value("mail")))?><?=form_error("mail")?></tr></td>
			<tr>
		<td>მობილურის ნომერი:
		<td><?=form_input(array("name"=>"mobile","value"=>set_value("mobile")))?><?=form_error("mobile")?></tr></td>
			<tr>
		<td>სურათი:
		<td><input type="file" name="avatar"></tr></td>
			<tr>

		<td><?=form_submit(array("name"=>"submit" , "value"=>"რეგისტრაცია"))?><?=form_error("submit")?></tr></td>

</table>

<?=form_close()?>