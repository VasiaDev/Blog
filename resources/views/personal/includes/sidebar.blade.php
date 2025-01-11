<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        @if(auth()->user()->role == 0)
            <nav class="mt-2">
                <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link">
                            <i class="bi bi-shield-shaded"></i>
                            <p>Admin panel</p>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
        <nav class="mt-4">
                <!--begin::Sidebar Menu-->
                <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <li class="nav-item">
                        <a href="{{ route('personal') }}" class="nav-link">
                            <i class="fa-solid fa-house-chimney"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('personal.liked.index') }}" class="nav-link">
                            <i class="fa-solid fa-heart"></i>
                            <p>Liked posts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('personal.comment.index') }}" class="nav-link">
                            <i class="fa-solid fa-comments"></i>
                            <p>Comments</p>
                        </a>
                    </li>
                </ul>
            </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
