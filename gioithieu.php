<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Code Club | Giới Thiệu</title>
</head>
<body>
    <div class="container">
      <div class="row">
            <?php include 'inc/nav.php'; ?>
             <li class="nav-item">
              <!-- Search form -->
              <form action="search.php" method="get" class="sear" autocomplete="off" 
              id="hdTutoForm">
                <div class="md-form active-pink active-pink-2 mb-3 mt-0">
                  <span class="icon"><i class="fa fa-search"></i></span>
                <input class="form-control search" id="keywords" name="keywords" required="" type="text" placeholder="Enter For Search" aria-label="Search">
                <a id="spinner" href=""><i class="fa fa-spinner fa-spin"></i></a>
              </div>
                <div id="goiy">
                                    <ul class="list-gpfrm" id="hdTuto_search"></ul>
                                </div>
              </form>
            </li>
        </ul>
          <div class="mid col-sm-12 text-center">
            <hr>
            <p>Redefine education</p>
            <h1>Học lập trình miễn phí cùng <a href="" class="align-content-stretch">Code Club</a></h1>
            <p class="flight"><i class="fa fa-paper-plane-o"></i></p>         
          </div>
      </div>
      <div class="col-sm-12 dangnhap">
        <!-- The Modal -->
        <div class="modal fade" id="dangnhap">
          <div class="modal-dialog">
            <div class="modal-content">
                
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                <?php 
                if (isset($login_Check)) {
                    ?>            
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo $login_Check; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <?php
                }
                ?>

                <div class="container-content">
                  <form style="display: none;" id="Sign" class="margin-t was-validated" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="******" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <button type="submit" name="signin" class="form-button button-l margin-b">Đăng nhập</button>
                        <label>
                          <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
                      </label>
                      <br />
                      <a class="text-darkyellow" href="#"><small>Quên mật khẩu?</small></a>
                      <a class="text-darkyellow" href="#"><p class="text-whitesmoke text-center"><small>Bạn chưa có tài khoản?</small></p></a>
                  </form>
                  <?php 
                      if (empty($_COOKIE['siteAuth'])) {
                   ?>
                  <form class="margin-t was-validated" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="******" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <button type="submit" name="signin" class="form-button button-l margin-b">Đăng nhập</button>
                        <label>
                          <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
                      </label>
                      <br />
                      <a class="text-darkyellow" href="#"><small>Quên mật khẩu?</small></a>
                      <a class="text-darkyellow" href="#"><p class="text-whitesmoke text-center"><small>Bạn chưa có tài khoản?</small></p></a>
                  </form>

                  <?php }else { ?>
                    <form id="signAuth" class="margin-t was-validated" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" disabled="" name="email" value="<?php 
                              if(isset($_COOKIE['siteAuth'])){ 
                                 parse_str($_COOKIE['siteAuth']); 
                                 echo $email;
                                 // $login_Re = $login->login_Re($email,$pass);                
                               }
                             ?>" placeholder="Email" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" value="<?php 
                              if(isset($_COOKIE['siteAuth'])){ 
                                 parse_str($_COOKIE['siteAuth']); 
                                 echo $email;
                                 // $login_Re = $login->login_Re($email,$pass);                
                               }
                             ?>" name="pass" placeholder="******" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <button type="submit" name="signinCookie" class="form-button button-l margin-b">Đăng nhập</button>
                        <button type="button" id="chuyenForm" name="chuyenForm" class="form-button button-l margin-b">Đăng nhập tài khoản khác</button>
                        <label>
                          <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
                      </label>
                      <br />
                      <a class="text-darkyellow" href="#"><small>Quên mật khẩu?</small></a>
                      <a class="text-darkyellow" href="#"><p class="text-whitesmoke text-center"><small>Bạn chưa có tài khoản?</small></p></a>
                  </form>
                <?php } ?>
                  <p class="margin-t text-whitesmoke"><small> Anh Tú  Copyright &copy; 2019</small> </p>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 dangki">
    <!-- The Modal -->
    <div class="modal fade" id="dangki">
      <div class="modal-dialog">
        <div class="modal-content">
            
            <div>
                <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
            </div>
            <div class="container-content">
                <?php 
                if (isset($dangki)) {
                    ?>            
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo $dangki; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <form class="margin-t was-validated" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Họ và tên" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="image" required="">
                        <label class="custom-file-label" for="customFile">Vui lòng chọn ảnh đại diện.</label>
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="repassword" class="form-control" placeholder="Nhập lại Password" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <button type="submit" name="dangki" class="form-button button-l margin-b">Đăng Kí</button>
                </form>
                <p class="margin-t text-whitesmoke"><small> Anh Tú  Copyright &copy; 2019</small> </p>
            </div>

            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>
</div>

<!-- Giới thiệu -->
<div class="row gioithieu">
    <div class="col-sm-12">
        <div class="text-center">
            <p>Đăng ký để nhận ngay khoá học lập trình hoàn toàn <strong class="alert-danger">MIỄN PHÍ.</strong></p>
        </div>
        <div class="lido">
            <p class="text-center">Tại sao bạn nên học tại <a href="" class="align-content-stretch">Code Club</a>?</p>
            <p><a href="" class="align-content-stretch">Code Club</a> đang xây dựng một cộng đồng lập trình viên lớn nhất Việt Nam, nơi mọi người được học lập trình miễn phí, giúp đỡ nhau cả trong quá trình học cũng như đi làm.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right back-to-top" style="position: fixed; top: 550px; display: none;">
             <i class="fa fa-caret-square-o-up animated infinite bounce"></i>
         </div>
     </div>
 </div>
 <div class="col-sm-12 d-flex text-center details">
    <div class="col-sm-3">
        <img src="image/gt1.svg">
        <p class="table-info">Bắt đầu từ đâu?</p>
        <p>Khó khăn đầu tiên ai cũng gặp phải khi học lập trình: Bắt đầu từ đâu? <a href="" class="align-content-stretch">Code Club</a> có 10 khoá học theo trình tự giúp bạn trở thành developer từ con số 0.</p>
    </div>
    <div class="col-sm-3">
        <img src="image/gt2.svg">
        <p class="table-info">Hỗ trợ 24/7</p>
        <p>Nhóm chat trên Slack với hàng ngàn thành viên thân thiện giúp đỡ nhau giải quyết các bài tập khó gặp phải trong quá trình học.</p>
    </div>
    <div class="col-sm-3">
        <img src="image/gt3.svg">
        <p class="table-info">Học để đi làm</p>
        <p>Các khoá học được cập nhật với các kiến thức mới nhất và ngắn nhất giúp bạn tự tin xin việc sau khi học xong.</p>
    </div>
    <div class="col-sm-3">
        <img src="image/gt4.svg">
        <p class="table-info">Khởi đầu suôn sẻ</p>
        <p>Sau khi học xong các khoá học, bạn sẽ có cơ hội được giới thiệu tới các doanh nghiệp tại Việt Nam hoàn toàn miễn phí.</p>
    </div>
</div>
</div>
<div class="row learn animated flipInX slower">
    <div class="col-sm-12">
        <div class="text-center">
            <h2>Bạn sẽ được học gì?</h2>
        </div>
        <div class="lido">
            <p>Đến với cộng đồng <a href="" class="align-content-stretch">Code Club</a> không những bạn được học về lập trình miễn phí, bạn còn có cơ hội thực tập với những dự án thực tế, có cơ hội được giới thiệu tới các công ty lớn tại Việt Nam.</p>
        </div>
    </div>
    <div class="col-sm-12 d-flex learning">
        <div class="col-sm-1">
            <div class="border0"><span class="number">1</span></div>
            <div class="border1"><span class="number">2</span></div>
            <div class="border2"><span class="number">3</span></div>
            <div class="border3"><span class="number">4</span></div>
        </div>
        <div class="col-sm-5 noidung">
            <div>
                <p class="table-info">Học lập trình cơ bản</p>
                <p class="giaidap">Bạn sẽ được làm quen với ngôn ngữ lập trình JavaScript, các ngôn ngữ khác phục vụ cho lập trình web như HTML, CSS.</p>
            </div>
            <div>
                <p class="table-info">Học lập trình nâng cao</p>
                <p class="giaidap">Khoá học này bao gồm JavaScript nâng cao, các framework được sử dụng để lập trình cho front-end và back-end.</p>
            </div>
            <div>
                <p class="table-info">Làm dự án</p>
                <p class="giaidap">Sau khi học xong lập trình nâng cao, bạn sẽ được thực tập với một dự án nhỏ quy mô 1 dev, được người có kinh nghiệm hơn review code. Sau đó sẽ thực tập với các dự án lớn hơn, sát với công việc thực tế hơn và quy mô team lớn hơn.</p>
            </div>
            <div>
                <p class="table-info">Học các kỹ năng để đi làm tại công ty</p>
                <p class="giaidap">Trước khi vào các làm việc, các bạn sẽ được đào tạo các kĩ năng cơ bản để có thể thích nghi được với môi trường làm việc của một đất nước công nghiệp, những kĩ năng mà bạn thường không được học ở trường lớp.</p>
            </div>
        </div>
        <div class="col-sm-6">
            <img src="image/editor.svg">
        </div>
    </div>
</div>
<div class="row text-center mucdich">
    <div class="col-sm-12 table-bordered animated flipInX slower">
        <p class="title">Mục đích của mình là gì?</p>
        <p class="desc">Mình có một mong muốn là giúp những người nghèo ở khắp nơi trên thế giới, những người mà không có tiền mua máy tính, được học và làm quen với lập trình. Mình muốn định hướng cho các bạn trẻ thích học lập trình mà không biết bắt đầu từ đâu. Với tốc độ thay đổi công nghệ nhanh như hiện tại, càng nhiều lập trình viên giỏi thì thế giới càng phát triển nhanh hơn.</p>
        <br>
        <p class="say">“Stay hungry, stay foolish.”</p>
        <h1 class="name">Steve Jobs</h1>
        <h6>CEO — Apple Inc.</h6>
        <div class="iconsweb">
            <i class="fa fa-facebook-square"></i>
            <i class="fa fa-youtube-play"></i>
            <i class="fa fa-twitter"></i>
        </div>
        <div class="footer">
            <p>Copyright © 2019 Codeclub.com</p>
        </div>
        
    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>
<script>
    $(document).ready(function(){
        $(window).scroll(function(event) {
          var pos_body = $('html,body').scrollTop();
          if(pos_body>500){
           $('.learn').show().addClass('animated zoomInDown fast');
       }else{
           $('.learn').hide(1000);
       }
       if(pos_body>1500){
           $('.back-to-top').show(1000);
           $('.mucdich').show(2000);
       }else{
           $('.back-to-top').hide(1000);
           $('.mucdich').hide(2000);
       }
   });

        $('.back-to-top').click(function(event) {
            $('html,body').animate({scrollTop: 0},1400);
        });

    });
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>