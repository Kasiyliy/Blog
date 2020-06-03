<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
        <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SkillSHARE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(auth()->user()->profile->avatar)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{auth()->user()->name}}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (auth()->check())

                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('post.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Posts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('post.trashed') }}" class="nav-link">
                            <i class="nav-icon fas fa-trash"></i>
                            <p>
                                All trashed posts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('post.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-save"></i>
                            <p>
                                Create new post
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-save"></i>
                            <p>
                                Create new category
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tag.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Tags
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tag.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                Create new tag
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('follower.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-arrow-circle-right"></i>
                            <p>
                                My follows
                            </p>
                        </a>
                    </li>
                    @if(auth()->user()->admin)
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Create new user
                                </p>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </nav>
    </div>
</aside>