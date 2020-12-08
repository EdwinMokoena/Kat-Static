<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=2"><title></title><meta content="width=device-width, initial-scale=2.0, maximum-scale=1.0, user-scalable=0" name="viewport"><meta name="viewport" content="width=device-width"><link href="<?php echo base_url(); ?>/bootstrap3/css/bootstrap.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/assets/css/demo.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/assets/css/styles.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/bootstrap3/css/bootstrap-grid.min.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/bootstrap3/css/bootstrap-reboot.min.css" rel="stylesheet"><link href="<?php echo base_url(); ?>/bootstrap3/css/font-awesome.css" rel="stylesheet"><link rel="stylesheet" href="https://use.typekit.net/fio2tgl.css"></head><body><div id="navbar-full"><div class="container"><nav class="navbar navbar-fixed-top navbar-default" role="navigation"><div class="container-fluid"><div class="navbar-header"><button class="navbar-toggle mt-4" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.html"><div class="logo-container"><div class="logo pb-5 pt-0"><img class="img-responsive" src="./assets/img/logo.jpg"></div><div class="brand">SIMSCONSULTANCY</div></div></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><ul class="nav navbar-nav navbar-right"><li><a href="<?php base_url();?>/">Home</a></li><li><a href="<?php base_url();?>/services">Consultancy</a></li><li><a href="<?php base_url();?>/esg">ESG</a></li><li><a href="<?php base_url();?>/about-us">About Us</a></li><li><a href="<?php base_url();?>/contact-us">Contact Us</a></li></ul></div></div></nav></div><div class="jumbotron text-left py-5" style="background-image: url('./assets/img/about-us-cover.png'); background-position:top center;"><div class="container"><div class="row text-white" style="background-color:transparent;"><div class="col-md-8 col-sm-12 p-2"><div class="col-md-12 text-white"><h1 class="jumbotron-heading mt-5"><strong class="d-sm-block w-100">Who We Are</strong></h1></div><div class="col-md-12 py-2"><p class="my-4">SIMS Corporate Governance and Compliance Consultancy is a specialist provider
of secretarial, corporate governance, compliance, training and conference solution.</p><p class="my-4">We work together with boards, directors, and senior management to be most efficient
and to align organisations towards best practices and accountability.
All this is done within the confines of applicable regulations through a diligent and thorough
address of issues such as board committee composition, audit guidelines, and policy manual
development among others, both for public corporations and private sector players.</p><p class="my-4">We further provide platforms for professionals and academics to enhance their skills and knowledge,
through corporate governance and compliance workshops, master classes, training conferences.</p><p class="my-4">Over and above our consultancy services, we organise and host training workshops,
master-class and various forums that are structured to address governance related issues.
The conceptualisation of our forums is informed by thorough research on market trends and
demands to ensure we meet our client's needs in the most relevant manner.</p><p class="my-4">Our team of professionals ensures that we continously improve the corporate governance
culture through a personalised and client-oriented approach.</p><p class="my-5">Although our foot-print is currently confined within the African continent, we are structured
to ensure that our activities will reach the entire global economies.</p></div></div></div></div></div></div><main class="main bg-light p-4"><div class="container"><div class="bg-light"><div class="row"><div class="tim-typo text-left col-12"><h1><strong>Reach Out Today</strong></h1><p class="mt-3">SIMS Advisory assists in the assessment of the effectiveness of the
governing body. Enter your email address and we'll contact you</p></div><div class="col-md-9 col-sm-12"><form id="contact-form" method="POST" action="<?php echo base_url('contact-form');?>"><div class="row"><div class="form-group col-md-6 my-3 col-sm-12 mx-sm-auto" id="name-form-group"><input class="form-control" id="name" type="text" name="name" placeholder="Name..."><span class="help-block px-2">enter a valid name</span></div><div class="form-group col-md-6 my-3 col-sm-12 mx-sm-auto" id="surname-form-group"><input class="form-control" id="surname" type="text" name="surname" placeholder="Surname..."><span class="help-block px-2">enter a valid surname</span></div></div><div class="row"><div class="form-group col-md-8 my-3 col-sm-12 mx-sm-auto" id="email-form-group"><input class="form-control" id="email" type="email" name="email" placeholder="Email..."><span class="help-block px-2">enter a valid email</span></div><div class="from-group col-md-4 my-3 col-sm-12 mx-sm-auto"><button class="btn btn-block" id="contact-btn" type="submit">Submit</button></div></div></form></div></div></div></div></main><script src="<?php echo base_url(); ?>/jquery/jquery-1.10.2.js" type="text/javascript"></script><script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script><script src="<?php echo base_url(); ?>/assets/js/jquery-migrate-1.4.1.min.js" type="text/javascript"></script><script src="<?php echo base_url(); ?>/bootstrap3/js/bootstrap.js" type="text/javascript"></script><script src="<?php echo base_url(); ?>/assets/js/gsdk-checkbox.js"></script><script src="<?php echo base_url(); ?>/assets/js/gsdk-radio.js"></script><script src="<?php echo base_url(); ?>/assets/js/gsdk-bootstrapswitch.js"></script><script src="<?php echo base_url(); ?>/assets/js/get-shit-done.js"></script><script src="<?php echo base_url(); ?>/assets/js/custom.js"></script><script>var contact_form = $("#contact-form");
var contact_btn = $("#contact-btn");
var name_help_block = $("#name-form-group .help-block").hide();
var surname_help_block = $("#surname-form-group span.help-block").hide();
var email_help_block = $("#email-form-group span.help-block").hide();
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
    $("#name-form-group").addClass("has-error");
    name_help_block.html(
      res.messages["name"]
    );
    name_help_block.show();

    $("#surname-form-group").addClass("has-error");
    surname_help_block.html(
      res.messages["surname"]
    );
    surname_help_block.show();
    $("#email-form-group").addClass("has-error");
    email_help_block.html(
      res.messages["email"]
    );
    email_help_block.show();
  });
});</script></body></html>