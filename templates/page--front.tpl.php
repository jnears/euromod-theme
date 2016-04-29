<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="page-wrap">

<header class="header" id="header" role="banner">
<div class="page">
<a id="handheld-btn" class="closed" href="#"><i class="fa fa-bars "></i></a>
    

    <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <div id="navigation">

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation" tabindex="-1">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see https://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

    </div>
  
    <a class="header__logo" accesskey="1" href="/">EUROMOD</a>
      
</div>
<div id="site-search">
    <?php print render($page['header']); ?>
</div>


  </header>

<nav class="handheld-menu" role="navigation">
<ol>
<li>
<a class="" href="/about">About EUROMOD</a>
<ol>
<li><a href="/about/what-is-euromod">What is EUROMOD?</a></li>
<li><a href="/about/meet-team">Meet the team</a></li>
<li><a href="/about/country-by-country">Country by Country</a></li>
<li><a href="/contact">Contact</a></li>
</ol>
</li>
<li>
<a class="" href="/research">Research Analysis</a>
<ol>
<li><a href="/research/projects">Research Projects</a></li>
<li><a href="/publications/">Research Publications</a></li>
<li><a href="/research/reports">Reports</a></li>
<li><a href="/research/impact">Impact</a></li>
</ol>
</li>
<li>
<a class="" href="/using-euromod/">Using EUROMOD</a>
<ol>
<li><a href="/using-euromod/access">Access</a></li>
<li><a href="/using-euromod/user-resources">User Resources</a></li>
<li><a href="/using-euromod/statistics">Statistics</a></li>
<li><a href="/using-euromod/country-reports/">Country Reports</a></li>
</ol>
</li>
</ol>
</nav>

<div class="home-banner">
<div class="page region-middle">
<h1 class="page__title title" id="page-title">Tax-benefit microsimulation model for the European Union</h1>
    <div class="row icons">
      <div class="col col-3 match-height">
        <a href="/about"><i class="fa fa-cogs fa-8x"></i></a>
        <a class="btn-e plain padded large" href="/about">About EUROMOD</a>
        <ul>
          <li>
            <a href="/about/what-is-euromod">What is EUROMOD?</a>
          </li>
          <li>
            <a href="/about/meet-team">Meet the team</a>
          </li>
          <li>
            <a href="/about/country-by-country">Country by Country</a>
          </li>
          <li>
            <a href="/contact">Contact</a>
          </li>
        </ul>
      </div>
    <div class="col col-3 match-height">
      <a href="/research"><i class="fa fa-bar-chart fa-8x"></i></a>
      <a class="btn-e plain padded large" href="/research">Research Analysis</a>
      <ul>
        <li>
          <a href="/research/projects">Research Projects</a>
        </li>
        <li>
          <a href="/publications/">Publications</a>
        </li>
        <li>
          <a href="/research/impact">Impact</a>
        </li>
      </ul>
    </div>
    <div class="col col-3 match-height">
      <a href="/using-euromod/"><i class="fa fa-desktop fa-8x"></i></a>
      <a class="btn-e plain padded large" href="/using-euromod/">Using EUROMOD</a>
      <ul>
        <li>
          <a href="/using-euromod/access">Access</a>
        </li>
        <li>
          <a href="/using-euromod/user-resources">User Resources</a>
        </li>
        <li>
          <a href="/using-euromod/statistics">Statistics</a>
        </li>
        <li>
          <a href="/using-euromod/country-reports/">Country Reports</a>
        </li>
      </ul>
    </div>
    </div>
    </div>
    </div>
<div class="page">
  

  <div id="main">
<?php print $breadcrumb; ?>
    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      
      <a id="main-content"></a>
      
       

  


      <div class="row">
  <div class="col col-3 transparent match-height">
<h3>
<a class="mask" href="/news">News</a>
</h3>
       <?php
//Render news view

