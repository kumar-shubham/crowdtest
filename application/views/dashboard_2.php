<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Dashboard</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="<?php echo base_url();?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url();?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
  

        <div id="page-wrapper" class="gray-bg">
        
       
      
            <div class="wrapper wrapper-content">
        <div class="row">
                  <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-th-list fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Projects </span>
                            <h2 class="font-bold"><?php echo $projectcount;?></h2>
                        </div>
                    </div>
                </div>
            </div>
            
            
                  <div class="col-lg-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-th-large fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Open Issues </span>
                            <h2 class="font-bold"><?php echo $openIssueCount;?></h2>
                        </div>
                    </div>
              </div>
              </div>
                      
                      
                  <div class="col-lg-3">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="glyphicon glyphicon-ok-sign fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Closed Issues </span>
                            <h2 class="font-bold"><?php echo $closedIssueCount;?></h2>
                        </div>
                    </div>
               </div>
              </div>      
                  
                  <div class="col-lg-3">
                <div class="widget style1 blue-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="glyphicon glyphicon-time fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Logged Hours </span>
                            <h2 class="font-bold"><?php echo $loggedhours;?></h2>
                        </div>
                    </div>
                </div>
                  
                    
           
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h3>Projects</h3>
                                
                                <div class="pull-right">
                                
                                   <!--  <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                                    </div> -->
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-10">
                                      <div class="ibox">

                    <table border="10" cellpadding="0" cellspacing="0" class="table table-bordered table-hover dataTables-example pretty cell-border" >
                   
                   <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Client</th>
                        <th>Allocated Resources</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Estimated Hrs</th>
                    </tr>
                    </thead>
                    <tbody class="pretty">
                   <?php foreach($results as $records){?>
                    <tr class="pretty">
                        <td><a href="<?php echo base_url();?>Menus/project_details/<?php echo $records->project_id ;?>" ><?php echo $records->Name ;?></a></td>
                        <?php /*echo $records->project_id;*/?> 
                        <td><?php echo $records->client_name ;?>
                        </td>
                        <td><?php echo $records->resources_allocatted ;?></td>
                        <td class="center"><?php echo $records->start_date ;?></td>
                        <td class="center"><?php echo $records->end_date ;?></td>
                       <td class="center"><?php echo $records->estimated_hours ;?></td>
                    </tr>
                  <?php }?>  
                    </tbody>
                    <tfoot>
                   
                    </tfoot>
                    </table>

                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins font-bold"> $ <?php echo $lm_earnings;?></h2>
                                            <small>Earnings last month</small>
                                            <!-- <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div> -->
                                            <!-- <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div> -->
                                        </li>
                                        <li>
                                            <h2 class="no-margins font-bold"> $ <?php echo $lm_bill;?></h2>
                                            <small>Billed amount last month</small>
                                           <!-- <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>-->
                                        </li>
                                        <li>
                                            <h2 class="no-margins font-bold"> $ <?php echo $lm_pending;?></h2>
                                            <small>Pending payments</small>
                                          <!--  <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>-->
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
               
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h3>Agile Dashboard</h3>
                                </div>
                                </div>
                                </div>
                                
                    
               <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>To-do</h3>
                             <p class="small"><i class="fa fa-hand-o-up"></i> Tasks yet to be started</p>

                          <!--  <div class="input-group">
                                <input type="text" placeholder="Add new task. " class="input input-sm form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-plus"></i> Add task</button>
                                </span>
                            </div> -->

                            <ul class="sortable-list connectList agile-list">
                                <?php  
                             //print_r($results);
                               foreach($todolist as $records)
                               {
                               	
                               //	echo '============'.$records->status;
                               	if($records->status == 'Not Started')
                               	{
                               	if( $records->priority == 'Minor')
                               	{
                               		?>
                               		
                               		<li class="success-element">
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               		
                               		</li>
                               		
                               <?php 			
                               	}
                               	
                               	elseif ($records->priority == 'Major')
                               	{?>
                               		<li class="warning-element">
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               		</li>
                               <?php 	
                               	}
                               	elseif ($records->priority == 'Critical')
                               	{?>
                               		<li class="danger-element">
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php 
                               	}
                               	
                               }
                               }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
               
               
              <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>In Progress</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Tasks in progress</p>
                            <ul class="sortable-list connectList agile-list">
                               <?php  
                             //print_r($results);
                               foreach($todolist as $records)
                               {
                               	
                               //	echo '============'.$records->status;
                                if($records->status == 'Progress' || $records->status == 'Reopened' || $records->status == 'Resolved')
                               {
                               	if( $records->priority == 'Minor')
                               	{
                               		?>
                               		<li class="success-element">
                               		
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php 			
                               	}
                               	
                               	elseif ($records->priority == 'Major')
                               	{?>
                               		<li class="warning-element">
                               		
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?></div>
                               <?php 	
                               	}
                               	elseif ($records->priority == 'Critical')
                               	{?>
                               		<li class="danger-element">
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php 
                               	}
                               	
                               }
                               }
                                ?>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Completed</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Tasks completed</p>
                            <ul class="sortable-list connectList agile-list">
                                 <?php  
                             //print_r($results);
                                 
                               foreach($todolist as $records)
                               {
                               	
                               //	echo '============'.$records->status;
                               if( $records->status == 'Closed')
                               {
                               	if( $records->priority == 'Minor')
                               	{
                               		?>
                               		<li class="success-element">
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php 			
                               	}
                               	
                               	elseif ($records->priority == 'Major')
                               	{?>
                               		<li class="warning-element">
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php 	
                               	}
                               	elseif ($records->priority == 'Critical')
                               	{?>
                               		<li class="danger-element">
                               		<a href="<?php echo base_url();?>Scrum/issue_details/<?php echo $records->issue_id ;?>">
                               		<?php echo $records->summary; ?></a><div class="team-members pull-right"> <img class="img-circle" data-placement="top" src="<?php echo(base_url()."./uploads/".$records->filename);?>"/></div>
                               		<div class="agile-detail"><i class="fa fa-clock-o"></i> <?php  echo $records->created_date; ?> </div>
                               <?php 
                               	}
                               	
                               }
                               }
                                
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>  
                    
                    
                    
                    
                    </div>



                </div>
       
            </div>
        </div>
        </div>
       

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url();?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/js/SCRUM.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url();?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?php echo base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="<?php echo base_url();?>assets/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url();?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url();?>assets/js/demo/sparkline-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#464f88",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
</body>
</html>
