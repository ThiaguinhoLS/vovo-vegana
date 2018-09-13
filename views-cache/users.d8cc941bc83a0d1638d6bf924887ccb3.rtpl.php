<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h2>Página dos usuários</h2>
	<a href="/admin/users/create" class="btn btn-primary">Cadastrar usuário</a>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Password</th>
				<th>Date Register</th>
				<th>Administrador</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["password"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["date_register"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php if( $value1["isadmin"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
					<td>
						<a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary">Editar</a>
						<a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger">Excluir</a>
					</td>

				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
