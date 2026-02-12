<?php require_once "header.php" ?>

<div class="row">

			<!-- 블로그 글 쓰기 -->
			<div class="col-md-9">

				<!-- 블로그 글쓰기 폼 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2>글쓰기</h2></h3>
					</div>
					<div class="panel-body">

						<form action="/boards/action.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mode" value="write">

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
										<option value="life">life</option>
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
									<input type="text" class="form-control" name="title" id="title" placeholder="글 제목" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">글본문</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="8" name="comment" id="comment" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">이미지</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" name="upimg" id="upimg">
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