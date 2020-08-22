<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle d-flex">
      <i class="hamburger align-self-center"></i>
    </a>
	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                	<i class="align-middle" data-feather="settings"></i>
              	</a>

				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
	                <span class="text-dark"><?php echo htmlspecialchars($_SESSION['nickname']);?></span>
	              </a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="/"><i class="align-middle mr-1" data-feather="eye"></i> 预览网站</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="modify_user.php"><i class="align-middle mr-1" data-feather="settings"></i> 修改资料</a>								
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="logout.php">退出</a>
				</div>
			</li>
		</ul>
	</div>
</nav>