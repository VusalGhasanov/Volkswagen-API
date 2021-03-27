<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Əsas</div>
                <a class="nav-link" href="/admin/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Əsas Səhifə
                </a>
                <a class="nav-link" href="{{route('admin.configs.show')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>Sayt Məlumatları
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i><!-- <i class="fas fa-columns"></i> --></div>
                    Feedback
                    <div class="sb-sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <i class="fas fa-angle-down"></i> --></div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion" style="">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.forums')}}">TestDrive
                            @php($count = \App\Models\Suggest::where('status','unread')->count())
                            @if($count>0)
                                <kbd class="ml-2 bg-danger text-white">{{$count}}</kbd>
                            @endif
                        </a>
                        <a class="nav-link" href="{{route('admin.suggests')}}">Təklif və şikayətlər
                            @php($count = \App\Models\Forum::where('status','unread')->count())
                            @if($count>0)
                                <kbd class="ml-2 bg-danger text-white">{{$count}}</kbd>
                            @endif
                        </a>
                    </nav>
                </div>
                <a class="nav-link" href="{{route('admin.users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>İstifadəçilər
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><svg class="svg-inline--fa fa-columns fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="columns" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64V160h160v256zm224 0H288V160h160v256z"></path></svg><!-- <i class="fas fa-columns"></i> --></div>
                    Menular
                    <div class="sb-sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <i class="fas fa-angle-down"></i> --></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion" style="">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.menus')}}">Menular</a>
                        <a class="nav-link" href="{{route('admin.sort.menu')}}">Menu Siralaması</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{route('admin.pages')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>Səhifələr
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Avtomobillər
                    <div class="sb-sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <i class="fas fa-angle-down"></i> --></div>
                </a>
                <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion" style="">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.cars')}}">Avtomobillər</a>
                        <a class="nav-link" href="{{route('admin.sort.cars')}}">Avtomobil Siralaması</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{route('admin.news')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-rss"></i></div>Xəbərlər
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><svg class="svg-inline--fa fa-columns fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="columns" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64V160h160v256zm224 0H288V160h160v256z"></path></svg><!-- <i class="fas fa-columns"></i> --></div>
                    Kredit Kalkulyatoru
                    <div class="sb-sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <i class="fas fa-angle-down"></i> --></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion" style="">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.credits')}}">Kredit</a>
                        <a class="nav-link" href="{{route('admin.lising')}}">Lizinq</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>
