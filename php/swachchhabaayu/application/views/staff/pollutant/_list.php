<form action="" method="post" id="gridForm" autocomplete="off">
    <table class="table table-bordered table-hover list-datatable">
    <tfoot id="table-search-row">
        <tr>
            <th></th>
            <th>Site</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
    <thead>
        <tr>
            <th>SN</th>
            <th>Site</th>
            <th>CO</th>
            <th>Dust</th>
            <th>DateTime</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($pollutant) : $serial_number = 1; ?>
        <?php foreach ($pollutant as $row) : ?>
            <tr>
                <td><?php echo $serial_number; $serial_number++; ?></td>
                <td><?php echo $controller->getSite($row->area_id); ?></td>
                <td><?php echo $row->co; ?></td>
                <td><?php echo $row->dust; ?></td>
                <td><?php echo $row->datetime; ?></td>
            </tr>
        <?php endforeach ?>
    <?php else : ?>
        <tr>
            <td>No Data</td>
            <td>No Data</td>
            <td>No Data</td>
            <td>No Data</td>
            <td>No Data</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
</form>