<footer class="footer">
    <div class="container">
        <div class="row py-5 justify-content-center text-center">
            <div class="col-md-4">
                <img src="{{ asset('img/logos/logos.png') }}" alt="">
                <div class="foo-content py-5">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="https://twitter.com/KitokoMama/media" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/Mama-Kitoko-1691586500969612/" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/mamakitoko/" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <h3>Service Client</h3>
                <div class=" foo py-4">
                    <a href="/apropos">Nous Contacter</a>
                    <a href="">FAQ</a>
                    <a href="">Privacy Policy</a>
                    <a href="">Terms and Services</a>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <h3>Contacts</h3>
                <p class="py-4">
                    + 436 586 564 68 <br><br>
                    GENEVE SWITZERLAND
                </p>
            </div>
        </div>
    </div>
    <div class="row-foo pt-4 justify-content-center text-center col-sm-12">
        <p>Copyright MAMA KITOKO {{ date('Y') }} Tous Droits Réservés</p>
    </div>
</footer>

<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.7.1/rellax.js"></script>
<script>
    // Also can pass in optional settings block
    var rellax = new Rellax('.rellax', {
        speed: -2,
        center: false,
        wrapper: null,
        round: true,
        vertical: true,
        horizontal: false
    });
</script>
</body>
</html>
