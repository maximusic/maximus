<!-- Begin Breadcrumbs -->
<div id="breadcrumbs">
    <ul>
        <li class="first"><a href="./index.html" title="Home">Home</a></li>
        <li><?php echo $page->title; ?></li>
    </ul>
    <div class="clear"></div>
</div>

<!-- End Breadcrumbs -->
<!-- Begin Content -->
<div class="<?php echo $class; ?>">
    
    <h2><?php echo $page->title; ?></h2>
    <?php echo $page->content; ?>
</div>



