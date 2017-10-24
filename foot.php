<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Dimas Alif Avianto (14.01.53.0065)</p>
  <p>Romi Saefuddin (14.01.53.0057)</p>
  <p>Fandi Pratama (14.01.53.0116)</p>
</footer>

<div id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>Tentang</h4>
          <p>Website ini digunakan untuk menyelesaikan tugas kuliah dari mata kuliah Sistem Temu Kembali Informasi.</p>
          <P>Teknik Informatika - Universitas Stikubank Semarang</p>
        </div><!-- /col-lg-4 -->
        
        <div class="col-lg-4">
        
          <h4>Links</h4>
          <p>
            <a href="#">Github</a><br/>
            <a href="#">Youtube</a><br/>
            <a href="#">Blog</a>
          </p>
        </div><!-- /col-lg-4 -->
        
        <div class="col-lg-4">
          
        </div><!-- /col-lg-4 -->
      
      </div>
    
    </div>
  </div>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
