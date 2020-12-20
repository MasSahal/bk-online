<style>
    table {
        margin: 20px;
        background-color: #fafafa;
        position: center;
        font-family: Helvetica, Arial, Segoe UI, Segoe UI Emoji;
    }

    .table tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    thead {
        color: #fff;
        background: #bbbbbb;
    }
</style>
<center>
    <?= $judul; ?>
    <table class="table" border="1" cellspacing="0" cellpadding="3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Subjek</th>
                <th>Jenis</th>
                <th>Role</th>
                <th>Waktu</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($riwayat as $r) : ?>
                <tr>
                    <td><?= $i += 1 ?></td>
                    <td><?= $r->nama ?></td>
                    <td><?= get_small_char($r->subjek, 50) ?> ...</td>
                    <td><?= $r->jenis ?></td>
                    <td><?= $r->role ?></td>
                    <td><?= date('d-m-Y H-i-s', strtotime($r->created_at)) ?></td>
                    <td><?= $r->catatan ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</center>