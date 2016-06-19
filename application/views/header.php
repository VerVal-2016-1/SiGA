<!DOCTYPE html>
<br>
<?php
	require_once(APPPATH."/constants/GroupConstants.php");
	require_once(APPPATH."/data_types/notification/ActionNotification.php");
	require_once(APPPATH."/data_types/User.php");

	$session = $this->session->userdata("current_user");

	if($session){
		$user = $session['user'];

		// Getting user notifications
		$userObj = new User($user['id'], $user['name'], FALSE, $user['email']);	
		$userNotifications = $this->navbarnotification->getUserNotifications($userObj);

		$notifications = $userNotifications["notifications"];
		$notSeenNotifications = $userNotifications["not_seen"];
		
		echo form_input(array(
			'id' => "notifications_amount",
			'name' => "notifications_amount",
			'type' => "hidden",
			'value' => count($notifications)
		));
	}
?>
<html>
<head>
	<meta charset="UTF-8">

	<title>SiGA</title>

	<link rel="stylesheet" href=<?=base_url("css/bootstrap.css")?>>
	<link rel="stylesheet" href=<?=base_url("css/estilo.css")?>>
	<link rel="stylesheet" href=<?=base_url("font-awesome-4.2/css/font-awesome.min.css")?>>
	<link rel="stylesheet" href=<?=base_url("css/AdminLTE.css")?>>
	<link rel="stylesheet" href=<?=base_url("css/jquery-ui.min.css")?>>
	<link rel="stylesheet" href=<?=base_url("css/jquery-ui.structure.min.css")?>>
	<link rel="stylesheet" href=<?=base_url("css/jquery-ui.theme.min.css")?>>

	<script src=<?=base_url("js/jquery-2.1.1.min.js")?>></script>
	<script src=<?=base_url("js/bootstrap.min.js")?>></script>
	<script src=<?=base_url("js/AdminLTE/app.js")?>></script>
	<script src=<?=base_url("js/popovers.js")?>></script>
	<script src=<?=base_url("js/enrollment.js")?>></script>
	<script src=<?=base_url("js/payment.js")?>></script>
	<script src=<?=base_url("js/notification.js")?>></script>
	<script src=<?=base_url("js/request.js")?>></script>
	<script src=<?=base_url("js/user.js")?>></script>
	<script src=<?=base_url("js/course.js")?>></script>
	<script src=<?=base_url("js/selectiveprocess.js")?>></script>
	<script src=<?=base_url("js/jquery.inputmask.js")?>></script>
	<script src=<?=base_url("js/jquery.inputmask.numeric.extensions.js")?>></script>
	<script src=<?=base_url("js/jquery.inputmask.date.extensions.js")?>></script>
	<script src=<?=base_url("js/jquery.mask.min.js")?>></script>
	<script src=<?=base_url("js/jquery.tablesorter.min.js")?>></script>
	<script src=<?=base_url("js/jquery-ui.min.js")?>></script>
	<script src=<?=base_url("js/datepicker-pt-BR.js")?>></script>
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/ico">
</head>

