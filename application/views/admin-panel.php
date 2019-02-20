<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<h1>hello admin</h1>
<a href="logout" style="float:right;">logout</a>
<h2>Your Email: <?= $this->session->userdata('email')?></h2>
<h2>Your Dp</h2>
<img src="<?= base_url()?>uploads/<?= $this->session->userdata('image')?>" width="200" height="200">
<table>
	<tr>
		<td>name</td>
		<td>Email</td>
		<td>password</td>
	</tr>
	<tr>
		<?php foreach($users as $user) {?>
			<td><?=$user['name']?></td>
			<td><?=$user['email']?></td>
			<td><?=$user['password']?></td>
		<?php }?>
		</tr>

</table>