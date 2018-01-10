<?php require_once(dirname(__FILE__) . '/config.php'); 
if ( !isset($_SESSION['Admin_ID']) || $_SESSION['Login_Type'] != 'admin' ) {
   	header('location:' . BASE_URL);
} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Pay Heads - Wisely Payroll</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables_themeroller.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
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
				<h1>Pay Heads</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Pay Heads</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">List of Pay Heads</h3>
								<button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#PayheadsModal">
									<i class="fa fa-plus"></i> Add Pay Head
								</button>
							</div>
							<div class="box-body">
								<div class="table-responsiove">
									<table id="payheads" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class="text-center">HEAD #</th>
												<th>HEAD NAME</th>
												<th>HEAD DESCRIPTION</th>
												<th class="text-center">HEAD TYPE</th>
												<th class="text-center">ACTION</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="modal fade in" id="PayheadsModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Pay Heads</h4>
					</div>
					<form method="POST" role="form" data-toggle="validator" id="payhead-form">
						<div class="modal-body">
							<div class="form-group">
								<label for="payhead_name">Pay Head Name</label>
								<input type="text" class="form-control" id="payhead_name" name="payhead_name" placeholder="Pay Head Name" required />
							</div>
							<div class="form-group">
								<label for="payhead_desc">Pay Head Description</label>
								<textarea class="form-control" id="payhead_desc" name="payhead_desc" placeholder="Pay Head Description" required></textarea>
							</div>
							<div class="form-group">
				                <label for="payhead_type">Pay Head Type:</label>
				                <select class="form-control" id="payhead_type" name="payhead_type" required>
				                	<option value="">---Select Pay Head Type---</option>
				                	<option value="earnings">Earnings</option>
				                	<option value="deductions">Deductions</option>
				                </select>
				            </div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="payhead_id" id="payhead_id" />
							<button type="submit" name="submit" class="btn btn-primary">Save Pay Head</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<footer class="main-footer">
			<strong>Copyright &copy; 2017 <a href="http://wisely.co" target="_blank">Wisely</a>.</strong> All rights reserved.
		</footer>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/jquery-validator/validator.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script.js?rand=<?php echo rand(); ?>"></script>
</body>
</html>