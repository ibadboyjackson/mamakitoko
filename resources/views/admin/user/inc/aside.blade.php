
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(Auth::user()->cotisation->toArray() !== [])
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="" aria-expanded="false">
                            <i class="mdi mdi-gift"></i>
                            <span class="hide-menu">Mes cotisations</span>
                        </a>
                    </li>
                @else
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="" aria-expanded="false">
                            <i class="mdi mdi-arrange-bring-forward"></i>
                            <span class="hide-menu">Mon profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('payment') }}" aria-expanded="false">
                            <i class="mdi mdi-arrange-bring-forward"></i>
                            <span class="hide-menu">Cotiser</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
<div class="page-wrapper">
