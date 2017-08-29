<main>
    <div class="custom-tab-view">
        <ul class="tab-title">
            <li><a id="map-toggle" class="active" href="javascript:void(0);">Map View</a></li>
            <li><a id="table-toggle" href="javascript:void(0);">Table View</a></li>
        </ul>
        <div class="tab-view-wrapper">
            <div class="map-wrapper">
                <div id="map"></div>
                <ul class="legends">
                    <li class="clearfix"><span class="legend-circle green"></span><span>Good</span></li>
                    <li class="clearfix"><span class="legend-circle yellow"></span><span>Moderate</span></li>
                    <li class="clearfix"><span class="legend-circle orange"></span><span>Unhealthy for sensitive groups</span></li>
                    <li class="clearfix"><span class="legend-circle red"></span><span>Unhealthy</span></li>
                    <li class="clearfix"><span class="legend-circle pink"></span><span>Very Unhealthy</span></li>
                    <li class="clearfix"><span class="legend-circle brown"></span><span>Hazardous</span></li>
                </ul>
            </div>

            <div class="table-view-wrapper hide">
                <div class="table-responsive">
                    <?php if(isset($table) && !empty($table)): ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">S.N</th>
                                <th rowspan="2">Site</th>
                                <th colspan="2">Pollutants</th>
                                <th rowspan="2">Date</th>
                            </tr>
                            <tr>
                                <th>CO</th>
                                <th>Dust</th>
                                <!-- <th>AQI</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $serial_number = 1; ?>
                            <?php foreach ($table as $data) : ?>
                                <tr>
                                    <td><?php echo $serial_number;$serial_number++; ?></td>
                                    <td><?php echo $data->name; ?></td>
                                    <td><?php echo $data->co; ?></td>
                                    <td><?php echo $data->dust; ?></td>
                                    <td><?php echo $data->datetime; ?></td>
                                    <!-- <td></td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="content-holder">
            <h3>Health Implications</h3>
            <p>The monitor colors on the map tell you how relatively clean or polluted the air is, and what this might mean for your health. The ranges are the corresponding Air Quality Index values.</p>
            <ul class="listing-content">
                <li class="clearfix">
                    <span class="legend-circle green"></span>
                    <span class="list-detail">
                        <span>0-50 = Good</span>
                        <span>Air quality is considered satisfactory, and air pollution poses little or no risk.</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="legend-circle yellow"></span>
                    <span class="list-detail">
                        <span>51-100 = Moderate</span>
                        <span>Air quality is acceptable; however, for some pollutants there may be a moderate health concern for a very small number of people who are unusually sensitive to air pollution.</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="legend-circle orange"></span>
                    <span class="list-detail">
                        <span>101-150 = Unhealthy for Sensitive Groups</span>
                        <span>Members of sensitive groups may experience health effects. The general public is not likely to be affected.</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="legend-circle red"></span>
                    <span class="list-detail">
                        <span>151-200 = Unhealthy</span>
                        <span>Everyone may begin to experience health effects; members of sensitive groups may experience more serious health effects.</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="legend-circle pink"></span>
                    <span class="list-detail">
                        <span>201-300 = Very Unhealthy</span>
                        <span>Health warnings of emergency conditions. The entire population is more likely to be affected.</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="legend-circle brown"></span>
                    <span class="list-detail">
                        <span>300+ = Hazardous</span>
                        <span>Health alert: everyone may experience more serious health effects.</span>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</main>