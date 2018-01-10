<?php require_once(dirname(__FILE__) . '/config.php'); 
if ( !isset($_SESSION['Admin_ID']) || !isset($_SESSION['Login_Type']) ) {
   	header('location:' . BASE_URL);
} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Holidays - Wisely Payroll</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables_themeroller.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/iCheck/all.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/skins/_all-skins.min.css">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		
		<?php require_once(dirname(__FILE__) . '/partials/topnav.php'); ?>

		<?php require_once(dirname(__FILE__) . '/partials/sidenav.php'); ?>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>Holidays</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Holidays</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">List of Holidays</h3>
								<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
									<button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#HolidayModal">
										<i class="fa fa-plus"></i> Add Holiday
									</button>
								<?php } ?>
							</div>
							<div class="box-body">
								<div class="table-responsiove">
									<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
										<table id="holidays" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th class="text-center">HOLIDAY #</th>
													<th>HOLIDAY TITLE</th>
													<th>HOLIDAY DESCRIPTION</th>
													<th class="text-center">HOLIDAY DATE</th>
													<th class="text-center">HOLIDAY TYPE</th>
													<th class="text-center">ACTION</th>
												</tr>
											</thead>
										</table>
									<?php } else { ?>
										<table id="empholidays" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th class="text-center">HOLIDAY #</th>
													<th>HOLIDAY TITLE</th>
													<th>HOLIDAY DESCRIPTION</th>
													<th class="text-center">HOLIDAY DATE</th>
													<th class="text-center">HOLIDAY TYPE</th>
												</tr>
											</thead>
										</table>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
			<div class="modal fade in" id="HolidayModal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Holidays</h4>
						</div>
						<form method="post" role="form" data-toggle="validator" id="holiday-form">
							<div class="modal-body">
								<div class="form-group">
									<label for="holiday_title">Holiday Title</label>
									<input type="text" class="form-control" id="holiday_title" name="holiday_title" placeholder="Holiday Title" required />
								</div>
								<div class="form-group">
									<label for="holiday_desc">Description</label>
									<textarea class="form-control" id="holiday_desc" name="holiday_desc" placeholder="Holiday Description" required></textarea>
								</div>
								<div class="form-group">
					                <label for="holiday_date">Holiday Date (MM/DD/YYYY)</label>
					                <div class="input-group date">
					                  	<div class="input-group-addon">
					                    	<i class="fa fa-calendar"></i>
					                  	</div>
					                  	<input type="text" class="form-control datepicker pull-right" id="holiday_date" name="holiday_date" required />
					                </div>
					            </div>
					            <div class="row">
					            	<div class="col-sm-6">
							            <div class="form-group">
											<label for="compulsory_holiday">
												<input type="radio" value="compulsory" id="compulsory_holiday" name="holiday_type" class="minimal" checked /> Compulsory Holiday
											</label>
										</div>
									</div>
									<div class="col-sm-6">
							            <div class="form-group">
											<label for="restricted_holiday">
												<input type="radio" value="restricted" id="restricted_holiday" name="holiday_type" class="minimal" /> Restricted Holiday
											</label>
										</div>
									</div>
					            </div>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="holiday_id" id="holiday_id" />
								<button type="submit" name="submit" class="btn btn-primary">Save Holiday</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>

		<footer class="main-footer">
			<strong>Copyright &copy; 2017 <a href="http://wisely.co" target="_blank">Wisely</a>.</strong> All rights reserved.
		</footer>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/jquery-validator/validator.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/iCheck/icheck.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script.js?rand=<?php echo rand(); ?>"></script>
</body>
</html>