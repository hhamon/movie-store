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
    <div id="wrapper">
      <div id="inner">
        <div id="header">
          <h1>Online Movie Store</h1>
            <div id="nav">
              <a href="http://www.dreamtemplatestudio.com">Home</a> | <a href="http://www.dreamtemplatestudio.com">Stores</a> | <a href="http://www.dreamtemplatestudio.com">New Movies</a> | <a href="http://www.dreamtemplatestudio.com">your account</a> | <a href="http://www.dreamtemplatestudio.com">view cart</a> | <a href="http://www.dreamtemplatestudio.com">help</a>
              </div><!-- end nav -->
              <img src="/images/banner.jpg" width="744" height="200" alt="" />
            </div><!-- end header -->
            <dl id="browse">
              <dt>Movies Category Lists</dt>
              <dd class="first"><a href="http://www.dreamtemplatestudio.com">Action &amp; Adventure</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Anime &amp; Manga</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Art House &amp; International</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Classics</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Comedy</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Cult Movies</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Drama</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">New &amp; Future Releases</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Horror</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Musicals</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Mystery &amp; Suspense</a></dd>
              <dd><a href="http://www.dreamtemplatestudio.com">Science Fiction &amp; Fantasy</a></dd>
              <dd class="last"><a href="http://www.dreamtemplatestudio.com">Westerns</a></dd>

              <dt>Search </dt>
                <dd class="searchform">
                  <form action="?" method="get">
                    <div><input name="q" type="text" value="Keyword" class="text" /></div>
                    <div class="softright"><input type="image" src="/images/btn_search.gif" /></div>
                  </form>
                </dd>
              </dl>

              <div id="body">
                <div class="inner">
                  <?php if ($sf_user->hasFlash('notice')) : ?>
                    <div class="notice">
                      <?php echo $sf_user->getFlash('notice') ?>
                    </div>
                  <?php endif ?>

                  <?php echo $sf_content ?>
                </div>
              </div><!-- end body -->
              <div class="clear"></div>
              <div id="footer">
                  Copyright &copy; 2010
                  &nbsp;
                  <div id="footnav">
                    <a href="http://www.dreamtemplatestudio.com">home</a> | <a href="http://www.dreamtemplatestudio.com">contact Us</a>
                  </div><!-- end footnav -->
              </div><!-- end footer -->
      </div><!-- end inner -->
    </div><!-- end wrapper -->
  </body>
</html>    