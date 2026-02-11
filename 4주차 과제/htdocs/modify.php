<?php require_once "header.php" ?>

	<?php
		$boardId = $_GET['id'];

		$sql = "SELECT * FROM boards WHERE board_id = :id";
		$pstmt = $db->prepare($sql);
		$pstmt->execute(['id'=>$boardId]);

		$board = $pstmt->fetch();
	?>
    <div class="row">
			<div class="col-md-9">

				<!-- 블로그 글쓰기 폼 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2>글수정</h2></h3>
					</div>
					<div class="panel-body">

						<form action="/boards/action.php" class="form-horizontal"method="POST" enctype="multipart/form-data">
						<input type="hidden" name="board_id" value="<?=$board->board_id?>">
                            <input type="hidden" name="mode" value="update">
							<div class="form-group">
								<label for="userid" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="userid" id="userid" value="<?=$_SESSION['user']->email?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">작성자</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="username" id="username" value="<?=$_SESSION['user']->name?>" readonly>
								</div>
							</div>							
							<div class="form-group">
								<label for="category" class="col-sm-2 control-label">카테고리</label>
								<div class="col-sm-10">
									<select class="form-control" name="category" id="category">
										<option value="life" selected>life</option>
										<option value="art">art</option>
										<option value="fashion">fashion</option>
										<option value="technics">technics</option>
										<option value="etcs">etcs</option>
									</select>																	
								</div>
							</div>						
							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">제목</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" id="title" placeholder="글 제목" value="<?=$board->title?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">글본문</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="8" name="comment" id="comment"><?=$board->text?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">이미지</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="upimg"> sample1.jpg
								</div>
							</div>													
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">글쓰기</button>
								</div>
							</div>
						</form>
						
					</div>
				</div>
				<!-- //블로그 글쓰기 폼 -->

			</div>

<?php require_once "footer.php" ?>