<?php
require_once('connect.php');


$sql = "SELECT id, title, name , tel , start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<?php 
		include ("nevbar2.php")
		?>
		<title>ตารางงาน</title>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- FullCalendar -->
		<link href='lib/fullcalendar.min.css' rel='stylesheet' />

		<script src='lib/jquery.min.js'></script>
		<!-- jQuery Version 1.11.1 -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- FullCalendar -->
		<script src='lib/moment.min.js'></script>
		<script src='lib/fullcalendar.min.js'></script>

		<!-- validator -->
		<script src="validator/jquery.form.validator.min.js"></script>
		<script src="validator/security.js"></script>
		<script src="validator/file.js"></script>
		<link href="validator/validator.css" rel="stylesheet">


		<!-- Custom CSS -->
		<style>
			body {
				padding-top: 50px;
				/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
			}

			#calendar {
				max-width: 90%;
			}

			.col-centered {
				float: none;
				margin: 0 auto;
			}
		</style>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	</head>

	<body>

	
		<!-- Page Content -->
		<div class="container">

			<div class="row">

				<div class="col-lg-12 text-center">
					<h1>ตารางงาน</h1>
					<div id="calendar" class="col-centered">
					</div>
				</div>

			</div>
			<!-- /.row -->

			<!-- Modal -->
			<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" action="addEvent.php">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Add Event</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="title" class="col-sm-2 control-label">เรื่อง</label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title" placeholder="เรื่อง" autocomplete="off" data-validation="required" data-validation-ignore="$" >
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">ชื่อ</label>
									<div class="col-sm-10">
										<input type="text" name="name" class="form-control" id="name" placeholder="ชื่อ-นามสกุล"
										data-validation="required" autocomplete="off" >
									</div>
								</div>
								<div class="form-group">
									<label for="tel" class="col-sm-2 control-label">เบอร์ติดต่อ</label>
									<div class="col-sm-10">
										<input type="text" name="tel" class="form-control" id="tel" placeholder="เบอร์ติดต่อ"
										data-validation="length number" data-validation-length="max10" autocomplete="off" >
									</div>
								</div>								
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label">Markสี</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">เลือกสี</option>
											<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
											<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
											<option style="color:#008000;" value="#008000">&#9724; Green</option>
											<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
											<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
											<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
											<option style="color:#000;" value="#000">&#9724; Black</option>

										</select>

									</div>
								</div>
				 			<div class="form-group">
				 				<label for="start" class="col-sm-2 control-label">เริ่มต้นวันที่</label>	
				 				<div class="col-sm-10">
				                <div class='input-group date' >
									<input type="text" name="start" class="form-control" id='start'  readonly>
				                   		<span class="input-group-addon">
				                       		 <span class="glyphicon glyphicon-calendar"></span>
				                   		 </span>
				                	</div>
				            </div>
				            </div>
					 			<div class="form-group">
				 				<label for="start" class="col-sm-2 control-label">สิ้นสุดวันที่</label>	
				 				<div class="col-sm-10">
				                <div class='input-group date' >
									<input type="text" name="end" class="form-control" id='dateInputend'  
									readonly  >
				                   		<span class="input-group-addon">
				                       		 <span class="glyphicon glyphicon-calendar"></span>
				                   		 </span>
				            	    	</div>
				          		  </div>
				              </div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" action="editEventTitle.php">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="title" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title" placeholder="Title">
									</div>
								</div>
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Choose</option>
											<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
											<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
											<option style="color:#008000;" value="#008000">&#9724; Green</option>
											<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
											<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
											<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
											<option style="color:#000;" value="#000">&#9724; Black</option>

										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="checkbox">
											<label class="text-danger">
												<input type="checkbox" name="delete"> Delete event</label>
										</div>
									</div>
								</div>

								<input type="hidden" name="id" class="form-control" id="id">


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>

		<!-- /.container -->
		<?php date_default_timezone_set("Asia/Bangkok");
		$date = date("Y-m-d");
		?>

		<script>
			$(document).ready(function () {
	     		$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						//right: 'month,basicWeek,basicDay'
						right: 'เดือน,agendaWeek,agendaDay,listMonth'
					},				
					navLinks: true,
					defaultDate: '<?php echo$date?>',
					minTime: '10:00:00',
					maxTime: '24:00:00',
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					selectable: true,
					selectHelper: true,
					select: function (start, end) {
						$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD 10.30.00'));
						$('#ModalAdd').modal('show');
					},
					eventRender: function (event, element) {
						element.bind('dblclick', function () {
							$('#ModalEdit #id').val(event.id);
							$('#ModalEdit #title').val(event.title);
						    $('#ModalEdit #name').val(event.name);
							$('#ModalEdit #tel').val(event.tel);
							$('#ModalEdit #color').val(event.color);
							$('#ModalEdit').modal('show');
						});
					},
					eventDrop: function (event, delta, revertFunc) { // si changement de position
						edit(event);
					},
					eventResize: function (event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
						edit(event);
					},
					events: [
			<?php foreach($events as $event):
						$start = explode(" ", $event['start']);
					$end = explode(" ", $event['end']);
					if($start[1] == '00:00:00'){
					$start = $start[0];
				}else {
					$start = $event['start'];
				}
				if ($end[1] == '00:00:00') {
					$end = $end[0];
				} else {
					$end = $event['end'];
				}
			?>
					{
						id: '<?php echo $event['id']; ?>',
						title: '<?php echo $event['title']; ?>',
						name: '<?php echo $event['name']; ?>',	
						tel: '<?php echo $event['tel']; ?>',																	
						start: '<?php echo $start; ?>',
						end: '<?php echo $end; ?>',
						color: '<?php echo $event['color']; ?>',
					},
			<?php endforeach; ?>
			]
			});

			function edit(event) {
				start = event.start.format('YYYY-MM-DD HH:mm:ss');
				if (event.end) {
					end = event.end.format('YYYY-MM-DD HH:mm:ss');
				} else {
					end = start;
				}

				id = event.id;

				Event = [];
				Event[0] = id;
				Event[1] = start;
				Event[2] = end;

				$.ajax({
					url: 'editEventDate.php',
					type: "POST",
					data: { Event: Event },
					success: function (rep) {
						if (rep == 'OK') {
							alert('บันทึก');
						} else {
							alert('Could not be saved. try again.');
						}
					}
				});
			}
		
	});

		</script>
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
 
<script>
$(function(){    
    $("#dateInputend").datetimepicker({
        format: "yyyy-mm-dd HH:ii.mm ",
        autoclose: true,
        todayBtn: true  });
});
</script>
 <script>
 $.validate({
 modules: 'security, file',
 onModulesLoaded: function () {
 $('input[name="pass_confirmation"]').displayPasswordStrength();
 }
 });
 		</script>
	</body>
</html>