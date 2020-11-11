<div class="newsletter">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="newsletter_title">S'inscrire à notre newsletter</div>
            </div>
        </div>
        <div class="row newsletter_row">
            <div class="col-lg-8 offset-lg-2">
                <div class="newsletter_form_container">
                    <form action="{{ route('post') }}" method="post" class="newsletter_form">
                        @csrf
                        <input type="email" name="email" class="newsletter_input" placeholder="Votre Email" required="required">
                        <button class="newsletter_button" type="submit">s'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
