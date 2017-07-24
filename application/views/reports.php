<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCRUM | Reports</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
   
    
    
     <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
   <script type="text/javascript">
   // $(document).on("click", ".btn", function () {
     function test1(title,username,issue_id,logged_estimate)
     {
         

         
         $(".modal-body #userid").val( username );
         $(".modal-body #title").val( title );
         $(".modal-body #issue_id").val( issue_id );
         $(".modal-body #logged_estimate").val( logged_estimate );
         
     
     
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
}
     </script>
     
     
     <script type="text/javascript" src="https://www.google.com/jsapi"></script>
     
        <script type="text/javascript">
       
            google.load("visualization", "1.1", {packages: ['corechart', 'line']});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
            	var data = new google.visualization.DataTable();
                data.addColumn('date', 'Day');
               
                data.addColumn('number', 'Estimated');
                data.addColumn('number', 'Actual');
                data.addRows([
                              
                              

                              <?php 
                              		$datarows="";
                              		foreach ($chart_data as $row) {
                              			//print_r('[5,6,7],[8,9,10]');
                              		 $datarows=$datarows. '[' . $row['day'] . '' . $row['avg'] . '' . $row['actual'] .  '],';
                              		}
                              		echo $datarows; 
                              		?>
                            ]);

                 
                var options = {
                        hAxis: {
                          title: 'Days'
                        },
                        vAxis: {
                          title: 'Effort Remaining'
                        },
                        colors: ['#a52714', '#097138'],
                        crosshair: {
                          color: '#000',
                          trigger: 'selection'
                        }
                      };
 
                var chart = new google.visualization.LineChart(document.getElementById('columnchart_material'));
 
                chart.draw(data, options);
            }
       
        </script>
     
     
</head>

<body class="no-skin-config">


    <div id="wrapper">

   

        <div id="page-wrapper" class="white-bg">
         <div class="row border-bottom ">
       
        <nav class="navbar " role="navigation">
            <div class="navbar-header">
               
				<h2>&nbsp;Sprint BurnDown Chart</h2>

               
            </div>
            </nav>
        </div>

       
       
       <?php include 'projectmenu.php';?>
       
       
                <div class="col-lg-8 animated fadeInRight">
                
                  
                    <div class="row">

                    <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sprint Release Burndown Chart</h5>
                          <?php
                       /*  $datarows="";
                		foreach ($chart_data as $row) {
                			//print_r('[5,6,7],[8,9,10]');
                		 $datarows=$datarows. '[' . $row['day'] . ',' . $row['avg'] . ',' . $row['actual'] .  '],';
                		} */
                		//echo $datarows;
                		?>
                       
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                  
                  
                    <div class="ibox-content">

                        <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
                    </div>
                
            </div>
           
        
    <!-- Mainly scripts -->
    
   <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Custom and plugin javascript -->
     <script src="<?php echo base_url();?>assets/js/SCRUM.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>
    
 <script src="<?php echo base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

   <!-- Data picker -->
   <script src="<?php echo base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Peity -->
    <script src="<?php echo base_url();?>assets/js/plugins/iCheck/icheck.min.js"></script>
     <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
   
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?php echo base_url();?>assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'http://agilescrumsolutions.com/example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
</body>
</html>
