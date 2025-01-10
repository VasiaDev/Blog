<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
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
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
