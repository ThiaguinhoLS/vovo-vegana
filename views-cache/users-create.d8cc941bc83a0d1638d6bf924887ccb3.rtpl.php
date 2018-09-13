<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container" style="font-family: fonte">
	<h2>Página de criação dos usuários</h2>
	<form class="form-group" action="/admin/users/create" method="post">
		<input type="text" name="username" class="form-control" placeholder="Username">
		<input type="password" name="password" class="form-control" placeholder="Password">
		<input type="checkbox" id="isadmin" name="isadmin" value="sim">
		<label for="isadmin">É um administrador</label>
		<button type="submit" class="btn btn-success d-block">Cadastrar</button>
	</form>
</div>