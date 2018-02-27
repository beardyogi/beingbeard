
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="logo" src = "<?php echo $base_url.'assets/dist/frontend/images/logo.png'?>">&nbsp;Being Beard</a>
        <?php 
            $social_id = $this->session->userdata['social_id'];
            $login_status = $this->session->userdata['logged_in'];
            if($login_status == 'true'){?>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger link" href="<?php echo $base_url.'trending'?>">Campaigns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo $base_url.'profile'?>"><img src="<?php echo 'https://graph.facebook.com/'.$social_id.'/picture?type=square'?>" width="50px" height="50px" /></a>
            </li>
              <?php }?>
          </ul>
        </div>
      </div>
    </nav>

</div>
</nav>
