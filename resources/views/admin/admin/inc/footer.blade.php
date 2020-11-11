<footer class="footer text-center">
    Copyrights Mama Kitoko 2018, Tous Droits Réservés, Design par &nbsp;
    <a target="_blank" href="http://hermanjacksonfoutou.com">Herman Jackson</a>.
</footer>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/plugins/preview/plugin.min.js"></script>
<script>
    tinymce.init(
        {
            selector:'textarea',
            language : 'fr_FR',
            language_url: "{{ asset('js/tiny/langs/fr_FR.js') }}"
        });
</script>
<script src="{{ asset('dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashobard/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/waves.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/custom.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/pages/dashboards/dashboard1.js') }}"></script>
</body>

</html>
