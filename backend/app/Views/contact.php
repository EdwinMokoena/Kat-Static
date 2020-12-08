<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=2"><title></title><meta content="width=device-width, initial-scale=2.0, maximum-scale=1.0, user-scalable=0" name="viewport"><meta name="viewport" content="width=device-width"><link href="<?php echo base_url(); ?>/bootstrap3/css/bootstrap.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/assets/css/demo.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/assets/css/styles.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/bootstrap3/css/bootstrap-grid.min.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/bootstrap3/css/bootstrap-reboot.min.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/bootstrap3/css/font-awesome.css" rel="stylesheet"><link rel="stylesheet" href="https://use.typekit.net/fio2tgl.css"></head><body><?php if($name && $surname && $email){ echo($email ." ".$name." ".$surname); } ?><div id="navbar-full"><div class="container"><nav class="navbar navbar-fixed-top navbar-default" role="navigation"><div class="container"><div class="navbar-header"><button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.html"><div class="logo-container"><div class="logo pb-5 pt-0"><img src="./assets/img/logo.jpg"></div><div class="brand">SIMSCONSULTANCY</div></div></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><ul class="nav navbar-nav navbar-right"><li><a href="<?php base_url();?>">Home</a></li><li><a href="<?php base_url();?>/services">Consultancy and Governance</a></li><li><a href="<?php base_url();?>/esg">ESG</a></li><li><a href="<?php base_url();?>/about-us">About Us</a></li><li><a href="<?php base_url();?>/contact-us">Contact Us</a></li></ul></div></div></nav></div><div class="jumbotron py-5" style="background-image: url('./assets/img/contact-us-cover.png'); background-position:center center;"><div class="container"><div class="row mb-4 p-md-5 text-left text-black pb-sm-5" style="background-color:transparent;"><div class="col-md-12 px-4 ml-5 d-flex flex-column col-sm-12"><h1 class="mb-4"><strong class="d-sm-block w-100">Contact Us</strong></h1></div><div class="col-md-3 px-5 ml-5 d-flex flex-column col-sm-12"><h2>Address</h2><p>17 Edelvalk Crescent<br>Liefde en Vrede<br>Mulbarton 2198</p></div><div class="col-md-3 px-5 ml-5 d-flex flex-column col-sm-12 mx-sm-1"><h2>Phones</h2><p>+27 11 432 3386</p></div><div class="col-md-3 px-5 ml-5 d-flex flex-column col-sm-12 mx-sm-1"><h2>Email</h2><p>info@simsconsultancy.co.za</p></div></div></div></div></div><main class="main p-4 bg-dark text-white"><div class="container text-white"><div class="row"><div class="tim-typo text-left col-12"><h1><strong>Reach Out Today</strong></h1><p class="mt-3">SIMS Advisory assists in the assessment of the effectiveness of the
governing body. Enter your email address and we'll contact you</p></div><div class="col-md-9 col-sm-12"><form id="contact-form" method="POST" action="<?php echo base_url('contact-form');?>"><div class="row"><div class="form-group col-md-6 my-3 col-sm-12 mx-sm-auto" id="name-form-group"><input class="form-control" id="name" type="text" name="name" placeholder="Name..."><span class="help-block p-2"></span></div><div class="form-group col-md-6 my-3 col-sm-12 mx-sm-auto" id="surname-form-group"><input class="form-control" id="surname" type="text" name="surname" placeholder="Surname..."><span class="help-block p-2"></span></div></div><div class="row"><div class="form-group col-md-8 my-3 col-sm-12 mx-sm-auto" id="email-form-group"><input class="form-control" id="email" type="email" name="email" placeholder="Email..."><span class="help-block p-2"></span></div><div class="from-group col-md-4 my-3 col-sm-12 mx-sm-auto"><button class="btn btn-block" id="contact-btn" type="submit">Submit</button></div></div></form></div></div></div></main><script src="<?php echo base_url(); ?>/jquery/jquery-1.10.2.js" type="text/javascript"></script><script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script><script src="<?php echo base_url(); ?>/bootstrap3/js/bootstrap.js" type="text/javascript"></script><script src="<?php echo base_url(); ?>/assets/js/gsdk-checkbox.js"></script><script src="<?php echo base_url(); ?>/assets/js/gsdk-radio.js"></script><script src="<?php echo base_url(); ?>/assets/js/gsdk-bootstrapswitch.js"></script><script src="<?php echo base_url(); ?>/assets/js/get-shit-done.js"></script><script src="<?php echo base_url(); ?>/assets/js/custom.js"></script><script>var contact_form = $("#contact-form");
var contact_btn = $("#contact-btn");
contact_btn.click(function(e){
  e.preventDefault();
  req = $.ajax({
    url       : "<?php echo base_url('contact-form');?>",
    type      : "POST",
    data      : contact_form.serialize(),
    headers   : {'X-Requested-With': 'XMLHttpRequest'}
  });
  req.success(function(res){
    console.log(contact_form[0]);
  });
  req.fail(function(res){
    res = JSON.parse(res.responseText);
    if (res.messages["name"] == undefined){
      $("#name-form-group").addClass("has-error");
      console.log($("#name-form-group .help-block"));
      $("#name-form-group .help-block").html(
        res.messages["name"]
      );

    }
    if (res.messages["surname"] == undefined){
      $("#surname-form-group").addClass("has-error");
      $("#surname-form-group span.help-block").html(
        res.messages["surname"]
      );
    }
    if (res.messages["email"] == undefined){
      $("#email-form-group").addClass("has-error");
      $("#email-form-group span.help-block").html(
        res.messages["email"]
      );
    }
  });
});</script></body></html>