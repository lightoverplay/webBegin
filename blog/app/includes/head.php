<head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <?php if (isset($post)): ?>
            <title><?php echo $post["title"] ?>| kinsou</title>
            <?php else: ?>
            <title>kinsou</title>
      <?php endif ?>
      
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="asserts/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="asserts/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="asserts/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="asserts/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="asserts/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>