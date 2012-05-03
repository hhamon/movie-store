<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>
        <?php include_slot('title', 'My First Application') ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <h1>Demo Application</h1>

    <?php if ($sf_user->hasFlash('notice')) : ?>
        <div class="notice">
            <?php echo $sf_user->getFlash('notice') ?>
        </div>
    <?php endif ?>

    <?php echo $sf_content ?>
  </body>
</html>
