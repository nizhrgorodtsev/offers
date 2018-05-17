<?php 
	session_start();
	$objects = new Objects; 
	if(!empty($_GET['id']))$objects->id = $_GET['id'];
	$users = new Users;
?>

<?php 
	function active($param){
		if(!empty($_GET['content'])){
			if($_GET['content'] == $param)echo '<li class="active">';
			else echo '<li>';
		}
		else echo '<li>';
	}
?>

<?php if(isset($_SESSION['id'])):?>
<?php $users->id = $_SESSION['id'];?>
<div class="page">
	<!-- Main Navbar-->
	<header class="header">
        <nav class="navbar">
			<!-- Search Box-->
			<div class="search-box">
				<button class="dismiss"><i class="icon-close"></i></button>
				<form id="searchForm" action="#" role="search">
					<input type="search" placeholder="What are you looking for..." class="form-control">
				</form>
			</div>
			<div class="container-fluid">
				<div class="navbar-holder d-flex align-items-center justify-content-between">
					<!-- Navbar Header-->
					<div class="navbar-header">
						<!-- Navbar Brand --><a href="index.html" class="navbar-brand">
						<div class="brand-text brand-big"><span></span> <strong></strong></div>
						<div class="brand-text brand-small"><strong></strong></div></a>
						<!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
					</div>
					<!-- Navbar Menu -->
					<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
						<!-- Logout    -->
						<li class="nav-item"><a href="<?php echo $objects->buildLink('login') . "&login=logoute"; ?>" class="nav-link logout">Вихід<i class="fa fa-sign-out"></i></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
			<!-- Sidebar Header-->
			<div class="sidebar-header d-flex align-items-center">
				<div class="avatar"><img src="<?php echo $users->getDataUser()['avatar']; ?>" alt="" class="img-fluid rounded-circle"></div>
				<div class="title">
					<h1 class="h4"><?php echo $users->getDataUser()['name']; ?></h1>
					<p><?php echo $users->printAccessLevel(); ?></p>
				</div>
			</div>
			<!-- Sidebar Navidation Menus<span class="heading">Main</span>-->
			<ul class="list-unstyled">
				<?php if(!empty($_GET['content'])): active('offercontent');?>
				<?php else :?>
				<li class="active">
					<?php endif; ?>
					<a href="<?php echo $objects->buildLink('offer') . "&content=offercontent"; ?>"> 
					<i class="icon-home"></i>Головна </a>
				</li>
				<?php active('profile');?>
				<a href="<?php echo $objects->buildLink('offer') . "&content=profile"; ?>"> 
				<i class="icon-user"></i>Профіль </a>
			</li>
			<!-------- menu admin --------->
			<?php if($users->getDataUser()['access_level'] == 'admin'): ?>
			<?php active('adminobjects');?>
			<a href="<?php echo $objects->buildLink('offer') . "&content=adminobjects"; ?>"> 
			<i class="fa fa-building-o"></i>Об'єкти </a>
		</li>	
		
		<?php active('adminusers');?>
		<a href="<?php echo $objects->buildLink('offer') . "&content=adminusers"; ?>"> 
		<i class="fa fa-users"></i>Користувачі </a>
	</li>
	
	<?php active('adminoffers');?>
	<a href="<?php echo $objects->buildLink('offer') . "&content=adminoffers"; ?>"> 
	<i class="fa fa-usd"></i>Пропозиції </a>
</li>					
<?php endif; ?>
</ul>

</nav>
<div class="content-inner">
	<!-- Page Header-->
	<header class="page-header">
		<div class="container-fluid">
			<h2 class="no-margin-bottom">
				<?php if(empty($_GET['content']) or $_GET['content'] == 'offercontent'): echo $objects->dataObject()['name']?>
				<?php else:  ?>
				<?php if($_GET['content'] == 'profile'): ?>
				Профіль
				<?php endif; ?>
				<?php if($_GET['content'] == 'adminobjects' || $_GET['content'] == 'editobject' || $_GET['content'] == 'addobject'): ?>
				Об'єкти
				<?php endif; ?>	
				<?php if($_GET['content'] == 'adminusers'): ?>
				Користувачі
				<?php endif; ?>	
				<?php if($_GET['content'] == 'adminoffers'): ?>
				Пропозиції
				<?php endif; ?>					
				<?php endif; ?>
			</h2>
		</div>
	</header>	
	
	<?php if(!empty($_GET['content'])):?>
	<?php include $_GET['content'] . ".php" ?>
	<?php else: ?>		  
	<?php include "offercontent.php";?>
	<?php endif; ?>
	
	<!-- Page Footer-->
	<footer class="main-footer">
		<div class="container-fluid">
			<div class="row">
                <div class="col-sm-6">
					<p>Гід Ріедті &copy; 2008-2018</p>
				</div>
                <div class="col-sm-6 text-right">
					<p>Developed by 
						<a target="blank" href="https://www.facebook.com/nizhehorodtsev" class="external">Nizhegorodtsev</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
</div>
</div>
</div>

<?php else : ?> 
<?php 
	$link = 'page404/' . $objects->actionLink('index');
	header('Location: ' . $link);
?>
<?php endif; ?>