<div>
	<?php if(is_a_user()): ?>
	<a class="btn btn-success btn-share" href="<?= ROOT_PATH ?>shares/add">Share Something</a>
	<?php endif; ?>
	<?php foreach($viewModel as $record): ?>
		<div class="well">
			<h3><?= $record['title'] ?></h3>
			<small><?= $record['create_date'] ?></small>
			<hr>
			<p><?= $record['body'] ?></p>
			<br>
			<a class="btn btn-default" href="<?= $record['link'] ?>" target="_blank">go to website</a>
		</div>
	<?php endforeach; ?>
</div>