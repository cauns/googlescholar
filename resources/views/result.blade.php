<div class="card card-margin">
    <div class="card-body">
        <div class="row search-body">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="search-result">
                    <div class="result-body">
                        <div class="table-responsive">
                            <table class="table widget-26">
                                <tbody>

                                <?php foreach ($data['publications']['list'] as $key => $pub):  ?>
                                <tr>
                                    <td>
                                        <div class="widget-26-job-title">
                                            <p class="type m-0">
                                                <a href="<?php echo $pub['link']?>">
                                                    <?php echo $pub['title']?>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="widget-26-job-info">
                                            <p class="type m-0">
                                                <?php echo $pub['author'];?>
                                            </p>
                                        </div>
                                        <div class="widget-26-job-info">
                                            <p class="type m-0">
                                                <?php echo $pub['sub_title'];?>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-26-job-info">
                                            <p class="type m-0">
                                                <?php echo $pub['total_citations'];?>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-26-job-info">
                                            <p class="type m-0">
                                                <?php echo isset($pub['total_citations_minus_author']) ? $pub['total_citations_minus_author']: 0;?>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-26-job-info">
                                            <p class="type m-0">
                                                <?php echo isset($pub['total_citations_author']) ? $pub['total_citations_author'] : 0;?>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-26-job-info">
                                            <p class="type m-0">
                                                <?php echo $pub['year'];?>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $data['information'];?>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $data['same_author'];?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
