<div class="table-responsive ">
	<table class="table table-striped table">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama</th>
				<th>Subjek</th>
				<th>Jenis</th>
				<th>Tanggal</th>
				<th>Catatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			foreach ($riwayat as $r) { ?>
				<tr>
					<td><?= $no += 1; ?></td>
					<td><?= $r->nama ?></td>
					<td><?= $r->subjek; ?></td>
					<td><?= $r->jenis; ?></td>
					<td><?= tanggal($r->created_at); ?></td>
					<td><?= get_small_char($r->catatan, 100); ?> ...</td>
				</tr>
			<?php }; ?>
		</tbody>
	</table>
	<div class="d-print-block">
		<button type="button" class="btn btn-primary">Print</button>
		<button type="button" class="btn btn-primary">Export</button>
	</div>
</div>