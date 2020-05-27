

<form action="/?addUser/<?=$this->post['id']?>" class="form-horizontal" method="post">

	<label>Email</label>
	<input type="text" class="input-xxlarge" name="email" value="<?=@$this->users['email']?>" />
	<label>Password</label>
	<input type="text" class="input-xxlarge" name="pass" value="<?=@$this->users['pass']?>" />
	
	<div class="form-actions"><button class="btn btn-primary" type="submit">Готово!</button></div>

</form> 

