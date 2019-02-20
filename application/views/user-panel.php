<h1 style="float:left">Your User Panel</h1> 
<a href="logout" style="float:right;">Logout</a>
<table>
	<tr>
		<td>Your Email</td>
	</tr>
	<tr>
		<td><?= $this->session->userdata('email');?></td>
	</tr>
</table>
<h2>your Dp<h2><br>
<img src="<?= base_url()?>uploads/<?= $this->session->userdata('image')?>" width="200" height="200">