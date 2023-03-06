<style>
    footer {
  background-color: #37474F;
  padding: 20px;
  margin-top: 20px;
  color: white;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 1200px;
  margin: 0 auto;
}

.about-us {
  flex-basis: 50%;
  padding-right: 20px;
}

.map {
  flex-basis: 50%;
  padding-left: 20px;
}

h3 {
  margin-top: 0;
}

iframe {
  display: block;
  width: 100%;
  height: 250px;
  border: 0;
}

</style>

<footer>
  <div class="footer-container">
    <div class="about-us">
      <h3>About Us</h3>
      <p>The Lost and Found website is a platform that facilitates the process of reuniting lost items with their rightful owners. The website allows users to report lost or found items and provides a comprehensive database of lost and found items in various categories such as electronics, jewelry, clothing, and pets. </p>
    </div>
    <div class="map">
      <h3>Map</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15087.89827160204!2d72.8311232!3d19.0208423!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cec6546fd52b%3A0xced90a052670a405!2sDeccan%20Education%20Society!5e0!3m2!1sen!2sin!4v1678076761793!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <?php
echo "<style>#footer {
    margin-top: 10px;
    width: 100%;
    color: white;
}</style>";
echo "<div  id='footer' style='background-color: #37474F; padding: 10px; text-align: center;'>
<p style='text-align:right;'>&copy"; 

?>
<?php echo date('Y'); ?> 
<?php
echo "Hrithik and Ranjeet</p>
</div>";
?>
    </div>
  </div>
  
</footer>