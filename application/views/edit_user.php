 <?=form_open_multipart(base_url()."Edit_user")?>
<?php $arr=["iliauni","TSU","Free University"];?>
<?php
$mail=$this->session->userdata('email');
$row=$this->db->get_where('blog_users',array('email'=>$mail))->row();

 ?>
<table>
	<tr>
		<td>სახელი:
		<td><input name="firstname" value="<?php if(isset($_POST['submit'])){
			echo set_value('firstname');
			}else {
				echo $row->name;
			}

			?>"><?=form_error("firstname")?></tr></td>
			<tr>
		<td>გვარი:
		<td><input name="lastname" value="<?php if(isset($_POST['submit'])){
			echo set_value('lastname');
			}else {
				echo $row->surname;
			}

			?>"><?=form_error("lastname")?></tr></td>
			<tr>
		<td>პირადი ნომერი:
		<td><?php echo $row->idnum; ?></tr></td>
			<tr>
		<td>უნივერსიტეტი:
		<td><?=form_dropdown("uni",$arr)?><?=form_error("uni")?></tr></td>
			<tr>
		<td>პროფესია:
		<td><input name="prof" value="<?php if(isset($_POST['submit'])){
			echo set_value('prof');
			}else {
				echo $row->prof;
			}

			?>"><?=form_error("prof")?></tr></td>
			<tr>
		<td>დაბადების თარიღი:
		<td><input type="date" name="databirth" value="<?php if(isset($_POST['submit'])) {echo set_value('databirth');}
		else{echo $row->birthdate;}?>"></tr></td>
			<tr>
		<td> E-Mail:
		<td><input name="mail" value="<?php if(isset($_POST['submit'])){
			echo set_value('mail');
			}else {
				echo $row->email;
			}

			?>"><?=form_error("mail")?></tr></td>
			<tr>
		<td>მობილურის ნომერი:
		<td><input name="mobile" value="<?php if(isset($_POST['submit'])){
			echo set_value('mobile');
			}else {
				echo $row->mobile;
			}

			?>"><?=form_error("mobile")?></tr></td>
			<tr>
		<td>სურათი:
		<img src="uploads/<?php $this->session->set_userdata('avatar',$row->avatar); echo $row->avatar?>" width="100" heigth="100" >
		<td><input type="file" name="avatar"></tr></td>
			<tr>

		<td><input type="submit" name="submit" value="რედაქტირება"><?=form_error("submit")?></tr></td>

</table>


<?=form_close()?>