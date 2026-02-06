<?php require_once "db.php"; ?>


        <div class="col-md-3">

				<div class="loginarea">
					<div class="panel panel-default">
					<div class="panel-body">
                        <?php if (isset($_SESSION['user'])) :?>
							<?php
								$sql = "SELECT user_name, COUNT(*) AS post_count FROM boards WHERE user_name = :user_name";

								$pstmt = $db->prepare($sql);
								$pstmt->execute([
									"user_name" => $_SESSION['user']->name
								]);

								$mycounts = $pstmt->fetch();
							?>
							<p><?=$_SESSION['user']->email?></p>
                            <p><?=$_SESSION['user']->name?></p>
							<p>등록한 글의 개수 : <?=$mycounts->post_count?>개</p>
                            <a href="/users/action.php?mode=logout">로그아웃</a>
                        <?php else : ?>
                            <form action="/users/action.php" class="form-horizontal" method="POST">
                            <input type="hidden" name="mode" value="login">
                            <div class="form-group">
                                <div class="col-sm-12">
                                <input type="email" class="form-control" name="userid" id="userid" placeholder="email@domain.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <input type="password" class="form-control" name="userpass" id="userpass" placeholder="비밀번호">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <button type="submit" class="btn btn-default">로그인</button>
                                <a href="join.php"><button type="button" class="btn btn-info">회원가입</button></a>
                                </div>
                            </div>
                            </form>  
                        <?php endif; ?>
					</div>
					</div>					
				</div>

				<div>
					<?php if (isset($_SESSION['user'])) :?>
						<a href="write.php" class="writebtn btn btn-primary btn-lg col-sm-12"><span class="glyphicon glyphicon-pencil"></span> 글쓰기</a>
					<?php endif;?>
						
				</div>

				<div class="categories">
					<h3>Categories</h3>
					<ul>
						<li>전체보기 <span class="badge">128</span></li>
						<li>life <span class="badge">12</span></li>
						<li>art <span class="badge">32</span></li>
						<li>fashion <span class="badge">50</span></li>
						<li>technics <span class="badge">22</span></li>
						<li>etcs <span class="badge">9</span></li>
					</ul>
				</div>
				
				<?php
					$sql = "SELECT user_name, COUNT(*) AS post_count FROM boards GROUP BY user_name";

					$pstmt = $db->prepare($sql);
					$pstmt->execute();

					$counts = $pstmt->fetchAll();
				?>
				
				<div class="authors">
					<h3>Authors</h3>
					<ul>
						<?php foreach ($counts as $count) :?>
						<li><?=$count->user_name?> <span class="badge"><?=$count->post_count?></span></li>
						<?php endforeach; ?>
					</ul>
				</div>

			</div>


		</div>
		<div class="footer">
			Copyright &copy; <strong>Our Blog</strong> All rights reserved.
		</div>
	</div>
</body>
</html>