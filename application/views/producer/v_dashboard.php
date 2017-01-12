<?
$ci =&get_instance();
?>
    <style type="text/css">
    .c-holder {
        display: none;
    }
    </style>
    <div class="row creator-list">
        <div class="large-3 columns">
            <div class="callout">
                <div class="small-12 columns creator-items">
                    <?
                        if ($profile->profile_picture=="") {
                            ?>
                        <img class="img-creator" src="<?=site_url()?>/images/Producer.jpg" alt="Producer">
                        <?
                        }else{
                            ?>
                            <img class="img-creator" src="<?=site_url(" media/profile_picture/ ".$profile->profile_picture)?>" alt="Producer">
                            <?
                        }
                        if (isset($brand_data)) {
                            ?>
                                <a class="button primary hollow" data-open="invite-modal" href="javascript:;">invite</a>
                                <?
                        }
                        ?>
                                    <label class="name">
                                        <?=$profile->name?>
                                    </label>
                                    <label class="desc">
                                        <?
                                echo $profile->career;                            
                        ?>
                                    </label>
                                    <div class="small-12 columns stars">
                                        <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                        <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                        <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                        <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                        <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                    </div>
                                    <div class="small-12 columns">
                                        other description blah blah
                                    </div>
                </div>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row align-center">
                <div class="small-3 columns">
                    <div class="callout">
                        <div class="row align-center">
                            <div class="small-12 columns">
                                <a class="button primary" href="javascript:c_show('c-work')">การจ้างงาน</a>
                                <a class="button primary" href="javascript:c_show('c-income')">รายได้</a>
                                <a class="button primary" href="javascript:c_show('c-interest')">ความสนใจ</a>
                                <a class="button primary" href="javascript:c_show('c-review')">review</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small-9 columns">
                    <div class="callout">
                        <div class="row">
                            <div class="small-12 columns c-holder c-work" style="display: block;">
                                <div class="row">
                                    <div class="small-6 columns">
                                        สถานะการจ้างงานปัจจุบัน
                                    </div>
                                    <div class="small-2 columns">
                                        <span class="badge success">&nbsp;</span>
                                        <br>ว่าง
                                    </div>
                                    <div class="small-2 columns">
                                        <span class="badge secondary">&nbsp;</span>
                                        <br>มีงานทำ
                                    </div>
                                    <div class="small-2 columns">
                                        <span class="badge secondary">&nbsp;</span>
                                        <br>รออนุมัติ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="small-12 columns">
                                        การจ้างงานทั้งหมด <span class="label alert">19</span> Campaign (2016)
                                        <canvas id="myChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="small-12 columns c-holder c-income">
                                something
                                <a class="button primary" href="#">youtube</a>
                                <a class="button primary" href="#">Facebook</a>
                                <a class="button primary" href="#">Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(function() {
        var ctx = $("#myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });

    function c_show(div_class) {
        $(".c-holder").fadeOut("fast", function() {
            setTimeout(function() {
                $("." + div_class).fadeIn();
            }, 500);

        });

    }
    </script>
