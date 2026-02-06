<?php require_once "header.php" ?>

		<div class="row">

			<!-- 블로그 글 본문 보기 -->
			<div class="col-md-9">

				<!-- 블로그 글 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2></h3>
					</div>
					<div class="panel-body">
						<p>
							
						</p>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-6"><span class="category"><strong>[life]</strong></span>&nbsp;&nbsp;<span class="writer">홍길동</span>&nbsp;&nbsp;<span class="date">2017-03-05 15:30:22</span>&nbsp;&nbsp;<span class="commentcount">댓글수 <span class="badge">3</span></span></div>
							<div class="col-md-6 btns">
								<a href="modify.php" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> 수정</a>
								<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 삭제</a>
								<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-th-list"></span> 목록으로</a>
							</div>
						</div>						
					</div>
				</div>
				<!-- //블로그 글 -->

				<!-- 댓글 폼 -->
				<?php if (isset($_SESSION['user'])) :?>
				<div class="row">
					<form class="form-horizontal" action="/comments/action.php" method="POST">
						<input type="hidden" name="mode" value="comment">
						<div class="form-group">
							<label for="userid" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="userid" id="userid" placeholder="<?=$_SESSION['user']->email?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">댓글내용</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">댓글저장</button>
							</div>
						</div>
					</form>
				</div>
				<?php endif ?>
				<!-- //댓글 폼 -->

				<!-- 댓글 리스트 -->
					<?php
						$boardId = (int)($_GET['id']??0);
						
						$sql = "SELECT * FROM comments WHERE board_id = :board_id";
						$pstmt = $db->prepare($sql);
						$pstmt->execute(["board_id" => $boardId]);
	
						$comments = $pstmt->fetchAll();
					?>
				<div class="commentlist">
					<?php foreach (	$comments as $comment):?>
						<div class="comment">
							<h3><?=$comment->user_name?> <?=$comment->user_id?> <?=$comment->date?> <?php if(isset($_SESSION['user']) && $_SESSION['user']->name === $comment->user_name):?><a href="/comments/action.php?mode=delete&id=<?=$comment->comment_id?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a><?php endif; ?></h3>
							<p><?=$comment->text?></p>
						</div>	
					<?php endforeach; ?>
				</div>
			</div>

<?php require_once "footer.php" ?>