$block = module_invoke('views', 'block_view', 'news-block_news_home');
print render($block['content']);
?>   
</div>
<div class="col col-3 transparent match-height">
  <h3>
<a class="mask" href="/publications">Publications</a>
</h3>
<?php
//Render publications view
$block = module_invoke('views', 'block_view', 'publications-block_publications_home');
print render($block['content']);
?>
</div>
<div class="col col-3 transparent match-height">
  <h3>
<a class="mask" href="/events">Events</a>
</h3>
  <?php
//Render events view
$block = module_invoke('views', 'block_view', 'events-block_events_home');
print render($block['content']);
?>
  </div>
</div>


<hr>


<div class="row">
  <div class="col col-3 transparent match-height">
    <h3>
      <a class="mask" href="/newsletters">Newsletters</a>
    </h3>
      <?php
      //Render events view
      $block = module_invoke('views', 'block_view', 'newsletters-block_newsletters_home');
      print render($block['content']);
      ?>
  </div>
  <div class="block col-3 transparent match-height">
    <h3>
      <a class="mask" href="/research/taking-the-european-view">Taking the European view</a>
    </h3>
    <a href="/research/taking-the-european-view"><img src="/sites/default/files/images/ttev.jpg" alt="Taking the European view"></a>
  </div>
  <div class="col col-3 transparent match-height">
    <form class="form-simple" action="https://iser.createsend.com/t/r/s/jhdyhyi/" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="otokpvr/vLjn6IrmHeENZXQuv38x73T92QEEqnSQHu2VVBjnDF6IUG5rVkctNGKxd+VAPeVG8z4L2wLPF+iaqA==">
      <fieldset>
      <legend>Sign up</legend>
      <p class="lead">
      Subscribe to the <strong>EUROMOD</strong> email for notifications of new publications and reports.
      </p>
      <div class="field">
      <label for="cm-name">
      Name
      </label>
      <input type="text" name="cm-name" id="cm-name" value="" placeholder="e.g. Jane Doe">
      </div>
      <div class="field">
      <label for="jhdyhyi-jhdyhyi">
      Email
      </label>
      <input type="text" name="cm-jhdyhyi-jhdyhyi" id="jhdyhyi-jhdyhyi" value="" placeholder="e.g. jane.doe@example.com">
      </div>
      <button type="submit" class="btn">Submit</button>
      </fieldset>
      </form>
    </div>
</div>


      <?php print $feed_icons; ?>
    </div>

<!--     <div id="navigation">


      <?php print render($page['navigation']); ?>
    </div> -->

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>



</div>
  <footer role="contentinfo">
<div class="page">
<p class="address">
<span class="heading-bold font18">
Institute for Social and Economic Research
</span>
<br>
University of Essex, Wivenhoe Park, Colchester, Essex, CO4 3SQ UK
<br>
+44 (0)1206 872957
</p>
<nav class="social">
<ul>
<li>
<a href="https://twitter.com/euromod_"><span class="fa-stack">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
</span>
</a></li>
<li>
<a href="https://www.facebook.com/Microsimulation.Euromod?fref=ts"><span class="fa-stack">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
</span>
</a></li>
</ul>
</nav>
<a class="ec" href="http://ec.europa.eu/index_en.htm">European Commission</a>
<a class="iser" href="https://www.iser.essex.ac.uk">ISER</a>
<a class="uoe" href="http://www.essex.ac.uk/">University of Essex</a>
<nav class="utilities">
<ul>
<li>
<a class="t" accesskey="8" href="/privacy">Privacy and cookies</a>
</li>
<li>
<a class="t" href="/info-sec">Information security</a>
</li>
<li>
<a class="t" accesskey="6" href="/help">Help</a>
<a class="visuallyhidden" accesskey="0" href="/help">Access keys</a>
</li>
<li>
<a class="t" href="/euromod/contact">Contact</a>
</li>
</ul>
</nav>
</div>
</footer>
</div>
<?php print render($page['bottom']); ?>
