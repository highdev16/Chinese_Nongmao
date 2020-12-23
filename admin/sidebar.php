<nav id="sidebar" class="sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.php">
      		<span class="align-middle">农贸市场设</span>
    	</a>

		<ul class="sidebar-nav">
			<!-- <li class="sidebar-header">
				Pages
			</li> -->

			<li class="sidebar-item <?php if ($ACTIVE == 1) echo 'active'; ?>">
				<a class="sidebar-link" href="index.php">
	              <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">旗帜管理</span>
	            </a>
			</li>
			<li class="sidebar-item <?php if ($ACTIVE == 2) echo 'active'; ?>">
				<a class="sidebar-link" href="index1.php">
	              <i class="align-middle" data-feather="aperture"></i> <span class="align-middle">案例管理</span>
	            </a>
			</li>
			<li class="sidebar-item <?php if ($ACTIVE == 7) echo 'active'; ?>">
				<a class="sidebar-link" href="index7.php">
	              <i class="align-middle" data-feather="image"></i> <span class="align-middle">图片</span>
	            </a>
			</li>
			<li class="sidebar-item <?php if ($ACTIVE == 3) echo 'active'; ?>">
				<a class="sidebar-link" href="index2.php">
	              <i class="align-middle" data-feather="mail"></i> <span class="align-middle">新闻资讯管理</span>
	            </a>
			</li>
			<li class="sidebar-item  <?php if ($ACTIVE == 4) echo 'active'; ?>">
				<a class="sidebar-link" href="index3.php">
	              <i class="align-middle" data-feather="link"></i> <span class="align-middle">友情链接管理</span>
	            </a>
			</li>
			<li class="sidebar-item <?php if ($ACTIVE == 5) echo 'active'; ?>">
				<a class="sidebar-link" href="index4.php">
	              <i class="align-middle" data-feather="book"></i> <span class="align-middle">表单管理</span>
	            </a>
			</li>
			<li class="sidebar-item <?php if ($ACTIVE == 9) echo 'active'; ?>">
				<a class="sidebar-link" href="index9.php">
	              <i class="align-middle" data-feather="external-link"></i> <span class="align-middle">咨询的链接</span>
	            </a>
			</li>
			<li class="sidebar-item <?php if ($ACTIVE == 8) echo 'active'; ?>">
				<a class="sidebar-link" href="index8.php">
	              <i class="align-middle" data-feather="slack"></i> <span class="align-middle">合作伙伴</span>
	            </a>
			</li>
			<li class="sidebar-item <?php if ($ACTIVE == 6) echo 'active'; ?>">
				<a class="sidebar-link" href="index5.php">
	              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">关键词管理</span>
	            </a>
			</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="javascript:void(0)" onclick='confirmRegeneratePages()'>
	              <i class="align-middle" data-feather="refresh-ccw" style='color: yellow;'></i> <span class="align-middle" style='color: yellow; font-weight: bold'>重新生成页面</span>
	            </a>
			</li>
			<script>
				let processingPages = false;
				function confirmRegeneratePages() {
					if (processingPages) {
						alert("仍在处理中...等待响应最多10秒钟。"); return;
					}
					if (!confirm("您确定要重新生成所有页面和静态URL吗? (这需要一段时间。)")) return;
					$.post("//gggyyy.cn:8080/isprocessworkon", function(a,b) {
						if (b != 'success') {
							alert("失败！ 意外的错误。\n与开发人员联系以解决此问题。");
							return;
						}
						try {
							a = JSON.parse(a);
						} catch(e) {
							alert("失败！ 意外的错误。\n与开发人员联系以解决此问题。");
							return;
						}
						if (a.result == 'success') {
							if (!confirm("当前正在构建静态网页。\n\n总页数：" + a.totalCount + "\n完成的页面：" + a.currentIndex + "\n进行中的页面：" + a.filesInProgress + "\n\n您要取消并重新开始处理吗？")) return;
						}
						else if (a.result == 'done') {}
						else {
							alert("失败！ 意外的错误。\n与开发人员联系以解决此问题。");
							return;
						}

						processingPages = true;
						$.post("//gggyyy.cn:8080/workon", function(a,b) {
							processingPages = false;
							if (a == 'success' && b == 'success') {
								alert("成功！ 请等待一段时间（最多一个小时）。");
							} else {
								alert("失败！ 无法继续您的请求。 与开发人员联系以解决此问题。");
							}							
						}).fail(function() {
							processingPages = false;
							alert("失败！ 服务器功能失败。\n与开发人员联系以解决此问题。");
						})
					}).fail(function() {
						alert("失败！!! 服务器功能失败。\n与开发人员联系以解决此问题。");
					})
				}
			</script>			
		</ul>
	</div>
</nav>