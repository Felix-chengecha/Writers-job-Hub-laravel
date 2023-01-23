<div id="layoutSidenav_nav" style="background-color: #0096FF; margin-top:-12px;">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #0096FF;" >
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">
                </div>
                     <a class="nav-link" href="{{ url('dash') }}">
                     <i class="fa-solid fa-gauge-high" style="margin-top:-10px;"></i>
                     <small style="color: white; font-weight: bold; margin-left:5px;" >  Dashboard </small>
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                </a>

                <div class="sb-sidenav-menu-heading" style="margin-top:-10px;">  <span style="color: black;">Menu </span></div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"> </div>

                    <a class="nav-link" href="{{ url('writers') }}" >
                    <i class="fa fa-users" style="margin-top:-30px;"></i> <small style="color: white;   font-weight: bold; margin-left:5px; margin-top:-30px;" >Writers</small>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div> </a>
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"></div>
                    <a class="nav-link" href="{{ url('aproject') }}">
                    <i class="fa fa-plus" style="margin-top:-40px;"></i> <small style="color: white; font-weight: bold; margin-left:5px; margin-top:-40px;" >Add project</small>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div> </a>
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"></div>
                     <a class="nav-link" href="{{ url('projects') }}">
                    <i class="fa fa-pen" style="margin-top:-40px;"></i> <small style="color: white;   font-weight: bold; margin-left:5px; margin-top:-40px;" >Projects</small>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div> </a>
                </a>

                <div class="sb-sidenav-menu-heading" style="margin-top:-30px;">  <span style="color: black; ">Others </span></div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"></div>
                    <i class="fa fa-check-square" style="margin-top:-20px;"></i> <small style="color: white;   font-weight: bold; margin-left:5px; margin-top:-20px;" >Users</small>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer" style="background-color: #0096FF;">
            <div class="small" style="color: white;">Logged in as: <span style="margin-left:5px;">admin </span> </div>
        </div>
    </nav>
</div>


