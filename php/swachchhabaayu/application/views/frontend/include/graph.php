<main>
    <div class="container">
        <form class="filter-wrap">
            <h4>Select data for your graph to display:</h4>
            <div class="row">
                <div class="col-md-offset-1 col-md-2">
                    <div class="form-group">
                        <label>Pollutant</label>
                        <select class="form-control" id="pollutant" name="pollutant">
                            <option disabled selected value>Select Pollutant</option>
                            <option value="co">Carbon Monoxide</option>
                            <option value="dust">Dust</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label> Period</label>
                        <select class="form-control" id="period" name="period">
                            <option disabled selected value>Select Period</option>
                            <option value="oneday">Past 24 hours</option>
                            <option value="oneweek">Past 1 week</option>
                            <option value="onemonth">Past 1 month</option>
                            <option value="threemonth">Past 3 months</option>
                            <option value="year">Annual</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2" style="display:none" id="year-div">
                    <div class="form-group">
                        <label>Year</label>
                        <select class="form-control" id="year" name="year">
                            <option disabled selected value>Select Year</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label> Site</label>
                        <select class="form-control" id="site" name="site">
                            <option disabled selected value>Select Site</option>
                            <?php if($site):?>
                                <?php foreach ($site as $key => $value) {?>
                                    <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                <?php }?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button class=" btn-submit" id="graph" type="button">Get Graph</button>
                    </div>
                </div>
            </div>
        </form>
        <div id="curve_chart"></div>
    </div>
    <div class="container">
        <div class="content-holder">
            <h3>Prevent Air Pollution</h3>
            <p>Comprehensive policies with key focuses by using a combination of economical, legal, technological, and necessary administrative measures focusing on key areas such as coal combustion, motor vehicles, dust-blowing activities.</p>
            <p>Strengthened responsibility and strict management by emphasizing environmental protection responsibilities of governments and enterprises and environmental protection obligations of citizens.</p>
            <p>Focusing on current situation and consider future impacts, including actively responding to social awareness on this topic, establishing heavy air pollution weather alerts and mitigation mechanisms, guiding energy and industrial structural adjustment, improving product quality, phasing out obsolete capacities, and establishing a long-term mechanism to prevent and control air pollution.</p>
            <p>Improve legal responsibility and increase the strength of penalties.</p>
        </div>
    </div>
</main>