<body class="skin-green-light">
	<header>
		<?php
			$this->load->helper('url');
			$site_url = site_url();

			echo "<input id='site_url' name='site_url' type='hidden' value=\"$site_url\"></input>";
		?>
		<div class="navbar navbar-fixed-top" role="navigation">
			<div class="navbar-btn sidebar-toggle" role="button">
				<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><?=anchor("/", "Home", "class='navbar-brand'")?></li>
					<?php if ($session) { ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">

						<li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>

                                <?php if ($notSeenNotifications !== 0){ ?>
                                	<span class="label label-warning">
                                		<?php echo $notSeenNotifications;?>
                                	</span>
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="header"><?php echo "<b>Você tem ".$notSeenNotifications." notificação(ões) não vista(s).</b>";?></li>
                                <li>                                
                                    <!-- inner menu: contains the actual data -->
                                    <div style="position: relative; overflow: hidden; width: auto; height: 200px;" class="slimScrollDiv">

                                    <ul style="overflow-y: scroll; width: 100%; height: 200px;" class="menu">
                                        
                                        <?php
                                        	$i = 1;
                                        	foreach ($notifications as $notification){

                                        		if($notification->seen()){
                                        			echo "<li>";
                                        		}else{
                                        			echo "<li class='not_seen'>";
                                        		}

                                        		$notificationLinkId = "notification_".$i;

                                    			$notificationId = $notification->id();

                                    			if($notification->type() == ActionNotification::class){
													echo "<a onclick='setNotificationSeen({$notificationId});' id='{$notificationLinkId}' href='".$notification->link()."'>";
                                    			}else{
                                    				echo "<a id='{$notificationLinkId}' onclick='setNotificationSeen({$notificationId});'>";
                                    			}

                                    			echo "<i class='fa fa-bell info'></i>";
                                    			echo $notification->content();

                                    			echo "</a>";
                                        		echo "</li>";

                                        		$i++;
                                        	}

                                        ?>
                                        
                                    </ul>

                                    <div style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 156.863px;" class="slimScrollBar"></div>

                                    <div style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
                                </li>
                                <li class="footer"><a href="#">Visualizar todas</a></li>
                            </ul>
                        </li>

						<li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?=ucfirst($session['user']['name'])?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header ">
                                    <p>
                                        <?php
                                        	echo ucfirst($session['user']['name']);

                                        	echo "<br><br><small><b>	Grupos cadastrados:</b></small>";
                                        	if($session['user_groups'] !== FALSE){
                                        		
	                                        	foreach($session['user_groups'] as $group){
	                                        		switch ($group['group_name']) {
	                                        			case GroupConstants::ACADEMIC_SECRETARY_GROUP:
	                                        				$groupNameToDisplay = "Secretaria acadêmica";
	                                        				break;
	                                        			case GroupConstants::FINANCIAL_SECRETARY_GROUP:
	                                        				$groupNameToDisplay = "Secretaria financeira";
	                                        				break;
	                                        			default:
	                                        				$groupNameToDisplay = $group['group_name'];
	                                        				break;
	                                        		}
	                                        		echo ucfirst($groupNameToDisplay);
	                                        		echo "<br>";
	                                        	}
                                        	}
                                        ?>
                                        <br>
                                        <small><?php echo $session['user']['email']?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?=anchor("profile", "Conta", "class='btn btn-default btn-flat'")?>
                                    </div>
                                    <div class="pull-right">
                                        <?=anchor("logout", "Sair", "class='btn btn-default btn-flat'")?>
                                    </div>
                                </li>
                            </ul>
                        </li>
					</ul>
				<?php } else { ?>

					<li><?=anchor("usuario/novo", "Cadastro", "class='navbar-brand'")?></li>
					</ul>

						<ul class="nav navbar-nav navbar-right">
					<?php
						echo form_open("login/autenticar");?>
							<div class="row">
        						<div class="col-lg-4">
								<?php
									// echo form_label("Login", "login");
									echo form_input(array(
										"name" => "login",
										"id" => "login",
										"type" => "text",
										"class" => "form-campo",
										"maxlength" => "255",
										"value" => set_value("login", ""),
										"class" => "form-control",
										"placeholder" => "Usuário",
									));
									?>
								</div>
								<div class="col-lg-4">
								<?php
									// echo form_label("Senha", "senha");
									echo form_input(array(
										"name" => "senha",
										"id" => "senha",
										"type" => "password",
										"class" => "form-campo",
										"maxlength" => "255",
										"class" => "form-control",
										"placeholder" => "Senha"
									));
								?>
								</div>
								<!-- <br> -->
								<div class="col-lg-2">
									<?php
										echo form_button(array(
											"id" => "login_btn",
											"class" => "btn btn-default",
											"content" => "Entrar",
											"type" => "submit"
										));
									
									
									?>
								</div>
							</div>
							<?php
										echo form_close();
										echo anchor("usuario/restorePassword", "Esqueci minha senha", "id='link'");
										?>
						</ul>

				<?php }?>

				</div>
			</div>
		</div>

	</header>
	<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php if($session){?>
	            <aside class="left-side sidebar-offcanvas sidebar-fixed">
	                <!-- sidebar: style can be found in sidebar.less -->
	                <section class="sidebar">
	                    <!-- Sidebar user panel -->
	                    <div class="user-panel">
	                        <div class="pull-left info">
	                            <br>
	                            <p>Olá, <?=ucfirst($session['user']['name'])?></p>

	                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

	                            <br><br>
	                            <div class="input-group-btn">
		                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
		                            Perfil <span class="fa fa-caret-down"></span></button>

		                            <ul class="dropdown-menu">
		                            	<?php
		                            		foreach($session['user_groups'] as $group){
		                            			echo "<li>";
		                            			switch ($group['group_name']) {
                                        			case GroupConstants::ACADEMIC_SECRETARY_GROUP:
                                        				$groupNameToDisplay = "Secretaria acadêmica";
                                        				break;
                                        			case GroupConstants::FINANCIAL_SECRETARY_GROUP:
                                        				$groupNameToDisplay = "Secretaria financeira";
                                        				break;
                                        			default:
                                        				$groupNameToDisplay = $group['group_name'];
                                        				break;
                                        		}
		                            			if($group['group_name'] == GroupConstants::SECRETARY_GROUP){
													continue;
												}else{
		                            				echo anchor($group['profile_route'], ucfirst($groupNameToDisplay));
		                            			}
		                            			echo "</li>";
		                            		}
		                            	?>
		                            </ul>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- search form -->
<!-- 	                    <form action="#" method="get" class="sidebar-form">
	                        <div class="input-group">
	                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
	                            <span class="input-group-btn">
	                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
	                            </span>
	                        </div>
	                    </form> -->
	                    <!-- /.search form -->
	                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
	                <?php
	                	if($session['user_permissions'] !== FALSE){

							foreach($session['user_permissions'] as $groupName => $groupPermissions){
	                			if($groupName == GroupConstants::SECRETARY_GROUP){
									continue;
								}else{
									echo "<li class='treeview'>";

									switch ($groupName) {
	                        			case GroupConstants::ACADEMIC_SECRETARY_GROUP:
	                        				$groupNameToShow = "Secretaria acadêmica";
	                        				break;
	                        			case GroupConstants::FINANCIAL_SECRETARY_GROUP:
	                        				$groupNameToShow = "Secretaria financeira";
	                        				break;
	                        			default:
	                        				$groupNameToShow = $groupName;
	                        				break;
	                        		}
									echo anchor("", ucfirst($groupNameToShow),"class='fa fa-folder-o'");

										echo "<ul class='treeview-menu'>";

										if($groupPermissions !== FALSE){

											foreach($groupPermissions as $permission){

												echo "<li>";
													if ($permission['route'] == PermissionConstants::RESEARCH_LINES_PERMISSION){
														continue;
													}else{
														echo anchor($permission['route'], $permission['permission_name'], "class='fa fa-caret-right'");
													}
												echo "</li>";
											}
										}

										echo "</ul>";

									echo "</li>";
								}
							}

	                	}
					?>
                  	</ul>
	                </section>
	                <!-- /.sidebar -->
	            </aside>
            <?php }?>
            <aside class="right-side">
            	<div class="container">
<br>
<br>
<?php
if ($this->session->flashdata("success")) : ?>
	<p class="alert alert-success text-center"><?= $this->session->flashdata("success") ?></p>
<?php endif;
if ($this->session->flashdata("danger")) : ?>
	<p class="alert alert-danger text-center"><?= $this->session->flashdata("danger") ?></p>
<?php endif; ?>