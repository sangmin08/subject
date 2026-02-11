<?php require_once "header.php" ?>

		<div class="row">

			<!-- 블로그 글 목록 -->
			<div class="col-md-9">

				<?php
					$sql = "SELECT * FROM boards";
					$params = [];

					$pstmt = $db->prepare($sql);
					$pstmt->execute($params);

					$boards = $pstmt->fetchAll();
				?>

				<?php
					$sql = "SELECT board_id , COUNT(*) comment_count FROM comments GROUP BY board_id";
					
					$pstmt = $db->prepare($sql);
					$pstmt->execute();

					$com_counts = $pstmt->fetchall();

					$commap = [];
					foreach ($com_counts as $count) {
						$commap[$count->board_id] = $count->comment_count;
					}
				?>

				<?php foreach (	$boards as $board):?>
					<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2><?=$board->title?></h2></h3>
					</div>
					<div class="panel-body">
						<p>
							<?php
								if (!empty($board->img)):
							?>
							<img src="/images/<?=$board->img?>" alt="">
							<?php endif; ?>
							<?=$board->text?>	
						</p>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-6"><strong>[<?=$board->category?>]</strong></span>&nbsp;&nbsp;<span class="writer"><?=$board->user_name?></span>&nbsp;&nbsp;<span class="date"><?=$board->date?></span>&nbsp;&nbsp;<span class="commentcount">댓글수 <span class="badge"><?=$commap[$board->board_id] ?? 0?></span></span></div>
							<div class="col-md-6 btns">
							<?php if (isset($_SESSION['user']) && $_SESSION['user']->name === $board->user_name): ?>
								<a href="modify.php?id=<?=$board->board_id?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>수정</a>
								<a href="/boards/action.php?mode=delete&id=<?=$board->board_id?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 삭제</a>
								<?php endif; ?>
								<a href="view.php?id=<?=$board->board_id ?>" class="btn btn-primary"><span class="glyphicon glyphicon-zoom-in"></span> 더보기</a>
							</div>
						</div>
					</div>
				</div>		
				<?php endforeach; ?>
				
				<!-- 페이지네이션(pagination) -->
				<nav>
					<ul class="pagination pagination-lg">
						<li class="disabled">
							<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>				

			</div>
			<!-- //블로그 글 목록 -->

<?php require_once "footer.php"?>