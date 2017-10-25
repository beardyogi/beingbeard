
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="logo" src = "<?php echo $base_url.'assets/dist/frontend/images/logo.png'?>">&nbsp;Being Beard</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#download"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#features"><i class="fa fa-question-circle" aria-hidden="true"></i>How Does it Work?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo $base_url.'trending'?>"><i class="fa fa-free-code-camp" aria-hidden="true"></i>Campaigns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact"><i class="fa fa-address-book" aria-hidden="true"></i>Contact</a>
            </li>
            <?php if ($this->ion_auth->logged_in()){?>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?php echo $base_url.'auth/logout'?>">
                <i class="fa fa-sign-out" aria-hidden="true"></i>  Logout
                </a>
                </li>
              <?php }else { ?>
                <li class="nav-item">
                <a class="nav-link js-scroll-trigger " href="<?php echo $base_url.'auth/login'?>">
                  <i class="fa fa-sign-in" aria-hidden="true"></i>Login/Signup
                </a>
                  </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

</div>
</nav>
