<template>
  <footer class="footer mt-40">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="item_f1">
            <a href="terms_of_use.html">Copyright Policy</a>
            <a href="terms_of_use.html">Terms</a>
            <a href="terms_of_use.html">Privacy Policy</a>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="footer_bottm">
            <div class="row">
              <div class="col-md-6">
                <ul class="fotb_left">
                  <li>
                    <a href="index.html">
                      <div class="footer_logo">
                        <img :src="`${globalBaseUrl}images/favicon-svg.svg`" alt="" />
                      </div>
                    </a>
                  </li>
                  <li>
                    <p>
                      © 2022 <strong>Gamify US</strong>. All Rights
                      Reserved.
                    </p>
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <div class="edu_social_links">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
    name:"Footer"
}
</script>

<style>

</style>