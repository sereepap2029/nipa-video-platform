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
                                echo number_format($profile->sucscribe)."/".number_format($profile->view);
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
                                        <canvas id="canvas"></canvas>
                                        <progress id="animationProgress" max="1" value="0" style="width: 100%"></progress>
                                        <button id="randomizeData">Randomize Data</button>
                                    </div>
                                </div>
                            </div>
                            <div class="small-12 columns c-holder c-income">
                                <div class="row">
                                    <div class="small-12 columns">
                                        รายได้ทั้งหมด <span class="label alert">109,00</span> ปี (2016)
                                        <canvas id="canvas_2"></canvas>
                                        <progress id="animationProgress_2" max="1" value="0" style="width: 100%"></progress>
                                        <button id="randomizeData_2">Randomize Data</button>
                                    </div>
                                </div>
                            </div>
                            <div class="small-12 columns c-holder c-interest">
                                <div class="row">
                                    <div class="small-12 columns">
                                        แบรนด์ที่สนใจคุณทั้งหมด <span class="label alert">230</span> แบรนด์ (2016)
                                    </div>
                                    <div class="small-12 columns">
                                        เพื่อนร่วมงานที่สนใจคุณทั้งหมด <span class="label alert">1,207</span> คน (2016)
                                    </div>
                                    <div class="small-12 columns">
                                        ประเภทธุรกิจที่สนใจคุน
                                        <canvas id="canvas_3"></canvas>
                                        <button id="randomizeData_3">Randomize Data</button>
                                        <button id="addDataset">Add Dataset</button>
                                        <button id="removeDataset">Remove Dataset</button>
                                        <button id="addData">Add Data</button>
                                        <button id="removeData">Remove Data</button>
                                    </div>
                                </div>
                            </div>
                            <div class="small-12 columns c-holder c-review">
                                <div class="row">
                                    <div class="small-4 columns">
                                        <canvas id="canvas_4"></canvas>
                                        <br>
                                    </div>
                                    <div class="small-4 columns">
                                        <canvas id="canvas_5"></canvas>
                                        <br>
                                    </div>
                                    <div class="small-4 columns">
                                        <canvas id="canvas_6"></canvas>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="small-12 columns">
                                        <p>คะแนน Feedback ของคุณอยู่ในเกณฑ์ดี</p>
                                        <p>Ping us on Twitter if you have questions. When you build something with this we'd love to see it (and send you a totally boss sticker).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)'
    };
    window.randomScalingFactor = function() {
        return (Math.random() > 0.5 ? 1.0 : 0.1) * Math.round(Math.random() * 100);
    }
    $(function() {

        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var progress = document.getElementById('animationProgress');
        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July2"],
                datasets: [{
                    label: "My First dataset ",
                    fill: false,
                    borderColor: window.chartColors.red,
                    backgroundColor: window.chartColors.red,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ]
                }, {
                    label: "My Second dataset ",
                    fill: false,
                    borderColor: window.chartColors.blue,
                    backgroundColor: window.chartColors.blue,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Chart.js Line Chart - Animation Progress Bar"
                },
                animation: {
                    duration: 2000,
                    onProgress: function(animation) {
                        progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                    },
                    onComplete: function(animation) {
                        window.setTimeout(function() {
                            progress.value = 0;
                        }, 2000);
                    }
                }
            }
        };
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);

        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myLine.update();
        });


        var progress_2 = document.getElementById('animationProgress_2');
        var config_2 = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset ",
                    fill: false,
                    borderColor: window.chartColors.red,
                    backgroundColor: window.chartColors.red,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ]
                }, {
                    label: "My Second dataset ",
                    fill: false,
                    borderColor: window.chartColors.blue,
                    backgroundColor: window.chartColors.blue,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Chart.js Line Chart - Animation Progress Bar"
                },
                animation: {
                    duration: 2000,
                    onProgress: function(animation) {
                        progress_2.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                    },
                    onComplete: function(animation) {
                        window.setTimeout(function() {
                            progress_2.value = 0;
                        }, 2000);
                    }
                }
            }
        };

        var ctx_2 = document.getElementById("canvas_2").getContext("2d");
        window.myLine_2 = new Chart(ctx_2, config_2);

        document.getElementById('randomizeData_2').addEventListener('click', function() {
            config_2.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myLine_2.update();
        });






        // chart 3
        var color = Chart.helpers.color;
        var horizontalBarChartData = {
            labels: ["PETS", "FOOD & Drink", "EDUCATION", "OTHER"],
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ]
            }]

        };

        var TYPES = ["PETS", "FOOD & Drink", "EDUCATION", "OTHER"];
        var ctx_3 = document.getElementById("canvas_3").getContext("2d");
        window.myHorizontalBar = new Chart(ctx_3, {
            type: 'horizontalBar',
            data: horizontalBarChartData,
            options: {
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                    rectangle: {
                        borderWidth: 2,
                    }
                },
                responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'ประเภทธุรกิจที่สนใจคุน'
                }
            }
        });


        document.getElementById('randomizeData_3').addEventListener('click', function() {
            var zero = Math.random() < 0.2 ? true : false;
            horizontalBarChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return zero ? 0.0 : randomScalingFactor();
                });

            });
            window.myHorizontalBar.update();
        });

        var colorNames = Object.keys(window.chartColors);

        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[horizontalBarChartData.datasets.length % colorNames.length];;
            var dsColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + horizontalBarChartData.datasets.length,
                backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                borderColor: dsColor,
                data: []
            };

            for (var index = 0; index < horizontalBarChartData.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            horizontalBarChartData.datasets.push(newDataset);
            window.myHorizontalBar.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (horizontalBarChartData.datasets.length > 0) {
                var month = TYPES[horizontalBarChartData.labels.length % TYPES.length];
                horizontalBarChartData.labels.push(month);

                for (var index = 0; index < horizontalBarChartData.datasets.length; ++index) {
                    horizontalBarChartData.datasets[index].data.push(randomScalingFactor());
                }

                window.myHorizontalBar.update();
            }
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            horizontalBarChartData.datasets.splice(0, 1);
            window.myHorizontalBar.update();
        });

        document.getElementById('removeData').addEventListener('click', function() {
            horizontalBarChartData.labels.splice(-1, 1); // remove the label first

            horizontalBarChartData.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myHorizontalBar.update();
        });


        // dou_nut 1
        var config_dou_1 = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                    ],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    "ถูกต้อง",
                    "ไม่ถูกต้อง",
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    display: false
                },
                title: {
                    display: true,
                    text: 'ความถูกต้อง'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

        var ctx_4 = document.getElementById("canvas_4").getContext("2d");
        window.myDoughnut_1 = new Chart(ctx_4, config_dou_1);
        // dou_nut 2
        var config_dou_2 = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                    ],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    "ตรงต่อเวบลา",
                    "ไม่ตรงต่อเวบลา",
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    display: false
                },
                title: {
                    display: true,
                    text: 'ตรงต่อเวบลา'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

        var ctx_5 = document.getElementById("canvas_5").getContext("2d");
        window.myDoughnut_5 = new Chart(ctx_5, config_dou_2);
        // dou_nut 3
        var config_dou_3 = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                    ],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    "สร้างสรรค์",
                    "ปกติ",
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    display: false
                },
                title: {
                    display: true,
                    text: 'สร้างสรรค์'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

        var ctx_6 = document.getElementById("canvas_6").getContext("2d");
        window.myDoughnut_6 = new Chart(ctx_6, config_dou_3);




    });

    function c_show(div_class) {
        $(".c-holder").fadeOut("fast", function() {
            setTimeout(function() {
                $("." + div_class).fadeIn();
            }, 500);

        });

    }
    </script>
