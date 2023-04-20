<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
if (empty($_SESSION['my_userdata'])) {
  redirect('/');
}
?>
<!DOCTYPE html>
<html lang="en" slick-uniqueid="3">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <title>royalbook</title>

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/app/favicon.ico?version=1.12314745689)!important">
  <link href="<?php echo base_url(); ?>assets/app/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/app/font-awesome.min.css?version=1635691263" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>assets/app/style.css?version=1635691263" rel="stylesheet">



  <link href="<?php echo base_url(); ?>assets/app/responsive.css?version=1635691263" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Barlow:400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/app/pnotify.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/app/menu.css?version=1635691263" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/app/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/app/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/app/owl.theme.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/app/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/app/daterangepicker.js"></script>
  <link href="<?php echo base_url(); ?>assets/app/jquery.dataTables.min.css " rel="stylesheet" type="text/css" />


 
  <script>
    var betNotifyjs = '1'
  </script>


  <?php echo $template_css; ?>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php echo $template_js; ?>

  <script src="<?php echo base_url(); ?>assets/app/bootbox.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/exchange/aes.js"></script>
  <script src="<?php echo base_url(); ?>assets/exchange/aes-json-format.js"></script>
  <script src="<?php echo base_url(); ?>assets/exchange/socket.io.js"></script>
  <script src="<?php echo base_url(); ?>assets/exchange/serialize_json.js"></script>

  <link type="text/css" href="<?php echo base_url(); ?>assets/exchange/jquery.countdown.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/exchange/jquery.countdown.js"></script>
  <script src="<?php echo base_url(); ?>assets/app/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/app/aes.js"></script>
<script src="<?php echo base_url(); ?>assets/app/aes-json-format.js"></script>

<script src="<?php echo base_url(); ?>assets/app/js.cookie.min.js"></script>
  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script>
    var socket = io('<?php echo get_ws_endpoint(); ?>', {
      transports: ['websocket'],
      rememberUpgrade: false
    });


    function submit_update_chip() {

      var datastring = $("#stockez_add").serializeJSON();

      $.ajax({
        type: "post",
        url: '<?php echo base_url(); ?>admin/Chip/update_user_chip',
        data: datastring,
        cache: false,
        dataType: "json",
        success: function success(output) {

          if (output.success) {
            $("#divLoading").show();
            $("#divLoading").html("<span class='succmsg'>" + output.message + "</span>");
            $("#divLoading").fadeOut(3000);
            new PNotify({
              title: 'Success',
              text: output.message,
              type: 'success',
              styling: 'bootstrap3',
              delay: 1000
            });
            location.reload();
          } else {
            $("#divLoading").show();
            $("#divLoading").html("<span class='errmsg'>" + output.message + "</span>");
            $("#divLoading").fadeOut(3000);
            new PNotify({
              title: 'Error',
              text: output.message,
              type: 'error',
              styling: 'bootstrap3',
              delay: 1000
            });
          }
        }
      });
    }

    console.log('socket', socket);
  </script>


</head>

<body class="bg-">
  <div class="spinner" id="loader-1" style="display: none;"></div>
  <?php echo $template_header; ?>
  <?php echo $template_content; ?>
  <?php echo $template_footer; ?>
  </div>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
</body>

</html>