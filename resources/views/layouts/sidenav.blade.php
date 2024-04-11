<!-- ========== Left Sidebar Start ========== -->
@php
$profile=Auth::user();
@endphp
<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('documents.index') }}" class="waves-effect">
                        <i class="fa fa-home"></i>
                        <span key="t-dashboards">Documents</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('documents.create') }}" class="waves-effect">
                        <i class="fa fa-plus"></i>
                        <span key="t-dashboards">Upload Document</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
