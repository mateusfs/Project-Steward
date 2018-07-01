<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Modulos</a>
		</li>
	</ul>
</div>
<div style="padding: 30px 30px">
	<div class="input-control switch" style="width: 90%;">
		<?php foreach ($modulos as $row) {?>
		<fieldset>
			<legend><?= $row->getApelido(); ?>
				<label style="float: right;" class='tdlink' data-link='modulo/salvar/codigo/<?= $row->getCodigo();?>'>
					<input type="checkbox" <?= ($row->getIdStatus() == 1)?"checked":"";?> />
					<span class="check"></span>
				</label>
			</legend>
		</fieldset>
		<?php }?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.tdlink').click( function(){
			link = $(this).attr('data-link');
			window.location = link;
		});
	});

<?php if($sucesso == 1){?>
	new AlertaSucesso("Salvo...", "Atualizado!!");
<?php }?>
</script>