<?php 
$nt =  $news['News']['news_title'];
$this->assign('title', "Foodie Trails - $nt"); ?>

<?php
//print_r($event);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="tourHeader">
<?php echo $news['News']['news_title']?>
</h1>
<?php echo $news['News']['news_description']; ?>